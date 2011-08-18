<?php

/**
 * Robo-control gear
 * 
 * Is used to control robots via the Internet.
 * Originaly requested by Alexander Shavikin and NanoJam company.
 * 
 * @author  Dmitriy Belyaev
 * @copyright   Dmitriy Belyaev, 2011
 * @email   admin@cogear.ru
 * @link    http://cogear.ru
 * @license http://cogear.ru/license.html
 * @package Robo
 * @version 0.1
 */
class Robo_Gear extends Gear {

    protected $name = 'Robotic Control';
    protected $description = 'Make world a bit more better with the help of robots.';
    protected $version = 0.1;
    protected $package = 'Robo';
    protected $adapter;
    public static $adapters = array(
        'rovio' => 'Robo_Adapter_Rovio'
    );

    /**
     * Init
     */
    public function init() {
        parent::init();
        $class = config('robo.adapter.default', 'rovio');
        $this->adapter = new self::$adapters[$class];
        $this->adapter->setIP(config('robo.adapter.IP', '192.168.0.1'));
    }
    
    /**
     * Admin control panel
     */
    public function admin(){
       $form = new Form('Robo.settings');
       if($result = $form->result()){
           $result->ip && $this->set('robo.adapter.IP',$result->ip);
           $result->adapter && $this->set('robo.adapter.default',$result->adapter);
       }
       $form->show();
    }
    
    public function menu($name,$menu){
        switch($name){
            case 'user':
                $menu->{Url::gear('robo')} = t('Robo');
                break;
        }
    }

    /**
     * Request dispatcher
     */
    public function index($action = NULL, $command = NULL) {
        switch ($action) {
            case 'command':
                // Check user for access rights
                $response = $this->adapter->command($command);
                Ajax::json($response);
                break;
            default:
                $tpl = new Template('Robo.ip_cam');
                append('rsidebar', $tpl->render());
                append('content', $this->adapter->render());
        }
    }


    /**
     * Hook user control panel
     */
    public function hookControlPanel($cp) {
        $cp->{Url::gear('robo') } = t('Robo');
    }

}
