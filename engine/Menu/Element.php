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
    /**
     * Constructor
     *
     * @param string $value 
     */
    public function __construct($value = '') {
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
        $this->offsetSet($name, new self($value));
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
