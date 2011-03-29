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
        parent::init();
        $cogear = getInstance();
        $cogear->router->addRoute(':index', array($this, 'index'), TRUE);
        hook('user_cp.render.before',array($this,'userPanelExtend'));
    }
    
    /**
     * Show pages
     * 
     * @param string $type 
     */
    public function index($action = ''){
        switch($action){
            case 'create':
                append('content',HTML::paired_tag('h1',t('New page','Pages')));
                $form = new Form_Manager('Pages.createdit');
                
                append('content',$form->render());
                break;
            default:
        }
    }
    
    public function userPanelExtend($cp){
        $cp->create = HTML::a(Url::gear('pages').'create',t('Create page','Pages'));
    }
}