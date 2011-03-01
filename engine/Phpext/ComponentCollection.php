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
 * @see PhpExt_Component
 */
include_once 'PhpExt/Component.php';


/**
 * Provides functionality to manage a PhpExt_Component Collection
 * 
 * @package PhpExt
 */
class PhpExt_ComponentCollection extends PhpExt_AbstractCollection 
{
    protected $_owner;
	
    public function getOwner() {
        return $this->_owner;
    }
    
	public function __construct($owner, $collection = array()) {
		parent::__construct($collection);
		$this->_owner = $owner;			
	}
	
	
	
	/**
	 * Adds a PhpExt_Component to the Collection
	 *
	 * @param PhpExt_Component $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Component $object, $name = null) {
	    $object->setOwnerCollection($this);
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the Component with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Component
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the Component in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Component
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
			
}


