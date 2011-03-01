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
 * @see PhpExt_AbstractCollection
 */
include_once 'PhpExt/AbstractCollection.php';


/**
 * Provides functionality to manage a PhpExt_Data_FieldConfigObject Collection
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_FieldConfigObjectCollection extends PhpExt_AbstractCollection 
{
	
	public function __construct($collection = array()) {
		parent::__construct($collection);			
	}
	
	/**
	 * Adds a PhpExt_Data_FieldConfigObject to the Collection
	 *
	 * @param PhpExt_Data_FieldConfigObject $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Data_FieldConfigObject $object, $name = null) {	    
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the PhpExt_Data_FieldConfigObject with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Data_FieldConfigObject
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the PhpExt_Data_FieldConfigObject in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Data_FieldConfigObject
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
			
}


