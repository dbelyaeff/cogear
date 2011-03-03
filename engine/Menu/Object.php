<?php

/**
 * Menu Object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Menu
 * @version		$Id$
 */
class Menu_Object extends Core_ArrayObject{

    /**
     * Menu
     *  
     * @var type 
     */
    protected $name;
    /**
     * Template
     * 
     * @var string 
     */
    protected $template = 'Menu.menu';
    /**
     * Constructor
     * 
     * @param string $name
     * @param string $template 
     */
    public function __construct($name, $template = '') {
        $this->name = $name;
        $template && $this->template = $template;
    }

    /**
     * Magic __get method
     * 
     * @param string $name
     * @return string|Core_ArrayObject
     */
    public function __get($name) {
        return $this->offsetGet($name);
    }

    /**
     * Magic __set method
     * 
     * @param string $name
     * @param string $value 
     */
    public function __set($name, $value) {
        $this->offsetSet($name, new Menu_Element($name,$value));
    }
    /**
     * Set active element name
     * 
     * @param string $name 
     */
    public function setActive($name){
         foreach($this as $key=>&$element){
             $key == $name && $element->setActive();
         }
    }
    /**
     * Render menu
     * 
     * @return string 
     */
    public function render() {
        $tpl = new Template($this->template);
        $tpl->assign('menu', $this);
        return $tpl->render();
    }

    /**
     * Transform array to menu
     * 
     * $data = array(
     *  'level_one_element' => array(
     *          'value' => 'level_one_element_value',
     *          'children' => array(
     *              'level_two_element' => 'level_one_element_value',
     *              …
     *          )
     *      )
     * );
     * 
     * @param array $data 
     */
    public function adopt($data) {
        foreach($data as $key=>$value){
            $this->$key = $value;
        }
    }
}
