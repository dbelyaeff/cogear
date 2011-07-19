<?php

/**
 * Gears manager
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Gears
 * @version		$Id$
 */
class Gears_Gear extends Gear {

    protected $name = 'Gears manager';
    protected $description = 'Manage and download gears.';
    protected $type = Gear::CORE;
    protected $package = 'Gears';
    protected $order = 0;

    public function menu($name, &$menu) {
        switch ($name) {
            case 'admin':
                $menu->{'gears/active'} = t('Gears');
                break;
            case 'tabs_gears':
                $menu->{'gears/active'} = t('Active');
                $menu->{'gears/active'}->count = $active_count;
                $menu->{'gears/all'} = t('All');
                $menu->{'gears/all'}->count = $all_count;
                $menu->{'gears/inactive'} = t('Inactive');
                $menu->{'gears/inactive'}->count = $inactive_count;
                $menu->{'gears/new'} = t('New');
                $menu->{'gears/updates'} = t('Updates');
                $menu->{'gears/add'} = t('Add');
                break;
        }
    }

    /**
     * Default dispatcher
     * 
     * @param string $type 
     */
    public function index($action = '', $subaction = NULL) {
        
    }

    public function admin($action = 'active') {
        new Menu_Tabs('gears',Url::gear('admin'));
        d('Admin Gears');
        $cogear = getInstance();
        $all_gears = $cogear->getAllGears();
        $active_gears = $cogear->getActiveGears();
        $inactive_gears = array_diff($all_gears, $active_gears);
        $all_count = sizeof($all_gears);
        $active_count = sizeof($active_gears);
        $inactive_count = sizeof($inactive_gears);

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
            case 'active':
                $gears = array();
                foreach ($active_gears as $gear => $class) {
                    if (class_exists($class)) {
                        $object = new $class;
                        $object->active = TRUE;
                        $gears[$object->package][$gear] = $object;
                    }
                }
                $tpl = new Template('Gears.list');
                $tpl->packages = $gears;
                $tpl->link = Url::gear('admin') . '/gears';
                append('content', $tpl->render());
                break;
            case 'all':
                $gears = array();
                foreach ($all_gears as $gear => $class) {
                    if (class_exists($class)) {
                        $object = new $class;
                        $object->active = ($object->package == 'Core' OR $object->type == Gear::CORE OR in_array($gear, array_keys($active_gears)));
                        $gears[$object->package][$gear] = $object;
                    }
                }
                $tpl = new Template('Gears.list');
                $tpl->packages = $gears;
                $tpl->link = Url::gear('admin') . '/gears';
                append('content', $tpl->render());
                break;
            case 'inactive':
                $gears = array();
                foreach ($inactive_gears as $gear => $class) {
                    if (class_exists($class)) {
                        $object = new $class;
                        $object->active = ($object->package == 'Core' OR $object->type == Gear::CORE OR in_array($gear, array_keys($active_gears)));
                        $gears[$object->package][$gear] = $object;
                    }
                }
                $tpl = new Template('Gears.list');
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
                $tpl = new Template('Gears.list');
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
        $result && flash_success(t('Following gears were activated: ') . '<b>' . implode('</b>, <b>', $result) . '</b>.');
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
        $result && flash_success(t('Following gears were deactivated: ') . '<b>' . implode('</b>, <b>', $result) . '</b>.');
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
        $result && flash_success(t('Following gears were updated: ') . '<b>' . implode('</b>, <b>', $result) . '</b>.');
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