<?php

/**
 * Theme Object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Theme
 * @version		$Id$
 */
abstract class Theme_Object extends Gear {

    protected $name = 'Theme';
    protected $description = 'Theme for cogear.';
    protected $type = Gear::THEME;
    protected $order = 100;
    protected $package = 'Themes';
    private static $is_rendered = FALSE;
    public $template;
    public $theme;
    public $layout = 'index';
    public $regions = array(
        'header' => array(),
        'content' => array(),
        'sidebar' => array(),
        'footer' => array(),
    );

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->regions = Core_ArrayObject::transform($this->regions);
        foreach ($this->regions as $name => $region) {
            hook($name, array($this, 'renderRegion'), NULL, $name);
        }
        $this->theme = Theme_Gear::classToTheme($this->gear);
    }

    /**
     * Register region
     *  
     * @param string $name 
     */
    public static function registerRegion($name) {
        cogear()->theme->current->regions->$name OR cogear()->theme->current->regions->$name = new Core_ArrayObject();
    }

    /**
     * Render region
     * 
     * @param string $name 
     */
    public function renderRegion($name) {
        if ($this->regions->$name) {
            echo $this->regions->$name;
        }
    }

    /**
     * Init
     */
    public function init() {
        $parent = $this->reflection->getParentClass();
        if ($parent->name != 'Gear' && $parent->name != 'Theme') {
            $theme = new $parent->name;
            $theme->init();
        }
        parent::init();
    }

    /**
     * Activate
     */
    public function activate() {
        $cogear = getInstance();
        Template::bindGlobal('theme', $this);
        hook('done', array($this, 'render'));
    }

    /**
     * Render theme
     */
    public function render() {
        if ($this->is_rendered)
            return;
        $cogear = getInstance();
        $this->template = new Template($this->theme . '.' . $this->layout);
        $cogear->response->append($this->template->render());
        $this->is_rendered = TRUE;
    }
}