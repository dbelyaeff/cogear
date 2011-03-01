<?php
/**
 *  Options
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
abstract class Options extends Core_ArrayObject{
    /**
     * Constructor
     *
     * @param array|ArrayObject $options
     * @param string $storage
     */
    public function  __construct($options,$storage = '') {
        $this->setOptions($options,$storage);
    }
    /**
     * Set options
     * 
     * @param array|ArrayObject $options
     * @param string $storage
     */
    public function setOptions($options,$storage){
        $storage = $storage ? ($this->$storage instanceof Core_ArrayObject ? $this->$storage : $this->$storage = Core_ArrayObject::transform($this->$storage)) : $this;
        foreach($options as $key=>$value){
            is_array($value) && $value = Core_ArrayObject::transform($value);
            $storage->$key = $value;
        }
    }

    /**
     * Magic __get method
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name){
        return isset($this->$name) ? $this->$name : parent::__get($name);
    }
}