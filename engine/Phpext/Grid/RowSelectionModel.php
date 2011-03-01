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
 * @see PhpExt_Grid_AbstractSelectionModel
 */
include_once'PhpExt/Grid/AbstractSelectionModel.php';

/**
 * The default SelectionModel used by {@link PhpExt_Grid_GridPanel}. It supports multiple selections and keyboard selection/navigation. The objects stored as selections and returned by getSelected, and getSelections are the Records which provide the data for the selected rows.
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_RowSelectionModel extends PhpExt_Grid_AbstractSelectionModel  
{	
    // SingleSelect
    /**
     * True to allow selection of only one row at a time (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Grid_RowSelectionModel
     */
    public function setSingleSelect($value) {
    	$this->setExtConfigProperty("singleSelect", $value);
    	return $this;
    }	
    /**
     * True to allow selection of only one row at a time (defaults to false)
     * @return boolean
     */
    public function getSingleSelect() {
    	return $this->getExtConfigProperty("singleSelect");
    }
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.RowSelectionModel", null);
	
		$validProps = array(
		    "singleSelect"
		);
		$this->addValidConfigProperties($validProps);
	}				

}



