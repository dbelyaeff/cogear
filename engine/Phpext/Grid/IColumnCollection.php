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
 * @see PhpExt_Grid_IColumn
 */
include_once 'PhpExt/Grid/IColumn.php';


/**
 * Provides functionality to manage a PhpExt_Grid_ColumnConfigObject Collection
 * 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_IColumnCollection extends PhpExt_AbstractCollection 
{
	
	public function __construct($collection = array()) {
		parent::__construct($collection);			
	}
	
	/**
	 * Adds a PhpExt_Grid_IColumn to the Collection
	 *
	 * @param PhpExt_Grid_IColumn $object
	 * @param string $name
	 * @return int the index of the new element
	 */
	public function add(PhpExt_Grid_IColumn $object, $name = null) {
		return $this->addObject($object, $name);
	}
	
	/**
	 * Gets the Component with the key specified by $name
	 *
	 * @param string $name
	 * @return PhpExt_Grid_IColumn
	 */
	public function getByName($name) {
		return $this->getObjectByName($name);
	}
	
	/**
	 * Gets the Component in the specified index
	 *
	 * @param int $index
	 * @return PhpExt_Grid_IColumn
	 */
	public function &getByIndex($index) {
		return $this->getObjectByIndex($index);
	}
			
}


