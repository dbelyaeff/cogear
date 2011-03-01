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
 * Data reader class to create an Array of Ext.data.Record objects from an XML document based on mappings in a provided Ext.data.Record constructor.
 *
 * Note that in order for the browser to parse a returned XML document, the Content-Type header in the HTTP response must be set to "text/xml".
 * 
 * Example code:
 * <code>
 * $myReader = new PhpExt_Data_XmlReader()
 * $myReader->setTotalRecords("results") // The element which contains the total dataset size (optional)
 * $myReader->setRecord("row");          // The repeated element which contains row information
 * $myReader->setId("id");                // The element within the row that provides an ID for the record (optional)
 * $myReader->addField(new PhpExt_Data_FieldConfigObject("name","name")); // "mapping" property not needed if it's the same as "name"
 * $myReader->addField(new PhpExt_Data_FieldConfigObject("occupation"));  // This field will use "occupation" as the mapping.
 * </code>
 * 
 * This would consume an XML file like this:
 * 
 * <code>
 * <?xml ?>
 * <dataset>
 * <results>2</results>
 *  <row>
 *    <id>1</id>
 *    <name>Bill</name>
 *    <occupation>Gardener</occupation>
 *  </row>
 *  <row>
 *    <id>2</id>
 *    <name>Ben</name>
 *    <occupation>Horticulturalist</occupation>
 *  </row>
 * </dataset> 
 * </code>
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_XmlReader extends PhpExt_Data_DataReader 
{
    // Id
    /**
     * The DomQuery path relative from the record element to the element that contains a record identifier value.
     * @param string $value 
     * @return PhpExt_Data_XmlReader
     */
    public function setId($value) {
    	$this->setExtConfigProperty("id", $value);
    	return $this;
    }	
    /**
     * The DomQuery path relative from the record element to the element that contains a record identifier value.
     * @return string
     */
    public function getId() {
    	return $this->getExtConfigProperty("id");
    }
    
    // Record
    /**
     * The DomQuery path to the repeated element which contains record information.
     * @param string $value 
     * @return PhpExt_Data_XmlReader
     */
    public function setRecord($value) {
    	$this->setExtConfigProperty("record", $value);
    	return $this;
    }	
    /**
     * The DomQuery path to the repeated element which contains record information.
     * @return string
     */
    public function getRecord() {
    	return $this->getExtConfigProperty("record");
    }
    
    // Success
    /**
     * The DomQuery path to the success attribute used by forms.
     * @param string $value 
     * @return PhpExt_Data_XmlReader
     */
    public function setSuccess($value) {
    	$this->setExtConfigProperty("success", $value);
    	return $this;
    }	
    /**
     * The DomQuery path to the success attribute used by forms.
     * @return string
     */
    public function getSuccess() {
    	return $this->getExtConfigProperty("success");
    }
    
    // TotalRecords
    /**
     * The DomQuery path from which to retrieve the total number of records in the dataset. This is only needed if the whole dataset is not passed in one go, but is being paged from the remote server.
     * @param string $value 
     * @return PhpExt_Data_XmlReader
     */
    public function setTotalRecords($value) {
    	$this->setExtConfigProperty("totalRecords", $value);
    	return $this;
    }	
    /**
     * The DomQuery path from which to retrieve the total number of records in the dataset. This is only needed if the whole dataset is not passed in one go, but is being paged from the remote server.
     * @return string
     */
    public function getTotalRecords() {
    	return $this->getExtConfigProperty("totalRecords");
    }
    
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.XmlReader", null);

		$validProps = array(
		    "id",
		    "record",
		    "success",
		    "totalRecords"
		);
		$this->addValidConfigProperties($validProps);
	}	

 	
	
}

