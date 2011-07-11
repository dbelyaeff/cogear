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

    /**
     * Initializer
     */
    public function init() {
        $cogear = getInstance();
        $this->settings->theme = 'Admin_Theme';
        parent::init();
        hook('menu.user_cp', array($this, 'hookControlPanel'));
    }

    /**
     * Add Control Panel to user panel
     */
    public function hookControlPanel($cp) {
        $cogear = getInstance();
        if ($cogear->user->id && access('admin')) {
            $cp->{Url::gear('admin')} = icon('cog') . ' ' . t('Control Panel');
        }
    }

    /**
     * Dispatch request
     */
    public function index($action = '', $subaction = 'index') {
        $cogear = getInstance();
        $args = $cogear->router->getArgs();
        $rev_args = array_reverse($args);
        $class = array();
        $stop = FALSE;
        Template::setGlobal('title',t('Control Panel'));
        while ($piece = array_pop($rev_args)) {
            $class[] = ucfirst($piece);
            $gear = implode('_', $class);
            if ($cogear->gears->$gear) {
                $callback = array($cogear->gears->$gear, 'admin');
                if (is_callable($callback)) {
                    event('admin.gear.request',$cogear->gears->$gear);
                    Template::setGlobal('title',$gear);
                    $cogear->router->exec($callback, $rev_args);
                    $stop = TRUE;
                    break;
                }
            }
        }
        if ($stop)
            return;
        switch ($action) {
            case 'clear':

                break;
        }
    }

}
