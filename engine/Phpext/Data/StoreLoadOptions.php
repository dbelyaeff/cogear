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
 * Store {@link PhpExt_Data_Store::load() load} method options  {@link PhpExt_Data_Store}
 * @see PhpExt_Data_Store
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_StoreLoadOptions extends PhpExt_Config_ConfigObject
{
   
    // Params
    /**
     * An object containing properties to pass as HTTP parameters to a remote data source.
     * Format: <code>array('param1'=>10,'param2'=>'some value')</code>
     * @param array $value 
     * @return PhpExt_Data_StoreLoadOptions
     */
    public function setParams($value) {
    	$this->setExtConfigProperty("params", $value);
    	return $this;
    }	
    /**
     * 
     * @return array
     */
    public function getParams() {
    	return $this->getExtConfigProperty("params");
    }

    // Callback
    /**
     * A function to be called after the Records have been loaded. The callback is passed the following arguments:
     *   - r : Ext.data.Record[]
     *   - options: Options object from the load call
     *   - success: Boolean success indicator
     * @param PhpExt_Handler $value 
     * @return PhpExt_Data_StoreLoadOptions
     */
    public function setCallback($value) {
    	$this->setExtConfigProperty("callback", $value);
    	return $this;
    }	
    /**
     * A function to be called after the Records have been loaded. The callback is passed the following arguments:
     *   - r : Ext.data.Record[]
     *   - options: Options object from the load call
     *   - success: Boolean success indicator
     * @return PhpExt_Handler
     */
    public function getCallback() {
    	return $this->getExtConfigProperty("callback");
    }
    
    // Scope
    /**
     * Scope with which to call the callback (defaults to the Store object)
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_Data_StoreLoadOptions
     */
    public function setScope($value) {
    	$this->setExtConfigProperty("scope", $value);
    	return $this;
    }	
    /**
     * Scope with which to call the callback (defaults to the Store object)
     * @return PhpExt_JavascriptStm
     */
    public function getScope() {
    	return $this->getExtConfigProperty("scope");
    }
    
    // Add
    /**
     * Indicator to append loaded records rather than replace the current cache.
     * @param boolean $value 
     * @return PhpExt_Data_StoreLoadOptions
     */
    public function setAdd($value) {
    	$this->setExtConfigProperty("add", $value);
    	return $this;
    }	
    /**
     * Indicator to append loaded records rather than replace the current cache.
     * @return boolean
     */
    public function getAdd() {
    	return $this->getExtConfigProperty("add");
    }
		
    /**
     * 
     *
     * @param array $params An object containing properties to pass as HTTP parameters to a remote data source.
     * @param PhpExt_Handler $callback A function to be called after the Records have been loaded.
     * @param PhpExt_JavascriptStm $scope Scope with which to call the callback (defaults to the Store object)
     * @param boolean $add Indicator to append loaded records rather than replace the current cache.
     */
	public function __construct($params = null, $callback = null, $scope = null, $add = null) {
		parent::__construct();

		$validProps = array(
		    "params",
		    "callback",
		    "scope",
		    "add"
		);
		$this->addValidConfigProperties($validProps);
		    
		if ($params !== null)
		    $this->setParams($params);
		if ($callback !== null)
		    $this->setCallback($callback);
		if ($scope !== null)
		    $this->setScope($scope);
		if ($add !== null)
		    $this->setAdd($add);	
	}	
    
 	
	
}

