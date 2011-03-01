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
    protected $description = 'Manage pages';
    protected $pages = array();
    protected $type = Gear::MODULE;
    protected $sorted_pages = array();
    protected static $globalWidgets = array();
    /**
     * Current page
     *
     * @var array
     */
    protected $page;

    /**
     * Init
     */
    public function init() {
        parent::init();
        $this->setRoutes();
        $this->getPages();
    }
    /**
     * Add routes from database
     */
    public function setRoutes() {
        $cogear = getInstance();
        if (!$routes = $cogear->system_cache->read('routes')) {
            $routes = $cogear->db->get('pages_routes')->result();
            $cogear->system_cache->write('routes', $routes);
        }
        if ($routes) {
            foreach ($routes as $route) {
                $cogear->router->addRoute($route->route, array($this, 'render', $route->pid), TRUE);
            }
        }
    }
    /**
     * Get all pages
     * 
     * Two ways
     * sorted — in hierarchical order
     * plain — to faster get
     */
    public function getPages() {
        $cogear = getInstance();
        if (!$this->sorted_pages = $cogear->system_cache->read('pages/sorted') OR
                !$this->pages = $cogear->system_cache->read('pages')
        ) {
            $result = $cogear->db->order('id', 'ASC')->get('pages')->result();
            foreach ($result as $page) {
                $this->pages[$page->id] = $page;
            }
            $this->sorted_pages = $this->sortPages($result);
            $cogear->system_cache->write('pages/sorted', $this->sorted_pages, array('pages'));
            $cogear->system_cache->write('pages', $this->sorted_pages, array('pages'));
        }
    }
    /**
     * Sort pages
     *  
     * @param array|Core_ArrayObject $data
     * @param int $pid
     * @return array|Core_ArrayObject 
     */
    public function sortPages($data, $pid = 0) {
        $pages = new Core_ArrayObject();
        foreach ($data as $page) {
            if ($page->pid == $pid) {
                $pages[$page->id] = $page;
                if ($children = $this->sortPages($data, $page->id)) {
                    $pages[$page->id]['children'] = $children;
                }
            }
        }
        $pages->uasort(array('Core_ArrayObject', 'sortByOrder'));
        return $pages;
    }
    /**
     * Add widget that displays on every page
     * 
     * @param Core_ArrayObject $widget
     * @param string $region
     * @param int $order 
     */
    public static function addGlobalWidget($widget, $region = 'content', $order = 0) {
        self::$globalWidgets OR self::$globalWidgets = new Core_ArrayObject();
        $widget = new Core_ArrayObject(array(
                    'widget' => $widget,
                    'region' => $region,
                    'order' => $order
                ));
        self::$globalWidgets[] = $widget;
    }
    /**
     *
     * @param type $pid
     * @return type 
     */
    public function getPageWidgets($pid) {
        $cogear = getInstance();
        if (!$widgets = $cogear->system_cache->read('pages_widgets/' . $pid)) {
            if ($widgets = $cogear->db->get_where('pages_widgets', array('pid' => $pid))->result()) {
                $widgets->uasort(array('Core_ArrayObject', 'sortByOrder'));
                $cogear->system_cache->write('pages_widgets/' . $pid, $widgets);
            }
        }
        if($widgets){
            self::$globalWidgets && $widgets->mix(self::$globalWidgets);
        }
        else {
            $widgets = self::$globalWidgets;
        }
        $widgets && $widgets->uasort(array('Core_ArrayObject', 'sortByOrder'));
        return $widgets;
    }

    public function render($pid) {
        if (isset($this->pages[$pid])) {
            $this->page = $this->pages[$pid];
            $cogear = getInstance();
            if($this->page->theme && class_exists($this->page->theme)){
                $cogear->theme = new $this->page->theme;
                $cogear->theme->init();
            }
            $this->page->layout && $cogear->theme->layout = $this->page->layout;
            if ($widgets = $this->getPageWidgets($pid)) {
                foreach ($widgets as $widget) {
                    if ($instance = Pages_Widget::factory($widget->widget, $widget->data)) {
                        $instance->page = $this->page;
                        append($widget->region, $instance->render());
                    }
                }
            }
        }
    }

}