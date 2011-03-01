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
 * @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';
/**
 * @see PhpExt_Data_FieldConfigObjectCollection
 */
include_once 'PhpExt/Data/FieldConfigObjectCollection.php';


/**
 * Abstract base class for reading structured data from a data source and converting it into an object containing PhpExt_Data_Record objects and metadata for use by an PhpExt_Data_Store. This class is intended to be extended and should not be created directly. For existing implementations.
 * 
 * @see PhpExt_Data_ArrayReader
 * @see PhpExt_Data_JsonReader
 * @see PhpExt_Data_XmlReader.
 * @package PhpExt
 * @subpackage Data
 */
abstract class PhpExt_Data_DataReader extends PhpExt_Object
{	
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
	
	// RecordType
    protected $_recordType = null;
	/**
	 * The Record type class for the reader.  It will override the specified fields if available.
	 * @param string $value 
	 * @return PhpExt_Data_DataReader
	 */
	public function setRecordType($value) {
	    $this->_recordType = $value;
	    return $this;
	}	
	/**
	 * The Record type class for the reader.  It will override the specified fields if available.
	 * @return string
	*/
	public function getRecordType() {
	    return $this->_recordType = $value;
	}
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.DataReader", null);

		$this->_fields = new PhpExt_Data_FieldConfigObjectCollection();
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
	
	public function getJavascript($lazy = false, $varName = null) {
		if ($this->_varName == null) {
			$configParams = $this->getConfigParams($lazy);
			$configObj = "{".implode(",",$configParams)."}";

			if ($this->_recordType !== null)
			    $recordType = $this->_recordType;
			else
			    $recordType = $this->_fields->getJavascript(); 			
					
			$className = $this->_extClassName;
	
			$js = "new $className($configObj, $recordType)";
			if ($varName != null) {
				$this->_varName = $varName;
				$js = "var $varName = $js;";
			}					
			return $js;
		} 
		else
			return $this->_varName;
	}
	
 	
	
}

