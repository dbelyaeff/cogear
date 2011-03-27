<?php
/**
 * Admin menu
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Admin_Menu_Gear extends Gear {
    protected $name = 'Admin Menu';
    protected $description = 'Add very handy menu to the top of the page for site admin.';
    /**
     * Init
     */
    public function init(){
        hook('request.admin',array($this,'render'));
    }
    /**
     * Render menu
     */
    public function render(){
        $cogear = getInstance();
        $menu = new Menu_SimpleTree('Admin_Menu.menu');
        $root = Url::gear('admin');
        $data = array(
            'root' => array(
                '#value' => array('link'=>$root,'text'=>t('Quick Actions','Admin')),
                'clear' => array('link'=>$root.'clear','text'=>t('Clear cache','Admin')),
            ),
            'gears' => array(
                '#value' => array('link'=>$root.'gears','text'=>t('Gears','Admin')),
                'index' => array('link'=>$root.'gears','text'=>t('List','Admin')),
            ),

            'site' => array(
                '#value' => array('link'=>$root.'site','text'=>t('Site','Admin')),
            ),
        );
        $menu->adopt(&$data);
        $menu->setActive($cogear->router->getArgs());
        prepend('sidebar',$menu->render().HTML::style($this->folder.'/css/menu.css'));
    }
}
