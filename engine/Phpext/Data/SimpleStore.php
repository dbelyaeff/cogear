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
 * Small helper class to make creating Stores from Array data easier.
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_SimpleStore extends PhpExt_Data_Store
{
    // Data
    /**
     * The multi-dimensional array of data
     * @param array|PhpExt_JavascriptStm $value
     * @return PhpExt_Data_SimpleStore
     */
    public function setData($value) {
    	parent::setData($value);
    }	
    /**
     * The multi-dimensional array of data
     * @return array|PhpExt_JavascriptStm
     */
    public function getData() {
    	return parent::setData();
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
	/**
	 * 
	 * @param PhpExt_Data_FieldConfigObject|string $field
	 * @return PhpExt_Data_FieldConfigObject
	 */
	public function addField($field) {
	    if (is_string($field))
	        $field = new PhpExt_Data_FieldConfigObject($field);	    
		$this->_fields->add($field);
		return $field;
	}
	
	/**
	 * @return PhpExt_Data_FieldConfigObject
	 */
	public function getField($name) {
	    return $this->_fields->getByName($name);
	}	
	
	// Id
	/**
	 * The array index of the record id. Leave blank to auto generate ids.
	 * @param integer $value
	 * @return PhpExt_Data_SimpleStore
	 */
	public function setId($value) {
		$this->setExtConfigProperty("id", $value);
		return $this;
	}	
	/**
	 * The array index of the record id. Leave blank to auto generate ids.
	 * @return integer
	 */
	public function getId() {
		return $this->getExtConfigProperty("id");
	}
    
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.SimpleStore", null);

		$validProps = array(
		    "data",
		    "fields",
		    "id"
		);
		$this->addValidConfigProperties($validProps);

		$this->_fields = new PhpExt_Data_FieldConfigObjectCollection();
		$this->setExtConfigProperty("fields", $this->_fields);
	}	
	
	

 	
	
}

