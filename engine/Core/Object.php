<?php
/**
 *  Simple object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
abstract class Core_Object extends Options {
    public $object;
    /**
     * Constructor
     * 
     * @param array $data
     */
    public function __construct($options = NULL,$place = NULL) {
        $options && parent::__construct($options, $place);
        $this->object = new Core_ArrayObject();
    }
    /**
     * Get or Set current object
     *
     * @param array|ArrayObject $data
     */
    public function object($data = NULL){
        return $data ? (!is_object($data) ? $this->object->adopt($data) : $this->object = $data) : $this->object;
    }
}