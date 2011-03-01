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
        //parent::init();
        $this->render();
        //hook('theme.body.before',array($this,'render'));
    }
    /**
     * Render menu
     */
    public function render(){
        $cogear = getInstance();
        $menu = new Menu_Object('admin-menu-top','Admin_Menu.menu');
        $root = Url::link($cogear->admin->settings->base);
        $menu->root = HTML::a($root,icon('cog'));
        $menu->root->clear = HTML::a($root.'/clear',icon('bin_closed').t('Clear cache','Admin'));
        $menu->root->clear->super_clear = HTML::a($root.'/clear/system',icon('cancel').t('Clear system cache 1','Admin'));
        $menu->root->clear->super_clear2 = HTML::a($root.'/clear/system',icon('cancel').t('Clear system cache 2','Admin'));
        $menu->root->test = HTML::a($root.'/test',t('test cache','Admin'));
        $menu->root->test->super_test = HTML::a($root.'/test/system',t('test system cache 3','Admin'));
        $menu->root->test->super_test2 = HTML::a($root.'/test/system',t('test system cache 4','Admin'));
        $menu->site = HTML::a($root.'/site',t('Site','Admin'));
        prepend('sidebar',$menu->render()); //HTML::style($this->folder.'/css/menu.css')
    }
}
