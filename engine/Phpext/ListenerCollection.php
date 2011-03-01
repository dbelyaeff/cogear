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
 * @see PhpExt_Listener
 */
include_once 'PhpExt/Listener.php';


/**
 * Provides functionality to manage a PhpExt_Listener Collection
 * 
 * @package PhpExt
 */
class PhpExt_ListenerCollection extends PhpExt_AbstractCollection 
{
	
	public function __construct($collection = array()) {
		parent::__construct($collection);			
	}
	
	/**
	 * Adds a PhpExt_Listener to the Collection
	 *
	 * @param PhpExt_Listener $object
	 * @param string $eventName The event name linked to the listener
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Listener $object, $eventName) {
		return $this->addObject($object, $eventName);
	}
	
	/**
	 * Gets the Component with the key specified by $name
	 *
	 * @param string $eventName The event name linked to the listener
	 * @return PhpExt_Listener
	 */
	public function getByName($eventName) {
		return $this->getObjectByName($eventName);
	}
	
	/**
	 * Gets the Component in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Listener
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}

    public function getJavascript() {
		$resolvedObjs = array();
		foreach($this->Collection as $eventName=>&$listener) {
		    $resolvedListeners[] = "'$eventName': ".$listener->getJavascript();						
		}		
		return "{".implode(",",$resolvedListeners)."}";

	}
}


