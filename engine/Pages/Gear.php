<?php

/**
 * Pages gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Pages
 * @version		$Id$
 */
class Pages_Gear extends Gear {

    protected $name = 'Pages';
    protected $description = 'Manage pages.';
    protected $pages = array();
    protected $type = Gear::CORE;
    protected $package = 'Pages';
    protected $order = 0;
    
    /**
     * Init
     */
    public function init(){
        $cogear = getInstance();
        $cogear->router->addRoute(':index', array($this, 'index'), TRUE);
    }
    
    /**
     * Show pages
     * 
     * @param string $type 
     */
    public function index($type = ''){
        
    }
}