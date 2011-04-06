<?php
/**
 * Theme
 *
 *
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2010, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
abstract class Theme extends Gear {
    protected $name = 'Theme';
    protected $description = 'Theme for cogear.';
    protected $type = Gear::THEME;
    protected $order = 100;
    protected $package = 'Themes';
    private static $is_rendered = FALSE;
    public $template;
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
    public function __construct(){
        parent::__construct();
        $this->regions = Core_ArrayObject::transform($this->regions);
        foreach($this->regions as $name=>$region){
            hook($name,array($this,'renderRegion'),$name);
        }
    }
    /**
     * Render region
     * 
     * @param string $name 
     */
    public function renderRegion($name){
        if($this->regions->$name){
            echo $this->regions->$name;
        }
    }
    /**
     * Init
     */
    public function init(){
        $Reflection = new ReflectionClass($this);
        $parent = $Reflection->getParentClass();
        if($parent->name != 'Gear' && $parent->name != 'Theme'){
            $theme = new $parent->name;
            $theme->init();
            $cogear = getInstance();
            $cogear->gears->{$parent->name} = $theme;
        }
        parent::init();
        $cogear = getInstance();
        $cogear->theme = $this;
        Template::bindGlobal('theme',$this);
        $cogear->hook('done',__CLASS__.'->render');
        $this->template = new Template($this->gear.'.'.$this->layout);
    }
    /**
     * Render theme
     */
    public function render(){
        if(self::$is_rendered) return;
        $cogear = getInstance();
        $cogear->response->append($cogear->theme->template->render());
        self::$is_rendered = TRUE;
    }
}
function append($name,$value){
    $cogear = getInstance();
    if(!$cogear->theme->regions->$name) return;
    $cogear->theme->regions->$name->append($value);
}
function prepend($name,$value){
    $cogear = getInstance();
    if(!$cogear->theme->regions->$name) return;
    $cogear->theme->regions->$name->prepend($value);
}