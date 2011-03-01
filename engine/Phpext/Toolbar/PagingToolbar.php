<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ex JS: http://extjs.com
 * 
 */

/**
 * @see PhpExt_Toolbar_Toolbar
 */
include_once 'PhpExt/Toolbar/Toolbar.php';


/**
 * A specialized toolbar that is bound to a Ext.data.Store and provides automatic paging controls.
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_PagingToolbar extends PhpExt_Toolbar_Toolbar 
{	
    // DisplayInfo
    /**
     * True to display the displayMsg (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Toolbar_PagingToolbar
     */
    public function setDisplayInfo($value) {
    	$this->setExtConfigProperty("displayInfo", $value);
    	return $this;
    }	
    /**
     * True to display the displayMsg (defaults to false)
     * @return boolean
     */
    public function getDisplayInfo() {
    	return $this->getExtConfigProperty("displayInfo");
    }
    
    // DisplayMessage
    /**
     * The paging status message to display (defaults to "Displaying {0} - {1} of {2}"). Note that this string is formatted using the braced numbers 0-2 as tokens that are replaced by the values for start, end and total respectively. These tokens should be preserved when overriding this string if showing those values is desired.
     * @param string $value 
     * @return PhpExt_Toolbar_PagingToolbar
     */
    public function setDisplayMessage($value) {
    	$this->setExtConfigProperty("displayMsg", $value);
    	return $this;
    }	
    /**
     * The paging status message to display (defaults to "Displaying {0} - {1} of {2}"). Note that this string is formatted using the braced numbers 0-2 as tokens that are replaced by the values for start, end and total respectively. These tokens should be preserved when overriding this string if showing those values is desired.
     * @return string
     */
    public function getDisplayMessage() {
    	return $this->getExtConfigProperty("displayMsg");
    }
    
    // EmptyMessage
    /**
     * The message to display when no records are found (defaults to "No data to display")
     * @param string $value 
     * @return PhpExt_Toolbar_PagingToolbar
     */
    public function setEmptyMessage($value) {
    	$this->setExtConfigProperty("emptyMsg", $value);
    	return $this;
    }	
    /**
     * The message to display when no records are found (defaults to "No data to display")
     * @return string
     */
    public function getEmptyMessage() {
    	return $this->getExtConfigProperty("emptyMsg");
    }
    
    // PageSize
    /**
     * The number of records to display per page (defaults to 20)
     * @param integer $value 
     * @return PhpExt_Toolbar_PagingToolbar
     */
    public function setPageSize($value) {
    	$this->setExtConfigProperty("pageSize", $value);
    	return $this;
    }	
    /**
     * The number of records to display per page (defaults to 20)
     * @return integer
     */
    public function getPageSize() {
    	return $this->getExtConfigProperty("pageSize");
    }
    
    // Store
    /**
     * The {@link PhpExt_Data_Store} the paging toolbar should use as its data source (required).
     * @uses PhpExt_Data_Store
     * @param PhpExt_Data_Store $value 
     * @return PhpExt_Toolbar_PagingToolbar
     */
    public function setStore(PhpExt_Data_Store $value) {
    	$this->setExtConfigProperty("store", $value);
    	return $this;
    }	
    /**
     * The {@link PhpExt_Data_Store} the paging toolbar should use as its data source (required).
     * @uses PhpExt_Data_Store
     * @return PhpExt_Data_Store
     */
    public function getStore() {
    	return $this->getExtConfigProperty("store");
    }
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.PagingToolbar", "paging");
	
		$validProps = array(
		    "displayInfo",
		    "displayMsg",
		    "emptyMsg",
		    "pageSize",
		    "store"
		);
		$this->addValidConfigProperties($validProps);

		$this->_mustRender = true;
	}	
	
	
	
 	
	
}

