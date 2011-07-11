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

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->theme = Theme_Gear::classToTheme($this->gear);
    }

    /**
     * Theme admin page
     * 
     * @param type $action
     * @param type $subaction 
     */
    public function admin($action = NULL, $subaction = NULL) {
        $form = new Form('Admin.theme');

        if ($form->is_ajaxed) {
            if ($form->elements->logo->is_ajaxed) {
                $cogear->set('theme.logo', '');
            }
            if ($form->elements->favicon->is_ajaxed) {
                $cogear->set('theme.favicon', '');
            }
        } else {
            $form->setValues(array(
                'logo' => config('theme.logo'),
                'favicon' => config('theme.favicon'),
            ));
        }
        if ($result = $form->result()) {
            $result->logo && $cogear->set('theme.logo', $result->logo);
            $result->favicon && $cogear->set('theme.favicon', $result->favicon);
        }
        append('content', $form->render());
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