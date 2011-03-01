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
 * Data reader class to create an Array of Ext.data.Record objects from an Array. Each element of that Array represents a row of data fields. The fields are pulled into a Record object using as a subscript, the mapping property of the field definition if it exists, or the field's ordinal position in the definition.
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_ArrayReader extends PhpExt_Data_DataReader 
{
    // Id
    /**
     * (optional) The subscript within row Array that provides an ID for the Record
     * @param string $value
     * @return PhpExt_Data_ArrayReader
     */
    public function setId($value) {
    	$this->setExtConfigProperty("id", $value);
    	return $this;
    }	
    /**
     * (optional) The subscript within row Array that provides an ID for the Record
     * @return string
     */
    public function getId() {
    	return $this->getExtConfigProperty("id");
    }
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.ArrayReader", null);

		$validProps = array(
		    "id"
		);
		$this->addValidConfigProperties($validProps);
	}		
 	
	
}

