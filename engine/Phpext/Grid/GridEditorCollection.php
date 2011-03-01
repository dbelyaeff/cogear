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
 * @see PhpExt_Grid_GridEditor
 */
include_once 'PhpExt/Grid/GridEditor.php';


/**
 * Provides functionality to manage a PhpExt_Grid_GridEditor Collection
 * 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_GridEditorCollection extends PhpExt_AbstractCollection 
{
	
	public function __construct($collection = array()) {
		parent::__construct($collection);			
	}
	
	/**
	 * Adds a PhpExt_Grid_GridEditor to the Collection
	 *
	 * @param PhpExt_Grid_GridEditor $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Grid_GridEditor $object, $name = null) {
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the GridEditor with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Grid_GridEditor
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the GridEditor in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Grid_GridEditor
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
	
    public function getJavascript() {
		$resolvedObjs = array();
		foreach($this->Collection as $propertyName=>&$editor) {
		    $resolvedObjs[] = "'$propertyName': ".$editor->getJavascript();						
		}		
		return "{".implode(",",$resolvedObjs)."}";
	}
			
}


