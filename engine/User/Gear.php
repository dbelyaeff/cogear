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
    protected $order = -10;
    protected $current;
    /**
     * Init
     */
    public function init() {
        parent::init();
        $cogear = getInstance();
        $this->current = new User_Object();
        hook('menu.Admin_Menu.menu',array($this,'adminMenuLink'));
        $user_cp = new User_CP();
        hook('theme.body.before',array($user_cp,'output'));
        hook('user_cp.render.before',array($this,'hookControlPanel'));
    }
    /**
     * Hook to add admin menu element
     * 
     * @param type $structure 
     */
    public function adminMenuLink(&$structure){
            $root = Url::gear('admin');
            $structure->inject(array(
                '#value' => array('link'=>$root.'user','text'=>t('Users','Admin')),
                'index' => array('link'=>$root.'user','text'=>t('List','Admin')),
                'add' => array('link'=>$root.'user/add','text'=>t('Add new','Admin')),
            ),'site',  Core_ArrayObject::BEFORE,'user');
    }
    /**
     * Magic __get method
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        $parent = parent::__get($name);
        return $parent !== NULL ? $parent : ($this->current->$name ? $this->current->$name : NULL);
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
    public function __call($name, $args) {
        return method_exists($this->current, $name) ? call_user_func_array(array($this->current, $name), $args) : NULL;
    }

    /**
     * Dispatcher
     * @param string $action
     */
    public function index($action,$subaction=NULL) {
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
                switch($subaction){
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
    public function show_action($login){
        $user = new User_Object(FALSE);
        $user->where('login',$login);
        if(!$user->find()){
            return _404();
        }
        $tpl = new Template('User.profile');
        $tpl->user = $user;
        append('content',$tpl->render());
    }
    
    /**
     * Edit action
     * 
     * @param   string  $login
     */
    public function edit_action($login){
        $user = new User_Object(FALSE);
        $user->where('login',$login);
        if(!$user->find()){
            return _404();
        }
        $cogear = getInstance();
        if(!access('user edit_all') OR $cogear->user->id != $user->id){
            return _403();
        }
        $form = new Form_Manager('User.profile');
        $form->setValues($user->object());
        if ($data = $form->result()){
            $cogear = getInstance();
            $user->object($data);
            $user->hashPassword();
            $user->save();
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
        $form = new Form_Manager('User.login');
        if ($data = $form->result()) {
            $cogear = getInstance();
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
     * User registration
     */
    public function register_action() {
        if (!access('user register')) {
            return info('You don\'t have an access to registration');
        }
        if ($this->isLogged()) {
            return info('You are already logged in!', 'Authorization');
        }
        $form = new Form_Manager('User.register');
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
        $form = new Form_Manager('User.register');
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

    /**
     * Hook user control panel
     */
    public function hookControlPanel($cp){
        d('User_CP');
        if($this->id){
            $cp->user = t('Welcome, %s!',NULL,HTML::a(Url::gear('user').$this->login,$this->getName()));
        }
        else {
            $cp->login = HTML::a(Url::gear('user').'/login',t('Login'));
            $cp->register = HTML::a(Url::gear('user').'/register',t('Register'));
        }
        d();
    }
}