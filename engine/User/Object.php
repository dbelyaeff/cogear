<?php

/**
 * User object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class User_Object extends Db_ORM {
    /**
     * Constructor
     * 
     * @param   boolean $autoinit
     */
    public function __construct() {
        parent::__construct('users');
    }

    /**
     * Init user as current
     */
    public function init() {
        if ($this->autologin()) {
            event('user.autologin', $this);
        }
        // Set data for guest
        else {
            $this->object(array(
                'id' => 0,
                'user_group' => 0,
            ));
            $this->store();
        }
    }

    /**
     * Autologin
     */
    public function autologin() {
        $cogear = getInstance();
        if ($cogear->session->user) {
            $this->store();
            return TRUE;
        } elseif ($id = Cookie::get('id') && $hash = Cookie::get('hash')) {
            $this->id = $id;
            if ($this->find() && $this->genHash() == $hash) {
                $this->store();
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Store — save user to session
     */
    public function store($data = NULL) {
        $cogear = getInstance();
        $data OR $data = $cogear->session->user;
        $this->object($data);
        $cogear->session->user = $this->object;
    }
    
    /**
     * Activate user
     */
    public function login() {
        if (!$this->object)
            return;
        $cogear = getInstance();
        $cogear->session->user = $this->object;
    }

    /**
     * Force login
     *
     * @param   mixed   $value
     * @param   string  $param
     */
    public function forceLogin($value, $param = 'login') {
        $this->clear();
        $this->where($param, $value);
        if ($this->find()) {
            $this->login();
        }
    }

    /**
     * Deactivate user
     */
    public function logout() {
        if (!$this->object)
            return;
        $cogear = getInstance();
        $cogear->session->remove('user');
        $this->forget();
    }

    /**
     * Check if user is logged
     *
     * @return boolean
     */
    public function isLogged() {
        $cogear = getInstance();
        return $cogear->session->user->id;
    }

    /**
     * Remember user
     */
    public function remember() {
        if (!$this->object)
            return;
        Cookie::set('id', $this->id);
        Cookie::set('hash', $this->genHash());
    }

    /**
     * Remember user
     */
    public function forget() {
        Cookie::delete('id');
        Cookie::delete('hash');
    }

    /**
     * Encrypt password
     *
     * @param string $password
     * @return string
     */
    public function hashPassword($password = NULL) {
        $password OR $password = $this->password;
        $this->password = md5(md5($password) . Cogear::key());
        return $this->password;
    }

    /**
     * Generate hash for user
     *
     * @param object $user
     */
    public function genHash() {
        return md5($this->password . Cogear::key());
    }

    /**
     * Get name
     * 
     * If name is not provided, login will be used
     * 
     * @return string
     */
    public function getName() {
        if ($this->id) {
            return $this->name ? $this->name : $this->login;
        }
        return NULL;
    }
    /**
     * Get user profile link
     */
    public function getProfileLink(){
        if($this->id){
            return Url::gear('user').$this->login;
        }
        return NULL;
    }
    /**
     * Get user avatar
     * 
     * @return  User_Avatar
     */
    public function getAvatar(){
        if(!($this->avatar instanceof User_Avatar)){
            $this->avatar = new User_Avatar($this->avatar);
            $this->avatar->setUser($this);
        }
        return $this->avatar;
    }
    /**
     * Get user panel — for profile and other pages
     * 
     * @return string
     */
    public function getPanel() {
        $cogear = getInstance();
        $panel = new Stack('user.panel');
        $panel->avatar = $this->getAvatar();
        $panel->login = HTML::a($this->getProfileLink(), $this->login, array('class'=>'implicit login   '));
        if (access('user edit_all') OR $this->id == $cogear->user->id) {
            $panel->edit = HTML::a(Url::gear('user') . $this->login . '/edit', icon('cog'));
        }
        return $panel->render();
    }
    /**
     * Get user upload directory
     */
    public function getUserDir(){
        return UPLOADS.DS.'users'.DS.$this->id.DS;
    }
}
