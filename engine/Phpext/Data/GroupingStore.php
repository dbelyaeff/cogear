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
 * @see PhpExt_Data_Store
 */
include_once 'PhpExt/Data/Store.php';

/**
 * A specialized store implementation that provides for grouping records by one of the available fields.
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_GroupingStore extends PhpExt_Data_Store
{
    // GroupField
    /**
     * The field name by which to sort the store's data (defaults to '').
     * @param string $value
     * @return PhpExt_Data_GroupingStore
     */
    public function setGroupField($value) {
    	$this->setExtConfigProperty("groupField", $value);
    	return $this;
    }	
    /**
     * The field name by which to sort the store's data (defaults to '').
     * @return string
     */
    public function getGroupField() {
    	return $this->getExtConfigProperty("groupField");
    }
    
    // GroupOnSort
    /**
     * True to sort the data on the grouping field when a grouping operation occurs, false to sort based on the existing sort info (defaults to false).
     * @param boolean $value
     * @return PhpExt_Data_GroupingStore
     */
    public function setGroupOnSort($value) {
    	$this->setExtConfigProperty("groupOnSort", $value);
    	return $this;
    }
    /**
     * True to sort the data on the grouping field when a grouping operation occurs, false to sort based on the existing sort info (defaults to false).
     * @return boolean
     */
    public function getGroupOnSort() {
    	return $this->getExtConfigProperty("groupOnSort");
    }
    
    // RemoteGroup
    /**
     * True if the grouping should apply on the server side, false if it is local only (defaults to false). If the grouping is local, it can be applied immediately to the data. If it is remote, then it will simply act as a helper, automatically sending the grouping field name as the 'groupBy' param with each XHR call.
     * @param boolean $value
     * @return PhpExt_Data_GroupingStore
     */
    public function setRemoteGroup($value) {
    	$this->setExtConfigProperty("remoteGroup", $value);
    	return $this;
    }
    /**
     * True if the grouping should apply on the server side, false if it is local only (defaults to false). If the grouping is local, it can be applied immediately to the data. If it is remote, then it will simply act as a helper, automatically sending the grouping field name as the 'groupBy' param with each XHR call.
     * @return boolean
     */
    public function getRemoteGroup() {
    	return $this->getExtConfigProperty("remoteGroup");
    }
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.GroupingStore", null);

		$validProps = array(
		    "groupField",
		    "groupOnSort",
		    "remoteGroup"
		);
		$this->addValidConfigProperties($validProps);
	}
 	
	
}

