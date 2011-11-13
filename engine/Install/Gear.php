<?php

/**
 * Install gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Install
 * @version		$Id$
 */
class Install_Gear extends Gear {

    protected $name = 'Install';
    protected $description = 'Help to install system.';
    protected $package = 'Core';
    protected $order = 0;

    /**
     * Init
     */
    public function init() {
        $this->router->addRoute(':index', array($this, 'index'), TRUE);
        parent::init();
        new Install_Menu();
    }

    /**
     * Initializing menu system
     * 
     * @param type $name
     * @param type $menu 
     */
    public function menu($name, $menu) {
        if ($name == 'install') {
            $root = Url::gear('install');
            $menu->{$root . 'welcome'} = t('1. Welcome.');
            $menu->{$root . 'requirements'} = t('2. Requirements.');
            $menu->{$root . 'site'} = t('3. Site info.');
            $menu->{$root . 'finish'} = t('10. Finish.');
            !$this->router->getSegments() && $menu->setActive($root . 'welcome');
        }
    }

    /**
     * Default dispatcher
     * 
     * @param string $action
     * @param string $subaction 
     */
    public function index($action = '') {
        switch ($action) {
            case 'requirements':
                $tpl = new Template('install.requirements');
                $tpl->show();
                break;
            default:
            case 'welcome':
                $tpl = new Template('install.welcome');
                $tpl->show();
        }
    }
}