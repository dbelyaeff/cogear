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
 * Provides functionality to manage a PhpExt_Component Collection
 * 
 * @package PhpExt
 */
class PhpExt_ButtonCollection extends PhpExt_AbstractCollection 
{
	
	public function __construct($collection = array()) {
		parent::__construct($collection);		
		$this->setForceArray(true);	
	}
	
    /**
	 * Adds a PhpExt_Button to the Collection
	 *
	 * @param PhpExt_Button $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Button $object, $name = null) {
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the Component with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Button
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the Component in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Button
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
			
}


