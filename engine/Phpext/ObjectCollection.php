<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ext JS: http://extjs.com
 * 
 */
/**
 * @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';
/**
 * @see PhpExt_Javascript
 */
include_once 'PhpExt/Javascript.php';
/**
 * @see PhpExt_AbstractCollection
 */
include_once 'PhpExt/AbstractCollection.php';

/**
 * @package PhpExt
 */
class PhpExt_ObjectCollection extends PhpExt_AbstractCollection   
{
    public function __construct($collection = array()) {
		parent::__construct($collection);				
	}
    
	/**
	 * Adds a PhpExt_Object to the Collection
	 *
	 * @param PhpExt_Object $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add($object, $name = null) {
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the Object with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Object
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the Object in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Object
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
			
}


