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
include_once 'PhpExt/Observable.php';
/**
 * @see PhpExt_Config_ConfigObject
 */
include_once 'PhpExt/Config/ConfigObject.php';

/**
 * The Store class encapsulates a client side cache of {@link PhpExt_Data_Record Record} objects which provide input data for Components such as the {@link PhpExt_Grid_GridPanel GridPanel}, the {@link PhpExt_Form_ComboBox ComboBox}, or the {@link PhpExt_DataView DataView}
 * <p>A Store object uses its configured implementation of {@link PhpExt_Data_DataProxy DataProxy} to access a data object unless you call {@link PhpExt_Data_Store::loadData() loadData} directly and pass in your data.</p>
 * <p>A Store object has no knowledge of the format of the data returned by the Proxy.</p>
 * <p>A Store object uses its configured implementation of {@link PhpExt_Data_DataReader DataReader} to create {@link PhpExt_Data_Record Record} instances from the data object. These Records are cached and made available through accessor functions.</p>
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_Store extends PhpExt_Observable
{
	// AutoLoad
	/**
	 * If passed, this store's load method is automatically called after creation with the autoLoad object
	 * @param boolean $value 
	 * @return PhpExt_Data_Store
	 */
	public function setAutoLoad($value) {
		$this->setExtConfigProperty("autoLoad", $value);
		return $this;
	}	
	/**
	 * If passed, this store's load method is automatically called after creation with the autoLoad object 
	 * @return boolean
	 */
	public function getAutoLoad() {
		return $this->getExtConfigProperty("autoLoad");
	}
	
	// BaseParams
	/**
	 * An array containing properties which are to be sent as parameters on any HTTP request.
	 * Format: 
	 * <code>array('param1'=>10,'param2'=>'some value')</code>
	 * @param array $value 
	 * @return PhpExt_Data_Store
	 */
	public function setBaseParams($value) {
		$this->setExtConfigProperty("baseParams", $value);
		return $this;
	}	
	/**
	 * An object containing properties which are to be sent as parameters on any HTTP request
	 * Format: 
	 * <code>array('param1'=>10,'param2'=>'some value')</code>
	 * @return array
	 */
	public function getBaseParams() {
		return $this->getExtConfigProperty("baseParams");
	}
	
	// Data
	/**
	 * Inline data to be loaded when the store is initialized.
	 * @param mixed $value 
	 * @return PhpExt_Data_Store
	 */
	public function setData($value) {
		$this->setExtConfigProperty("data", $value);
		return $this;
	}	
	/**
	 * Inline data to be loaded when the store is initialized.
	 * @return mixed
	 */
	public function getData() {
		return $this->getExtConfigProperty("data");
	}
	
	// Proxy
	/**
	 * The Proxy object which provides access to a data object.
	 * @see PhpExt_Data_DataProxy
	 * @see PhpExt_Data_HttpProxy
	 * @see PhpExt_Data_MemoryProxy
	 * @see PhpExt_Data_ScriptTagProxy
	 * @param PhpExt_Data_DataProxy $value 
	 * @uses PhpExt_Data_DataProxy
	 * @return PhpExt_Data_Store
	 */
	public function setProxy($value) {
		$this->setExtConfigProperty("proxy", $value);
		return $this;
	}	
	/**
	 * The Proxy object which provides access to a data object.
	 * @see PhpExt_Data_DataProxy
	 * @see PhpExt_Data_HttpProxy
	 * @see PhpExt_Data_MemoryProxy
	 * @see PhpExt_Data_ScriptTagProxy
	 * @return PhpExt_Data_DataProxy
	 */
	public function getProxy() {
		return $this->getExtConfigProperty("proxy");
	}
	
	// PruneModifiedRecords
	/**
	 * True to clear all modified record information each time the store is loaded or when a record is removed. (defaults to false).
	 * @param boolean $value 
	 * @return PhpExt_Data_Store
	 */
	public function setPruneModifiedRecords($value) {
		$this->setExtConfigProperty("var", $value);
		return $this;
	}	
	/**
	 * True to clear all modified record information each time the store is loaded or when a record is removed. (defaults to false).
	 * @return boolean
	 */
	public function getPruneModifiedRecords() {
		return $this->getExtConfigProperty("var");
	}
	
	// Reader
	/**
	 * The Reader object which processes the data object and returns an Array of Ext.data.record objects which are cached keyed by their id property.
	 * @see PhpExt_Data_DataReader
	 * @see PhpExt_Data_ArrayReader
	 * @see PhpExt_Data_JsonReader
	 * @see PhpExt_Data_XmlReader
	 * @uses PhpExt_Data_DataReader
	 * @param PhpExt_Data_DataReader $value 
	 * @return PhpExt_Data_Store
	 */
	public function setReader($value) {
		$this->setExtConfigProperty("reader", $value);
		return $this;
	}	
	/**
	 * The Reader object which processes the data object and returns an Array of Ext.data.record objects which are cached keyed by their id property.
	 * @see PhpExt_Data_DataReader
	 * @see PhpExt_Data_ArrayReader
	 * @see PhpExt_Data_JsonReader
	 * @see PhpExt_Data_XmlReader 	 
	 * @return PhpExt_Data_DataReader
	 */
	public function getReader() {
		return $this->getExtConfigProperty("reader");
	}
	
	// RemoteSort
	/**
	 * True if sorting is to be handled by requesting the Proxy to provide a refreshed version of the data object in sorted order, as opposed to sorting the Record cache in place (defaults to false). 
	 * If remote sorting is specified, then clicking on a column header causes the current page to be requested from the server with the addition of the following two parameters:
     * - sort : String
     *    The name (as specified in the Record's Field definition) of the field to sort on.
     * - dir : String
     *    The direction of the sort, "ASC" or "DESC".
	 *  
	 * @param boolean $value 
	 * @return PhpExt_Data_Store
	 */
	public function setRemoteSort($value) {
		$this->setExtConfigProperty("remoteSort", $value);
		return $this;
	}	
	/**
	 * True if sorting is to be handled by requesting the Proxy to provide a refreshed version of the data object in sorted order, as opposed to sorting the Record cache in place (defaults to false). 
	 * If remote sorting is specified, then clicking on a column header causes the current page to be requested from the server with the addition of the following two parameters:
     * - sort : String
     *    The name (as specified in the Record's Field definition) of the field to sort on.
     * - dir : String
     *    The direction of the sort, "ASC" or "DESC".
	 *  
	 * @return boolean
	 */
	public function getRemoteSort() {
		return $this->getExtConfigProperty("remoteSort");
	}
	
	// SortInfo
	/**
	 * SortInfo Configuration Object
	 * @uses PhpExt_Data_SortInfoConfigObject
	 * @param PhpExt_Data_SortInfoConfigObject $value 
	 * @return PhpExt_Data_Store
	 */
	public function setSortInfo($value) {
		$this->setExtConfigProperty("sortInfo", $value);
		return $this;
	}	
	/**
	 * SortInfo Configuration Object
	 * @return PhpExt_Data_SortInfoConfigObject
	 */
	public function getSortInfo() {
		return $this->getExtConfigProperty("sortInfo");
	}
	
	// StoreId
	/**
	 * If passed, the id to use to register with the StoreMgr
	 * @param string $value 
	 * @return PhpExt_Data_Store
	 */
	public function setStoreId($value) {
		$this->setExtConfigProperty("storeId", $value);
		return $this;
	}	
	/**
	 * If passed, the id to use to register with the StoreMgr
	 * @return string
	 */
	public function getStoreId() {
		return $this->getExtConfigProperty("storeId");
	}
	
	// Url
	/**
	 * If passed, an HttpProxy is created for the passed URL
	 * @param string $value 
	 * @return PhpExt_Data_Store
	 */
	public function setUrl($value) {
		$this->setExtConfigProperty("url", $value);
		return $this;
	}	
	/**
	 * If passed, an HttpProxy is created for the passed URL
	 * @return string
	 */
	public function getUrl() {
		return $this->getExtConfigProperty("url");
	}	

	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.Store", null);		
		
		$validProps = array(
		    "autoLoad",
		    "baseParams",
		    "data",
		    "proxy",
		    "pruneModifiedRecords",
		    "reader",
		    "remoteSort",
		    "sortInfo",
		    "storeId",
		    "url"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
	/**
	 * Loads the Record cache from the configured Proxy using the configured Reader.
	 * <p>If using remote paging, then the first load call must specify the start and limit properties in the options.params property to establish the initial position within the dataset, and the number of Records to cache on each read from the Proxy.</p>
	 * <p><b>It is important to note that for remote data sources, loading is asynchronous, and this call will return before the new data has been loaded. Perform any post-processing in a callback function, or in a "load" event handler.</b></p>
	 * @param PhpExt_Data_StoreLoadOptions $options
	 * @return void
	 */
	public function load(PhpExt_Data_StoreLoadOptions $options = null) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("load", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
	/**
	 * Loads data from a passed data block. A Reader which understands the format of the data must have been configured in the constructor.
	 * @param mixed $data The data block from which to read the Records. The format of the data expected is dependent on the type of Reader that is configured and should correspond to that Reader's readRecords parameter.
	 * @param boolean $append (Optional) True to append the new Records rather than replace the existing cache.
	 */
	public function loadData($data, $append = false) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("loadData", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}	
 	
	
}

