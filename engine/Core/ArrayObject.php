<?php

/**
 * Successor of ArrayObject that creates new instances of itself as vars of itself in case if doesn't exits.
 *
 * If you simpy call $config->prop and prop doesn't exists — it'll be new Recursive ArrayObject.
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2010, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Engine
 * @subpackage	Core
 * @version		$Id$
 */
class Core_ArrayObject extends ArrayObject {
    const BEFORE = 0;
    const AFTER = 1;

    /**
     * Constructor
     *
     * @param	array
     */
    public function __construct($data = array()) {
        parent::__construct($data, parent::ARRAY_AS_PROPS & parent::STD_PROP_LIST);
    }

    /**
     * Wake from serialization
     *
     * @param array $array
     */
    public static function __set_state($array) {
        $object = new self();
        foreach ($array as $key => $value) {
            $object->offsetSet($key, $value);
        }
        return $object;
    }

    /**
     * Transform any array into self object recursively.
     * If argument is Zend_Config object it will be transformed into array.
     *
     * @param	array|ZendConfig	$data
     * @return	ArrayObject
     */
    public static function transform($data) {
        if (is_array($data)) {
            foreach ($data as &$value) {
                if (is_array($value)) {
                    $value = self::transform($value);
                }
            }
            return new self($data);
        }
        return $data;
    }

    /**
     * Mix elements with another object
     *
     * @param  array|self $data
     */
    public function mix($data) {
        $data instanceof self && $data = $data->toArray();
        $this->exchangeArray(self::transform(array_merge($this->toArray(), $data)));
    }

    /**
     * Magic __get method
     *
     * @param	string
     * @return	mixed
     */
    public function __get($name) {
        if (!$this->offsetExists($name)) {
            return NULL;
        }
        return $this->offsetGet($name);
    }

    /**
     * Magic __set method
     *
     * @param	string
     * @param	mixed
     */
    public function __set($name, $value) {
        $this->offsetSet($name, Core_ArrayObject::transform($value));
    }

    /**
     * Magic isset method
     *
     * @param	string	$name	Variable name
     * @return	boolean
     */
    public function __isset($name) {
        return $this->offsetExists($name);
    }

    /**
     * Prepend element — insert element at the beginning
     *
     * @param  mixed   $value
     */
    public function prepend($value) {
        $temp_array = $this->getArrayCopy();
        array_unshift($temp_array, $value);
        $this->exchangeArray($temp_array);
    }
    /**
     * Reverse data
     */
    public function reverse(){
        $this->exchangeArray(array_reverse($this->toArray()));
        return $this;
    }
    /**
     * Inject value at special position or before key
     * 
     * @param   mixed   $value
     * @param   int|string     $position
     * @param   int $order
     */
    public function inject($value, $position=0, $order = self::BEFORE) {
        $result = array();
        for ($i = 0; $this->next(); $i++) {
            if (is_numeric($position)) {
                if ($order == self::BEFORE && $position == $i) {
                    $result[] = $value;
                }
                $result[] = $this->current();
                if ($order == self::AFTER && $position == $i) {
                    $result[] = $value;
                }
            } elseif (is_string($position)) {
                if ($order == self::BEFORE && $position == $this->key()) {
                    $result[$position] = $value;
                }
                $result[$this->key()] = $value;
                if ($order == self::AFTER && $position == $this->key()) {
                    $result[$position] = $value;
                }
            }
        }
        $this->exchangeArray($result);
    }

    /**
     * Simple wrapper for getArrayCopy method
     */
    public function toArray($result = array()) {
        // return $this->getArrayCopy();
        foreach ($this as $key => $value) {
            $result[$key] = $value instanceof self ? $value->toArray() : $value;
        }
        return $result instanceof self ? $result->getArrayCopy() : $result;
    }

    /**
     * Returns data in serialized form
     *
     * @param  string  $glue
     * @return string
     */
    public function toString($glue="\n") {
        return implode($glue, $this->getArrayCopy());
    }

    /**
     * Real toString function
     *
     * @return  string
     */
    public function __toString() {
        return implode("\n", $this->getArrayCopy());
    }

    /**
     * Sort by order
     *
     * @param	object	$a
     * @param	object	$b
     * @return	int
     */
    public static function sortByOrder($a, $b) {
        if ($a->order == $b->order) {
            return 0;
        }
        return floatval($a->order) < floatval($b->order) ? -1 : 1;
    }

}

