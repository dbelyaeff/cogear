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
 * @see PhpExt_Data_DataReader
 */
include_once 'PhpExt/Data/DataReader.php';

/**
 * Data reader class to create an Array of Ext.data.Record objects from a JSON response based on mappings in a provided Ext.data.Record constructor.
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_JsonReader extends PhpExt_Data_DataReader 
{
    // Id
    /**
     * Name of the property within a row object that contains a record identifier value.
     * @param string $value
     * @return PhpExt_Data_JsonReader
     */
    public function setId($value) {
    	$this->setExtConfigProperty("id", $value);
    	return $this;
    }	
    /**
     * Name of the property within a row object that contains a record identifier value.
     * @return string
     */
    public function getId() {
    	return $this->getExtConfigProperty("id");
    }
    
    // Root
    /**
     * Name of the property which contains the Array of row objects.
     * @param string $value
     * @return PhpExt_Data_JsonReader
     */
    public function setRoot($value) {
    	$this->setExtConfigProperty("root", $value);
    	return $this;
    }	
    /**
     * Name of the property which contains the Array of row objects.
     * @return string
     */
    public function getRoot() {
    	return $this->getExtConfigProperty("root");
    }
    
    // SuccessProperty
    /**
     * Name of the property from which to retrieve the success attribute used by forms.
     * @param string $value
     * @return PhpExt_Data_JsonReader
     */
    public function setSuccessProperty($value) {
    	$this->setExtConfigProperty("successProperty", $value);
    	return $this;
    }	
    /**
     * Name of the property from which to retrieve the success attribute used by forms.
     * @return string
     */
    public function getSuccessProperty() {
    	return $this->getExtConfigProperty("successProperty");
    }
    
    // TotalProperty
    /**
     * Name of the property from which to retrieve the total number of records in the dataset. This is only needed if the whole dataset is not passed in one go, but is being paged from the remote server.
     * @param string $value
     * @return PhpExt_Data_JsonReader
     */
    public function setTotalProperty($value) {
    	$this->setExtConfigProperty("totalProperty", $value);
    	return $this;
    }	
    /**
     * Name of the property from which to retrieve the total number of records in the dataset. This is only needed if the whole dataset is not passed in one go, but is being paged from the remote server.
     * @return string
     */
    public function getTotal() {
    	return $this->getExtConfigProperty("totalProperty");
    }	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.JsonReader", null);

		$validProps = array(
		    "id",
		    "root",
		    "successProperty",
		    "totalProperty"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
}

