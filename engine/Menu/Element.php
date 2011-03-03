<?php
/**
 * Menu Element
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Menu
 * @version		$Id$
 */
class Menu_Element extends Recursive_ArrayObject{
    protected $name;
    protected $active;
    /**
     * Constructor
     *
     * @param string $value 
     */
    public function __construct($name,$value = '') {
        $this->name = $name;
        $this->offsetSet('value',$value);
    }
    /**
     * Magic __get method
     * 
     * @param string $name
     * @return Menu_Element
     */
    public function __get($name) {
        return $this->offsetExists($name) ? $this->offsetGet($name) : NULL;
    }

    /**
     * Magic __set method
     * 
     * @param string $name
     * @param string $value 
     */
    public function __set($name, $value) {
        $this->offsetSet($name, new self($name,$value));
    }
    /**
     * Set active
     */
    public function setActive(){
        $this->active = TRUE;
    }
    /**
     * Get element name
     * 
     * @return string 
     */
    public function getName(){
        return $this->name;
    }
    /**
     * Check if element is active
     * 
     * @return boolean|NULL
     */
    public function isActive(){
        return $this->active;
    }
    
    /**
     * Magic __toString() method
     * 
     * @return string
     */
    public function __toString() {
        return $this->offsetGet('value');
    }
}
