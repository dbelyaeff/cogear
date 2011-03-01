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
 * @package PhpExt
 */
abstract class PhpExt_AbstractCollection   
{
	/**
	 * Collection Container
	 *
	 * @var array	 
	 */
	public $Collection = array();
	
	/**
	 * True to force the collection to render as array when now elements present.
	 *
	 * @var boolean
	 */
	protected $_forceArray = false;
	
	/**
	 * True to force the collection to render as array when now elements present.
	 *
	 * @param boolean $value
	 */
	public function setForceArray($value) {
	    $this->_forceArray = $value;
	}
	
	/**
	 * True to force the collection to render as array when now elements present.
	 *
	 * @return boolean
	 */
	public function getForceArray() {
	    return $this->_forceArray;
	}
	
	
	public function __construct($collection = array()) {
		$this->Collection = $collection;	
	}
	
	protected function addObject($object, $name = null) {
		if ($name !== null)
			$this->Collection[$name] =& $object;
		else
			$this->Collection[] =& $object;
		return count($this->Collection);
	}
	
	public function removeObject($name) {
	    unset($this->Collection[$name]);
	}
	
	protected function getObjectByName($name) {
		if (array_key_exists($name, $this->Collection))
			return $this->Collection[$name];
		return null;  
	}
	
	protected function getObjectByIndex($index) {
		if ($index < count($this->Collection) )
			return $this->Collection[$index];
		return null;  
	}
	
	public function getCount() {
		return count($this->Collection);
	}
	
	public function getJavascript() {
		$resolvedObjs = array();		
		foreach($this->Collection as &$obj) {			
			$resolvedObjs[] = PhpExt_Javascript::valueToJavascript($obj, true);
		}
		if (count($resolvedObjs) == 1 && !$this->_forceArray)
			return $resolvedObjs[0];
		else
			return "[".implode(",",$resolvedObjs)."]";
	}
	
	static public function isExtObjectCollection($value) {
		if (is_object($value)) {
			return ($value instanceof PhpExt_AbstractCollection);
		}
		return false;
	}
}


