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
 * @see PhpExt_Observable
 */
include_once'PhpExt/Observable.php';


/**
 * This class encapsulates the user interface of an {@link PhpExt_Grid_GridPanel}. Methods of this class may be used to access user interface elements to enable special display effects. Do not change the DOM structure of the user interface.
 * 
 * This class does not provide ways to manipulate the underlying data. The data model of a Grid is held in an {@link PhpExt_Data_Store}.
 * 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_GridView extends PhpExt_Observable  
{
    // AutoFill
    /**
     * True to auto expand the columns to fit the grid <b>when the grid is created.</b>
     * @param boolean $value 
     * @return PhpExt_Grid_GridView
     */
    public function setAutoFill($value) {
    	$this->setExtConfigProperty("autoFill", $value);
    	return $this;
    }	
    /**
     * True to auto expand the columns to fit the grid <b>when the grid is created.</b>
     * @return boolean
     */
    public function getAutoFill() {
    	return $this->getExtConfigProperty("autoFill");
    }
    
    // EmptyText
    /**
     * Default text to display in the grid body when no rows are available (defaults to '').
     * @param string $value 
     * @return PhpExt_Grid_GridView
     */
    public function setEmptyText($value) {
    	$this->setExtConfigProperty("emptyText", $value);
    	return $this;
    }	
    /**
     * Default text to display in the grid body when no rows are available (defaults to '').
     * @return string
     */
    public function getEmptyText() {
    	return $this->getExtConfigProperty("emptyText");
    }
    
    // EnableRowBody
    /**
     * True to add a second TR element per row that can be used to provide a row body that spans beneath the data row. Use the getRowClass method's rowParams config to customize the row body.
     * @param boolean $value 
     * @return PhpExt_Grid_GridView
     */
    public function setEnableRowBody($value) {
    	$this->setExtConfigProperty("enableRowBody", $value);
    	return $this;
    }	
    /**
     * True to add a second TR element per row that can be used to provide a row body that spans beneath the data row. Use the getRowClass method's rowParams config to customize the row body.
     * @return boolean
     */
    public function getEnableRowBody() {
    	return $this->getExtConfigProperty("enableRowBody");
    }
    
    // ForceFit
    /**
     * True to auto expand/contract the size of the columns to fit the grid width and prevent horizontal scrolling.
     * @param boolean $value 
     * @return PhpExt_Grid_GridView
     */
    public function setForceFit($value) {
    	$this->setExtConfigProperty("forceFit", $value);
    	return $this;
    }	
    /**
     * True to auto expand/contract the size of the columns to fit the grid width and prevent horizontal scrolling.
     * @return boolean
     */
    public function getForceFit() {
    	return $this->getExtConfigProperty("forceFit");
    }    
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.GridView", false);

		$validProps = array(
		    "autoFill",
		    "emptyText",
		    "enableRowBody",
		    "forceFit"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
 	
	
}

