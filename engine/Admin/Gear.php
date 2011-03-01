<?php
/**
 * Admin gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Admin_Gear extends Gear {
    protected $name = 'Admin gear';
    protected $description = 'Site control panel';
    protected $order = 3;
    /**
     * Initializer
     */
    public function init(){
        $cogear = getInstance();
        $this->settings->theme = 'Admin_Theme_Gear';
        Cogear::$theme_autoload = FALSE;
        parent::init();
    }
    /**
     * Dispatch request
     */
    public function index(){
        
    }
    
    public function request(){
        $this->setTheme();
        parent::request();
    }
}
