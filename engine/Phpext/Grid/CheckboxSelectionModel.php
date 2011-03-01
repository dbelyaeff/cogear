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
 * @see PhpExt_Grid_RowSelectionModel
 */
include_once'PhpExt/Grid/RowSelectionModel.php';

/**
 * @see PhpExt_Grid_IColumn
 */
include_once 'PhpExt/Grid/IColumn.php';

/**
 * A custom selection model that renders a column of checkboxes that can be toggled to select or deselect rows.
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_CheckboxSelectionModel extends PhpExt_Grid_RowSelectionModel implements PhpExt_Grid_IColumn  
{	
	// Header
	/**
	 * Any valid text or HTML fragment to display in the header cell for the checkbox column (defaults to '<div class="x-grid3-hd-checker"> </div>'). The default CSS class of 'x-grid3-hd-checker' displays a checkbox in the header and provides support for automatic check all/none behavior on header click. This string can be replaced by any valid HTML fragment, including a simple text string (e.g., 'Select Rows'), but the automatic check all/none behavior will only work if the 'x-grid3-hd-checker' class is supplied.
	 * @param string $value 
	 * @return PhpExt_Grid_CheckboxSelectionModel
	 */
	public function setHeader($value) {
		$this->setExtConfigProperty("header", $value);
		return $this;
	}	
	/**
	 * Any valid text or HTML fragment to display in the header cell for the checkbox column (defaults to '<div class="x-grid3-hd-checker"> </div>'). The default CSS class of 'x-grid3-hd-checker' displays a checkbox in the header and provides support for automatic check all/none behavior on header click. This string can be replaced by any valid HTML fragment, including a simple text string (e.g., 'Select Rows'), but the automatic check all/none behavior will only work if the 'x-grid3-hd-checker' class is supplied.
	 * @return string
	 */
	public function getHeader() {
		return $this->getExtConfigProperty("header");
	}
	
	// Sortable
	/**
	 * True if the checkbox column is sortable (defaults to false).
	 * @param boolean $value 
	 * @return PhpExt_Grid_CheckboxSelectionModel
	 */
	public function setSortable($value) {
		$this->setExtConfigProperty("sortable", $value);
		return $this;
	}	
	/**
	 * True if the checkbox column is sortable (defaults to false).
	 * @return boolean
	 */
	public function getSortable() {
		return $this->getExtConfigProperty("sortable");
	}
    
    // Width
    /**
     * The default width in pixels of the checkbox column (defaults to 20).
     * @param integer $value 
     * @return PhpExt_Grid_CheckboxSelectionModel
     */
    public function setWidth($value) {
    	$this->setExtConfigProperty("width", $value);
    	return $this;
    }	
    /**
     * The default width in pixels of the checkbox column (defaults to 20).
     * @return integer
     */
    public function getWidth() {
    	return $this->getExtConfigProperty("width");
    }
    
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.CheckboxSelectionModel", null);
	
	}				
		
}



