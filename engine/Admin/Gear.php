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
        $this->settings->theme = 'Admin_Theme';
        parent::init();
    }

    /**
     * Add Control Panel to user panel
     */
    public function menu($name,&$cp) {
        switch($name){
            case 'user_cp':
                if ($this->user->id && access('admin')) {
                    $cp->{Url::gear('admin')} = icon('cog') . ' ' . t('Control Panel');
                }
                break;
        }
    }

    /**
     * Dispatch request
     */
    public function index($action = '', $subaction = 'index') {
        $args = $this->router->getArgs();
        $rev_args = array_reverse($args);
        $class = array();
        $stop = FALSE;
        Template::setGlobal('title',t('Control Panel'));
        while ($piece = array_pop($rev_args)) {
                $class[] = $piece;
                $gear = implode('_', $class);
                if ($this->gears->$gear) {
                    $callback = array($this->gears->$gear, 'admin');
                    if (is_callable($callback)) {
                        event('admin.gear.request',$this->gears->$gear);
                        Template::setGlobal('title',$gear);
                        $this->router->exec($callback, $rev_args);
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
