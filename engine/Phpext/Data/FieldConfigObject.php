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
 * @see PhpExt_Config_ConfigObject
 */
include_once 'PhpExt/Config/ConfigObject.php';


/**
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_FieldConfigObject extends PhpExt_Config_ConfigObject
{	
    const TYPE_AUTO = 'auto';
    const TYPE_STRING  = 'string';
    const TYPE_INT = 'int';
    const TYPE_FLOAT = 'float';
    const TYPE_BOOLEAN = 'bool';
    const TYPE_DATE = 'date';
    
    const SORT_DIR_ASC = 'ASC';
    const SORT_DIR_DESC = 'DESC';
    
    
    // Name
    /**
     * The name by which the field is referenced within the Record. This is referenced by, for example the dataIndex property in column definition objects passed to Ext.grid.ColumnModel
     * @param string $value
     * @return PhpExt_Data_FieldConfigObject
     */
    public function setName($value) {
    	$this->setExtConfigProperty("name", $value);
    	return $this;
    }	
    /**
     * The name by which the field is referenced within the Record. This is referenced by, for example the dataIndex property in column definition objects passed to Ext.grid.ColumnModel
     * @return string
     */
    public function getName() {
    	return $this->getExtConfigProperty("name");
    }
    
    // Mapping
    /**
     * (Optional) A path specification for use by the Ext.data.Reader implementation that is creating the Record to access the data value from the data object. If an Ext.data.JsonReader is being used, then this is a string containing the javascript expression to reference the data relative to the record item's root. If an Ext.data.XmlReader is being used, this is an Ext.DomQuery path to the data item relative to the record element. If the mapping expression is the same as the field name, this may be omitted.
     * @param string $value
     * @return PhpExt_Data_FieldConfigObject
     */
    public function setMapping($value) {
    	$this->setExtConfigProperty("mapping", $value);
    	return $this;
    }	
    /**
     * (Optional) A path specification for use by the Ext.data.Reader implementation that is creating the Record to access the data value from the data object. If an Ext.data.JsonReader is being used, then this is a string containing the javascript expression to reference the data relative to the record item's root. If an Ext.data.XmlReader is being used, this is an Ext.DomQuery path to the data item relative to the record element. If the mapping expression is the same as the field name, this may be omitted.
     * @return string
     */
    public function getMapping() {
    	return $this->getExtConfigProperty("mapping");
    }
    
    // Type
    /**
     * (Optional) The data type for conversion to displayable value. Possible values are
     *  - {@link PhpExt_Data_FieldConfigObject::TYPE_AUTO} (Default, implies no conversion)
     *  - {@link PhpExt_Data_FieldConfigObject::TYPE_STRING}
     *  - {@link PhpExt_Data_FieldConfigObject::TYPE_INT}
     *  - {@link PhpExt_Data_FieldConfigObject::TYPE_FLOAT}
     *  - {@link PhpExt_Data_FieldConfigObject::TYPE_BOOLEAN}
     *  - {@link PhpExt_Data_FieldConfigObject::TYPE_DATE}
     * 
     * @param string $value
     * @return PhpExt_Data_FieldConfigObject
     */
    public function setType($value) {
    	$this->setExtConfigProperty("type", $value);
    	return $this;
    }	
    /**
     * (Optional) The data type for conversion to displayable value. Possible values are
     *  - PhpExt_Data_FieldConfigObject::TYPE_AUTO (Default, implies no conversion)
     *  - PhpExt_Data_FieldConfigObject::TYPE_STRING
     *  - PhpExt_Data_FieldConfigObject::TYPE_INT
     *  - PhpExt_Data_FieldConfigObject::TYPE_FLOAT
     *  - PhpExt_Data_FieldConfigObject::TYPE_BOOLEAN
     *  - PhpExt_Data_FieldConfigObject::TYPE_DATE
     * 
     * @return string
     */
    public function getType() {
    	return $this->getExtConfigProperty("type");
    }
    
    // SortType
    /**
     * (Optional) A member of Ext.data.SortTypes.
     * @param string $value
     * @return PhpExt_Data_FieldConfigObject
     */
    public function setSortType($value) {
    	$this->setExtConfigProperty("sortType", $value);
    	return $this;
    }	
    /**
     * (Optional) A member of Ext.data.SortTypes.
     * @return string
     */
    public function getSortType() {
    	return $this->getExtConfigProperty("sortType");
    }
    
    // SortDir
    /**
     * (Optional) Initial direction to sort. PhpExt_Data_FieldObjectConfig::SORT_DIR_ASC or PhpExt_Data_FieldObjectConfig::SORT_DIR_DESC
     * 
     * @see PhpExt_Data_FieldObjectConfig::SORT_DIR_ASC
     * @see PhpExt_Data_FieldObjectConfig::SORT_DIR_DESC
     * 
     * @param string $value
     * @return PhpExt_Data_FieldObjectConfig
     */
    public function setSortDir($value) {
    	$this->setExtConfigProperty("sortDir", $value);
    	return $this;
    }	
    /**
     * (Optional) Initial direction to sort. PhpExt_Data_FieldObjectConfig::SORT_DIR_ASC or PhpExt_Data_FieldObjectConfig::SORT_DIR_DESC
     * 
     * @see PhpExt_Data_FieldObjectConfig::SORT_DIR_ASC
     * @see PhpExt_Data_FieldObjectConfig::SORT_DIR_DESC
     * 
     * @return string
     */
    public function getSortDir() {
    	return $this->getExtConfigProperty("sortDir");
    }
    
    // Convert
    /**
     * (Optional) A function which converts the value provided by the Reader into an object that will be stored in the Record. It is passed the following parameters:
     *   - v : Mixed
     *     The data value as read by the Reader.
     * 
     * @param $value JavascriptStm
     * @return PhpExt_Data_FieldConfigObject
     */
    public function setConvert($value) {
    	$this->setExtConfigProperty("convert", $value);
    	return $this;
    }	
    /**
     * (Optional) A function which converts the value provided by the Reader into an object that will be stored in the Record. It is passed the following parameters:
     *   - v : Mixed
     *     The data value as read by the Reader.
     * 
     * @return JavascriptStm
     */
    public function getConvert() {
    	return $this->getExtConfigProperty("convert");
    }
    
    // DateFormat
    /**
     * (Optional) A format String for the Date.parseDate function.
     * 
     * @param string $value
     * @return PhpExt_Data_FieldConfigObject
     */
    public function setDateFormat($value) {
    	$this->setExtConfigProperty("dateFormat", $value);
    	return $this;
    }	
    /**
     * (Optional) A format String for the Date.parseDate function.
     * 
     * @return string
     */
    public function getDateFormat() {
    	return $this->getExtConfigProperty("dateFormat");
    }	
	
	public function __construct($name, $mapping = null, 
		$type = null, $dateFormat = null, $sortType = null, $sortDir = null, 
		$convert = null) {
		parent::__construct();	
		
		$validProps = array(
		    "name",
		    "mapping",
		    "type",
		    "sortType",
		    "sortDir",
		    "convert",
		    "dateFormat"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setName($name);
		$this->setMapping($mapping);
		$this->setType($type);
		$this->setSortType($sortType);
		$this->setSortDir($sortDir);
		$this->setConvert($convert);
		$this->setDateFormat($dateFormat);			
	}		
			
}

