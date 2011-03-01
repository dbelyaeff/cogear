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
    public function init(){
        parent::init();
        $cogear = getInstance();
        $cogear->router->addRoute('user:any',array($this,'dispatcher'));
        $this->current = new User_Object();
    }

    /**
     * Magic __get method
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name){
        $parent = parent::__get($name);
        return $parent !== NULL ? $parent : ($this->current->$name ? $this->current->$name : NULL);
    }
    /**
     * Magic set method
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name,$value){
        $this->current->$name = $value;
    }
    /**
     * Magic __call method
     *
     * @param   string  $name
     * @param   array   $args
     */
    public function __call($name,$args){
        return method_exists($this->current, $name) ? call_user_func_array(array($this->current,$name), $args) : NULL;
    }
    /**
     * Dispatcher
     * @param string $action
     */
    public function dispatcher($action){
        switch($action){
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
                $this->show_action($action);
        }
    }
    /**
     * Login form show
     */
    public function login_action(){
        if($this->isLogged()){
            return info('You are already logged in!','Authorization');
        }
        $form = new Form_Manager('User.login');
        if($data = $form->result()){
            $cogear = getInstance();
            $this->object($data);
            $this->hashPassword();
            if($this->find()){
                $data->saveme && $this->remember();
                $this->login();
                back();
            }
            else {
               error('Login or password weren\'t found in the database','Authentification error');
            }
        }
        append('content',$form->render());
    }
    /**
     * Logout
     */
    public function logout_action(){
        $this->logout();
        back();
    }
    /**
     * User registration
     */
    public function register_action(){
        if(!access('user register')){
            return info('You don\'t have an access to registration');
        }
         if($this->isLogged()){
            return info('You are already logged in!','Authorization');
        }
        $form = new Form_Manager('User.register');
        if($data = $form->result()){
            $this->object($data);
            $this->hashPassword();
            $this->save();
            info('User was successfully registered! Please, check your email for further instructions.','Registration succeed.');
        }
        else append('content',$form->render());
    }
}