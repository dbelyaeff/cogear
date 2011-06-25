<?php

/**
 *  Loginza gear
 * 
 *  Public serivce to login and register on site via variety of social services
 * 
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Loginza
 * @version		$Id$
 */
class Loginza_Gear extends Gear {

    protected $name = 'Loginza';
    protected $description = 'Public serivce to login and register on site via variety of social services.';
    protected $type = Gear::CORE;
    protected $package = '';
    protected $order = 0;
    protected $api = 0;

    /**
     * Init
     */
    public function init() {
        parent::init();
        $cogear = getInstance();
        $this->api = new Loginza_API();
        hook('form.user-login.result.before', array($this, 'hookUserForm'));
        hook('form.user-register.result.before', array($this, 'hookUserForm'));
        hook('form.user-profile.result.before', array($this, 'hookUserProfile'));
    }

    /**
     * Hooking user login and register forms
     * 
     * @param object $Form 
     */
    public function hookUserForm($Form) {
        js('http://loginza.ru/js/widget.js');
        $Form->addElement('loginza', array(
            'type' => 'span',
            'value' => HTML::a($this->api->getWidgetUrl(Url::link() . 'loginza'), HTML::img($this->folder . '/img/sign_in_button_gray.gif', t('Log in via social services', 'Loginza')), array('class' => 'loginza')),
        ));
    }

    /**
     * Hooking user profile form
     * 
     * @param object $Form 
     */
    public function hookUserProfile($Form) {
        js('http://loginza.ru/js/widget.js');
        $Form->addElement('loginza', array(
            'type' => 'span',
            'value' => HTML::a($this->api->getWidgetUrl(Url::link() . 'loginza'), HTML::img($this->folder . '/img/sign_in_button_gray.gif', t('Log in via social services', 'Loginza')), array('class' => 'loginza')),
        ));
        $cogear = getInstance();
        if ($connected_accounts = $cogear->db->where('uid', $Form->object->id)->get('users_loginza')->result()) {
            $tpl = new Template('Loginza.accounts');
            $tpl->accounts = $connected_accounts;
            append('content', $tpl->render(), 100);
        }
    }

    /**
     * Default dispatcher
     * 
     * @param string $action 
     */
    public function index($action = '', $subaction = NULL) {
        $cogear = getInstance();
        if (!empty($_POST['token'])) {
            // Get the profile of authorized user
            $UserProfile = $this->api->getAuthInfo($_POST['token']);
            // Check for errors
            if (!empty($UserProfile->error_type)) {
                // Debug info for developer
                error(t($UserProfile->error_type . ": " . $UserProfile->error_message));
            } elseif (empty($UserProfile)) {
                error(t('Temporary error with Loginza authentification.'));
            } else {
                $cogear->session->loginza = $UserProfile;
            }
        }
        if ($loginza = $cogear->session->loginza) {
            /**
             * There we have 3 ways of workflow
             * 
             * 1. User is logged in. Add new identity to database if it's not exist.
             * 2. User is registred. Authorize.
             * 3. User is not registred. Show register form connected and fullfilled with Loginza data (login, e-mail and so on).
             */
            $user = new Db_ORM('users_loginza');
            $user->identity = $loginza->identity;
            // If user is logged in
            if ($cogear->user->id) {
                // If integration is found
                if ($user->find()) {
                    // If integration belongs to the current user
                    if ($user->uid == $cogear->user->id) {
                        $user->loginza->data = json_encode($loginza);
                        $user->update();
                        flash_info(t('Your integration with profile <b>%s</b> was updated successfully.', 'Loginza', $loginza->identity), t('Updated succeed.'));
                    }
                    // If integration is used with another account
                    else {
                        flash_error(t('Profile <b>%s</b> is integrated with sombody else account. You cannot use it before someone would left it out.', 'Loginza', $loginza->identity), t('Update failure.'));
                    }
                }
                // If integration is not found
                else {
                    // Create new database record
                    $user->uid = $cogear->user->id;
                    $user->provider = $loginza->provider;
                    $UserProfile = new Loginza_UserProfile($loginza);
                    isset($loginza->photo) && $user->photo = $loginza->photo;
                    $user->full_name = $UserProfile->genFullName();
                    $user->data = json_encode($loginza);
                    $user->save();
                }
                $cogear->session->loginza = NULL;
                // Redirect to user profile
                redirect($cogear->user->getProfileLink());
            }
            // If user is a guest he has to login or even to register
            else {
                // Record found → try to log in
                if ($user->find()) {
                    $search = new User_Object();
                    $search->id = $user->uid;
                    if ($search->find()) {
                        $cogear->user->forceLogin($user->uid, 'id');
                    } else {
                        flash_error(t('Cannot find user with id <b>%s</b>.', 'Loginza', $user->uid));
                    }
                    $cogear->session->loginza = NULL;
                    back();
                }
                // If record wasn't found → register user with special data
                else {
                    if (!access('user register')) {
                        return info('You don\'t have an access to registration');
                    }
                    success('First step of registration is done. Please, fill some fields to complete your registration.');

                    $form = new Form('User.register');
                    $UserProfile = new Loginza_UserProfile($loginza);
                    $tpl = new Template('Loginza.register');
                    $tpl->loginza = $loginza;
                    $tpl->profile = $UserProfile;
                    append('content', $tpl->render());
                    $data['login'] = $UserProfile->genFullName();
                    isset($loginza->email) && $data['email'] = $loginza->email;
                    $form->setValues($data);
                    if ($data = $form->result()) {
                        $cogear->user->object($data);
                        $cogear->user->hashPassword();
                        if ($uid = $cogear->user->save()) {
                            // Create new database record
                            $user->uid = $uid;
                            $user->provider = $loginza->provider;
                            $UserProfile = new Loginza_UserProfile($loginza);
                            isset($loginza->photo) && $user->photo = $loginza->photo;
                            $user->full_name = $UserProfile->genFullName();
                            $user->data = json_encode($loginza);
                            $user->save();
                        }
                        $cogear->session->loginza = NULL;
                        flash_success('User was successfully registered! Please, check your email for further instructions.', 'Registration succeed.');
                        redirect();
                    }
                    append('content', $form->render());
                }
            }
        }
    }

}