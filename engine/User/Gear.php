<?php

/**
 *  User gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class User_Gear extends Gear {

    protected $name = 'User';
    protected $description = 'Manage users.';
    protected $order = 0;
    protected $current;
    /**
     * Init
     */
    public function init() {
        parent::init();
        $this->current = new User_Object();
        $this->current->init();
        hook('menu.admin.sidebar', array($this, 'adminMenuLink'));
        new User_Menu();
    }

    /**
     * Hook to add admin menu element
     * 
     * @param type $structure 
     */
    public function adminMenuLink($menu) {
        $root = Url::gear('admin');
        $menu['14'] = new Menu_Item($root . 'user', icon('users', 'fugue') . t('Users'));
        $menu['14.1'] = new Menu_Item($root . 'user/add', icon('user--plus', 'fugue') . t('Add user'));
    }
    /**
     * Menu builder
     * 
     * @param string $name
     * @param object $cp 
     */
    public function menu($name, &$cp) {
        d('User_CP');
        switch ($name) {
            case 'user_cp':
                if ($this->id) {
                    $cp->{Url::gear('user') . $this->login} = $this->getAvatar()->getSize('24x24') . $this->getName();
                    $cp->{Url::gear('user') . 'logout'} = icon('control-power', 'fugue') . t('Logout');
                    $cp->{Url::gear('user') . 'logout'}->order = 100;
                } else {
                    $cp->{Url::gear('user') . 'login'} = t('Login');
                    $cp->{Url::gear('user') . 'register'} = t('Register');
                }
                break;
        }
        d();
    }

    /**
     * Magic __get method
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        $parent = parent::__get($name);
        return $parent !== NULL ? $parent : (isset($this->current->$name) ? $this->current->$name : NULL);
    }

    /**
     * Magic set method
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value) {
        $this->current->$name = $value;
    }

    /**
     * Magic __call method
     *
     * @param   string  $name
     * @param   array   $args
     */
    public function __call($name, $args = array()) {
        return method_exists($this->current, $name) ? call_user_func_array(array($this->current, $name), $args) : parent::__call($name, $args);
    }

    /**
     * Dispatcher
     * @param string $action
     */
    public function index($action = 'index', $subaction=NULL) {
        switch ($action) {
            case 'login':
            case 'register':
            case 'lostpassword':
                $top_menu = new Menu('User.login', 'Menu.tabs');
                $root = Url::gear('user');
                $top_menu->{$root . 'login'} = t('Log in');
                $top_menu->{$root . 'register'} = t('Register');
                $top_menu->{$root . 'lostpassword'} = t('Lost password?');
                append('content', $top_menu->render());
                break;
        }
        switch ($action) {
            case 'login':
                $this->login_action();
                break;
            case 'logout':
                $this->logout_action();
                break;
            case 'lostpassword':
                $this->lostpassword_action();
                break;
            case 'register':
                $this->register_action();
                break;
            default:
                switch ($subaction) {
                    case 'edit':
                        $this->edit_action($action);
                        break;
                    default:
                        $this->show_action($action);
                }
        }
    }

    /**
     * Show user profile
     * 
     * @param string $login
     */
    public function show_action($login) {
        $user = new User_Object();
        $user->where('login', $login);
        if (!$user->find()) {
            return _404();
        }
        $this->renderUserInfo($user);
    }

    /**
     * Render user info
     * 
     * @param object $user 
     */
    public function renderUserInfo($user) {
        $tpl = new Template('User.profile');
        $tpl->user = $user;
        append('content', $tpl->render());
    }

    /**
     * Edit action
     * 
     * @param   string  $login
     */
    public function edit_action($login) {
        $user = new User_Object();
        $user->where('login', $login);
        if (!$user->find()) {
            return _404();
        }
        if (!access('user edit_all') OR $this->id != $user->id) {
            return _403();
        }
        $this->renderUserInfo($user);
        $user = new User_Object();
        $user->where('login', $login);
        $user->find();
        $form = new Form('User.profile');
        $user->password = '';
        $form->object($user->object());
        if ($form->elements->avatar->is_ajaxed && Ajax::get('action') == 'replace') {
            $user->avatar = '';
            $user->update();
        }
        if ($result = $form->result()) {
            if ($user->login != $result['login']) {
                $redirect = Url::gear('user') . $result['login'];
            }
            $user->merge($result);
            if ($result->password) {
                $user->hashPassword();
            } else {
                unset($user->password);
            }
            if ($user->update()) {
                d('User edit');
                flash_success(t('User data saved!'), t('Success'));
                d();
                if ($user->id == $this->id) {
                    $this->store($user->object()->toArray());
                }
                redirect(Url::gear('user') . $user->login);
            }
        }
        append('content', $form->render());
    }

    /**
     * Login form show
     */
    public function login_action() {
        if ($this->isLogged()) {
            return info('You are already logged in!', 'Authorization');
        }
        $form = new Form('User.login');
        if ($data = $form->result()) {
            $this->object($data);
            $this->hashPassword();
            if ($this->find()) {
                $data->saveme && $this->remember();
                $this->login();
                back();
            } else {
                error('Login or password weren\'t found in the database', 'Authentification error');
            }
        }
        append('content', $form->render());
    }

    /**
     * Logout
     */
    public function logout_action() {
        $this->logout();
        back();
    }

    /**
     * Lost password recovery
     */
    public function lostpassword_action() {
        $form = new Form('User.lostpassword');
        if ($data = $form->result()) {
            $this->object($data);
            if ($this->find()) {

                back();
            } else {
                error('Login or password weren\'t found in the database', 'Authentification error');
            }
        }
        append('content', $form->render());
    }

    /**
     * User registration
     */
    public function register_action() {
        if (!access('user register')) {
            return info('You don\'t have an access to registration');
        }
        if ($this->isLogged()) {
            return info('You are already logged in!', 'Authorization');
        }
        $form = new Form('User.register');
        if ($data = $form->result()) {
            $this->object($data);
            $this->hashPassword();
            $this->save();
            info('User was successfully registered! Please, check your email for further instructions.', 'Registration succeed.');
        }
        else
            append('content', $form->render());
    }

    /**
     * Administrate users
     * 
     * @param string $action 
     */
    public function admin($action = '') {
        $top_menu = Template::getGlobal('top_menu');
        $root = Url::gear('admin') . 'user/';
        $top_menu->{$root} = t('List');
        $top_menu->{$root . 'add'} = t('Add');

        switch ($action) {
            case 'add':
                $this->admin_add();
                break;
            default:
                $this->admin_list();
        }
    }

    /**
     * Show list of users
     */
    public function admin_list() {
        
    }

    /**
     * Add a new user
     */
    public function admin_add() {
        $form = new Form('User.register');
        if ($data = $form->result()) {
            $user = new User_Object(FALSE);
            $user->object($data);
            $user->hashPassword();
            $user->save();
            info('User was successfully registered!', 'Registration succeed.');
        }
        else
            append('content', $form->render());
    }

}