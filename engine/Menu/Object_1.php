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
class Menu_Object extends Recursive_ArrayObject {

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
     * Name of active element
     * 
     * @var string
     */
    protected $active;
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
//        if (!$this->offsetExists($name)) {
           // $this->offsetSet($name, new Menu_Element($name));
//        }
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
        $it = new RecursiveIteratorIterator($this->getIterator());
        $name = (array) $name;
        $current = array_shift($name);
        while ($it->valid()){
            if(is_object($it->current()) && $it->current()->getName() == $name){
                $it->current()->setActive();
                if(!$name) break;
                $current = array_shift($name);
            }
            $it->next();
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
    public function adopt($data, &$leaf = NULL) {
        $leaf OR $leaf = $this;
        if (is_array($data)) {
            foreach ($data as $name => $element) {
                if (is_array($element) && isset($element['value'])) {
                    $leaf->$name = $element['value'];
                    if (isset($element['children'])) {
                        $this->adopt($element['children'],$leaf->$name);
                    }
                } elseif (is_string($element)) {
                    $leaf->$name = $element;
                }
            }
        } else {
            $leaf = $data;
        }
    }

    /**
     * Output menu
     * 
     * @param type $ul
     * @param type $li
     * @return string 
     */
    public function output($ul = 'ul', $li = 'li') {
        $it = new Menu_Iterator($this->getIterator(), $ul, $li);
        while ($it->valid()) {
            $it->result .= str_repeat("\t", $it->getDepth() + 1) . '<' . $li .(is_object($it->current()) && $it->current()->isActive() ? ' class="active"' : ''). '>' . $it->current() . "\n";
            $it->next();
        }
        return $it->getResult();
    }

}
