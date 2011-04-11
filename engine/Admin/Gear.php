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
        hook('user_cp.render.before', array($this, 'hookControlPanel'));
    }

    /**
     * Add Control Panel to user panel
     */
    public function hookControlPanel($cp) {
        $cogear = getInstance();
        $cogear->user->id && access('admin') && $cp->admin = HTML::a(Url::gear('admin'), t('Control Panel'));
        ;
    }

    /**
     * Request handler
     * 
     * Override parent method. Add title.
     */
    public function request() {
        title(t('Control Panel'));
        parent::request();
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
        while ($piece = array_pop($rev_args)) {
            $class[] = ucfirst($piece);
            $gear = implode('_', $class);
            if ($cogear->gears->$gear) {
                $callback = array($cogear->gears->$gear, 'admin');
                if (is_callable($callback)) {
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
            case 'gears':
                $this->gears($subaction);
                break;
            case 'theme':
                $form = new Form('Admin.theme');

                if ($form->is_ajaxed) {
                    if($form->elements->logo->is_ajaxed){
                        $cogear->set('theme.logo', '');
                        $logo_removed_flag = TRUE;
                    }
                    if($form->elements->favicon->is_ajaxed){
                        $cogear->set('theme.favicon', '');
                        $favicon_removed_flag = TRUE;
                    }
                } else {
                    $form->setValues(array(
                        'logo' => config('theme.logo'),
                        'favicon' => config('theme.favicon'),
                    ));
                }
                if ($result = $form->result()) {
                    isset($logo_removed_flag) OR $cogear->set('theme.logo', $result->logo);
                    isset($favicon_removed_flag) OR $cogear->set('theme.favicon', $result->favicon);
                }
                append('content', $form->render());
                break;
        }
    }

    public function gears($action = 'index') {
        d('Admin Gears');
        $cogear = getInstance();
        $all_gears = $cogear->getAllGears();
        $active_gears = $cogear->getActiveGears();
        $inactive_gears = array_diff($all_gears, $active_gears);
        $all_count = sizeof($all_gears);
        $active_count = sizeof($active_gears);
        $inactive_count = sizeof($inactive_gears);
        $top_menu = Template::getGlobal('top_menu');
        $root = Url::gear('admin');
        $top_menu->{$root . 'gears'} = t('Active');
        $top_menu->{$root . 'gears'}->count = $active_count;
        $top_menu->{$root . 'gears/all'} = t('All');
        $top_menu->{$root . 'gears/all'}->count = $all_count;
        $top_menu->{$root . 'gears/inactive'} = t('Inactive');
        $top_menu->{$root . 'gears/inactive'}->count = $inactive_count;
        $top_menu->{$root . 'gears/new'} = t('New');
        $top_menu->{$root . 'gears/updates'} = t('Updates');
        $top_menu->{$root . 'gears/add'} = t('Add');
        $doaction = NULL;
        if (!empty($_REQUEST['action-top']))
            $doaction = $_REQUEST['action-top'];
        if (!empty($_REQUEST['action-bottom']))
            $doaction = $_REQUEST['action-bottom'];
        if (!empty($_REQUEST['action']))
            $doaction = $_REQUEST['action'];
        if ($doaction && isset($_REQUEST['gears'])) {
            $gears = $this->filter_gears($_REQUEST['gears']);
            switch ($doaction) {
                case 'activate':
                    $this->activate_gears($gears);
                    break;
                case 'deactivate':
                    $this->deactivate_gears($gears);
                    break;
                case 'update':
                    $this->update_gears($_REQUEST['gears']);
                    break;
            }
            back();
        }
        switch ($action) {
            case 'index':
                $gears = array();
                foreach ($active_gears as $gear => $class) {
                    $object = new $class;
                    $object->active = TRUE;
                    $gears[$object->package][$gear] = $object;
                }
                $tpl = new Template('Admin_Theme.gears');
                $tpl->packages = $gears;
                $tpl->link = Url::gear('admin') . '/gears';
                append('content', $tpl->render());
                break;
            case 'all':
                $gears = array();
                foreach ($all_gears as $gear => $class) {
                    $object = new $class;
                    $object->active = ($object->package == 'Core' OR $object->type == Gear::CORE OR in_array($gear, array_keys($active_gears)));
                    $gears[$object->package][$gear] = $object;
                }
                $tpl = new Template('Admin_Theme.gears');
                $tpl->packages = $gears;
                $tpl->link = Url::gear('admin') . '/gears';
                append('content', $tpl->render());
                break;
            case 'inactive':
                $gears = array();
                foreach ($inactive_gears as $gear => $class) {
                    $object = new $class;
                    $object->active = ($object->package == 'Core' OR $object->type == Gear::CORE OR in_array($gear, array_keys($active_gears)));
                    $gears[$object->package][$gear] = $object;
                }
                $tpl = new Template('Admin_Theme.gears');
                $tpl->packages = $gears;
                $tpl->link = Url::gear('admin') . '/gears';
                append('content', $tpl->render());
                break;
            case 'new':
                $gears = array();
                $new_period = 60 * 60 * 7; // Gears that has been updated last week are to be new
                foreach ($all_gears as $gear => $class) {
                    $object = new $class;
                    if (time() - $object->file->getMTime() <= $new_period) {
                        if (!$object->active = ($object->package == 'Core' OR $object->type == Gear::CORE OR in_array($gear, array_keys($active_gears)))) {
                            $gears[$object->package][$gear] = $object;
                        }
                    }
                }
                $tpl = new Template('Admin_Theme.gears');
                $tpl->packages = $gears;
                $tpl->link = Url::gear('admin') . '/gears';
                append('content', $tpl->render());
                break;
        }
    }

    /**
     * Activate gears
     * 
     * @param   array   $gears
     */
    private function activate_gears($gears) {
        $cogear = getInstance();
        $result = array();
        foreach ($gears as $gear) {
            $cogear->activate($gear);
            $result[] = t($gear, 'Gears');
        }
        $result && flash_info(t('Following gears were activated: ') . '<b>' . implode('</b>, <b>', $result) . '</b>.');
    }

    /**
     * Deactivate gears
     * 
     * @param   array   $gears
     */
    private function deactivate_gears($gears) {
        $cogear = getInstance();
        $result = array();
        foreach ($gears as $gear) {
            $cogear->deactivate($gear);
            $result[] = t($gear, 'Gears');
        }
        $result && flash_info(t('Following gears were deactivated: ') . '<b>' . implode('</b>, <b>', $result) . '</b>.');
    }

    /**
     * Update gears
     * 
     * @param   array   $gears
     */
    private function update_gears($gears) {
        $cogear = getInstance();
        $result = array();
        foreach ($gears as $gear) {
            $cogear->update($gear);
            $result[] = t($gear, 'Gears');
        }
        $result && flash_info(t('Following gears were updated: ') . '<b>' . implode('</b>, <b>', $result) . '</b>.');
    }

    /**
     * Filter gears
     * 
     * You can't activate/deactivate/delete Core gears.
     * Also only one theme can be activate at the moment
     * 
     * @param array $gears
     * @return array 
     */
    private function filter_gears($gears) {
        $result = array();
        foreach ($gears as $gear) {
            $class = $gear . '_Gear';
            if (class_exists($class)) {
                $object = new $class;
                if ($object->type == Gear::CORE OR $object->package == 'Core') {
                    continue;
                }
                $result[] = $object->gear;
            }
        }
        return $result;
    }

}
