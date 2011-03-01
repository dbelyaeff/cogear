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
 */
class PhpExt_AutoLoadConfigObject extends PhpExt_Config_ConfigObject
{
	const AUTO_LOAD_METHOD_GET = 'GET';
	const AUTO_LOAD_METHOD_POST = 'POST';

	// Url
	/**
	 * The URL to request.
	 * @param string $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setUrl($value) {
		$this->setExtConfigProperty("url", $value);
		return $this;
	}	
	/**
	 * The URL to request or a function which returns the URL.
	 * @return string
	 */
	public function getUrl() {
		return $this->getExtConfigProperty("url");
	}
	
	// Method
	/**
	 * The HTTP method to use. Defaults to AUTO_LOAD_METHOD_POST if params are present, or AUTO_LOAD_METHOD_GET if not.
	 * @uses PhpExt_AutoLoadConfigObject::AUTO_LOAD_METHOD_GET
	 * @uses PhpExt_AutoLoadConfigObject::AUTO_LOAD_METHOD_POST
	 * @param boolean $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setMethod($value) {
		$this->setExtConfigProperty("method", $value);
		return $this;
	}	
	/**
	 * The HTTP method to use. Defaults to AUTO_LOAD_METHOD_POST if params are present, or AUTO_LOAD_METHOD_GET if not.
	 * @uses PhpExt_AutoLoadConfigObject::AUTO_LOAD_METHOD_GET
	 * @uses PhpExt_AutoLoadConfigObject::AUTO_LOAD_METHOD_POST
	 * @return boolean
	 */
	public function getMethod() {
		return $this->getExtConfigProperty("method");
	}
	
	// Params
	/**
	 * The parameters to pass to the server. These may be specified as a urlencoded string, or as an array containing properties which represent parameters.
	 * Format: 
	 * <code>array('param1'=>10,'param2'=>'some value')</code>
	 * @param array $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setParams($value) {
		$this->setExtConfigProperty("params", $value);
		return $this;
	}	
	/**
	 * The parameters to pass to the server. These may be specified as a urlencoded string, or as an array containing properties which represent parameters.
	 * Format: 
	 * <code>array('param1'=>10,'param2'=>'some value')</code>
	 * @return array
	 */
	public function getParams() {
		return $this->getExtConfigProperty("params");
	}
	
	// Scripts
	/**
	 * If true any <script> tags embedded in the response text will be extracted and executed. If this option is specified, the callback will be called after the execution of the scripts.
	 * @param boolean $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setScripts($value) {
		$this->setExtConfigProperty("scripts", $value);
		return $this;
	}	
	/**
	 * If true any <script> tags embedded in the response text will be extracted and executed. If this option is specified, the callback will be called after the execution of the scripts. 
	 * @return boolean
	 */
	public function getScripts() {
		return $this->getExtConfigProperty("scripts");
	}
	
	// Callback
	/**
	 * A function to be called when the response from the server arrives. The following parameters are passed:
     *  - el : Ext.Element  - The Element being updated.
     *  - success : Boolean - True for success, false for failure.
     *  - response : XMLHttpRequest - The XMLHttpRequest which processed the update.
     * options : Object - The config object passed to the update call.
	 * @param PhpExt_Handler $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setCallback($value) {
		$this->setExtConfigProperty("callback", $value);
		return $this;
	}	
	/**
	 * A function to be called when the response from the server arrives. The following parameters are passed:
     *  - el : Ext.Element  - The Element being updated.
     *  - success : Boolean - True for success, false for failure.
     *  - response : XMLHttpRequest - The XMLHttpRequest which processed the update.
     * options : Object - The config object passed to the update call.
	 * @return PhpExt_Handler
	 */
	public function getCallback() {
		return $this->getExtConfigProperty("callback");
	}
	
	// Scope
	/**
	 * The scope in which to execute the callback (The callback's this reference.) If the params option is a function, this scope is used for that function also.
	 * @param PhpExt_JavascriptStm $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setScope($value) {
		$this->setExtConfigProperty("scope", $value);
		return $this;
	}	
	/**
	 * The scope in which to execute the callback (The callback's this reference.) If the params option is a function, this scope is used for that function also.
	 * @return PhpExt_JavascriptStm
	 */
	public function getScope() {
		return $this->getExtConfigProperty("scope");
	}
	
	// DiscardUrl
	/**
	 * If not passed as false the URL of this request becomes the default URL for this Updater object, and will be subsequently used in refresh calls.
	 * @param boolean $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setDiscardUrl($value) {
		$this->setExtConfigProperty("discardUrl", $value);
		return $this;
	}	
	/**
	 * If not passed as false the URL of this request becomes the default URL for this Updater object, and will be subsequently used in refresh calls.
	 * @return boolean
	 */
	public function getDiscardUrl() {
		return $this->getExtConfigProperty("discardUrl");
	}
	
	// Timeout
	/**
	 * The timeout to use when waiting for a response.
	 * @param integer $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setTimeout($value) {
		$this->setExtConfigProperty("timeout", $value);
		return $this;
	}	
	/**
	 * The timeout to use when waiting for a response.
	 * @return integer
	 */
	public function getTimeout() {
		return $this->getExtConfigProperty("timeout");
	}
	
	// NoCache
	/**
	 * Only needed for GET requests, this option causes an extra, generated parameter to be passed to defeat caching.
	 * @param boolean $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setNoCache($value) {
		$this->setExtConfigProperty("noCache", $value);
		return $this;
	}	
	/**
	 * Only needed for GET requests, this option causes an extra, generated parameter to be passed to defeat caching.
	 * @return boolean
	 */
	public function getNoCache() {
		return $this->getExtConfigProperty("noCache");
	}
	
	// Text
	/**
	 * The loading text displayed during request.
	 * @param string $value
	 * @return PhpExt_AutoLoadConfigObject
	 */
	public function setText($value) {
		$this->setExtConfigProperty("text", $value);
		return $this;
	}	
	/**
	 * The loading text displayed during request.
	 * @return string
	 */
	public function getText() {
		return $this->getExtConfigProperty("text");
	}		
	
	/**
	 * @param string $url The URL to request.
	 * @param array $params The parameters to pass to the server. These may be specified as a urlencoded string, or as an array containing properties which represent parameters.
	 * @param boolean $scripts If true any <script> tags embedded in the response text will be extracted and executed. If this option is specified, the callback will be called after the execution of the scripts.
	 * @param string $method The HTTP method to use. Defaults to AUTO_LOAD_METHOD_POST if params are present, or AUTO_LOAD_METHOD_GET if not. 
	 */
	public function __construct($url, $params = array(), $scripts = null, $method = null) {
		parent::__construct();

		$validProps = array(
		    "url",
		    "method",
		    "params",
		    "scripts",
		    "callback",
		    "scope",
		    "discardUrl",
		    "timeout",
		    "noCache",
		    "text"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setUrl($url);
		if (count($params) > 0)
		    $this->setParams($params);
		if ($scripts !== null)
		    $this->setScripts($scripts);
		if ($method !== null)
		    $this->setMethod($method);
	}		
 	
	
}

