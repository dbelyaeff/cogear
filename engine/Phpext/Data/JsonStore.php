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
 * @see PhpExt_Data_FieldConfigObjectCollection
 */
include_once 'PhpExt/Data/FieldConfigObjectCollection.php';

/**
 * Small helper class to make creating Stores for JSON data easier. 
 * An object literal of this form could also be used as the data config option. 
 * <b>Note: Although they are not listed, this class inherits all of the config options of Store, JsonReader.</b>
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_JsonStore extends PhpExt_Data_Store
{
    // Data
    /**
     * A json string readable by this object's JsonReader. Either this option, or the url option must be specified.
     * @param string $value
     * @return PhpExt_Data_JsonStore
     */
    public function setData($value) {
    	parent::setData($value);
    }	
    /**
     * A json string readable by this object's JsonReader. Either this option, or the url option must be specified.
     * @return string
     */
    public function getData() {
    	return parent::getData();
    }
    
	/**
	 * @var PhpExt_Data_FieldConfigObjectCollection
	 */
	public $_fields = null;
	// Fields	
	/**
	 * Fields Collection 
	 * 
	 * @return PhpExt_Data_FieldConfigObjectCollection
	 */
	public function getFields() {
		return $this->_fields;
	}
	
	// Url
	/**
	 * The URL from which to load data through an HttpProxy. Either this option, or the data option must be specified.
	 * @param string $value
	 * @return PhpExt_Data_JsonStore
	 */
	public function setUrl($value) {
		$this->setExtConfigProperty("url", $value);
		return $this;
	}	
	/**
	 * The URL from which to load data through an HttpProxy. Either this option, or the data option must be specified.
	 * @return string
	 */
	public function getUrl() {
		return $this->getExtConfigProperty("url");
	}
    
	
	/************* JsonReader Properties ******************/
	/**#@+
	 * JsonReader Config Options:
	 * 
	 * This class inherits all of the config options of Store, JsonReader.
	 * 
	 */
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
    public function getTotalProperty() {
    	return $this->getExtConfigProperty("totalProperty");
    }	
	/**#@-*/
	
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.JsonStore", null);
		
		$validProps = array(
		    "data",
		    "fields",
		    "url",
		    // JsonReader
		    "id",
		    "root",
		    "successProperty",
		    "totalProperty"
		);
		$this->addValidConfigProperties($validProps);

		$this->_fields = new PhpExt_Data_FieldConfigObjectCollection();
		$this->setExtConfigProperty("fields", $this->_fields);
	}	
	
	/**
	 * @param PhpExt_Data_FieldConfigObject $field
	 * @return PhpExt_Data_FieldConfigObject
	 */
	public function addField($field) {
		$this->_fields->add($field, $field->getName());
		return $field;
	}
	
	/**
	 * @return PhpExt_Data_FieldConfigObject
	 */
	public function getField($name) {
	    return $this->_fields->getByName($name);
	}
		
 	
	
}

