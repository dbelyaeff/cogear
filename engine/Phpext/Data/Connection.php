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
 * The class encapsulates a connection to the page's originating domain, allowing requests to be made either to a configured URL, or to a URL specified at request time.
 * 
 * Requests made by this class are asynchronous, and will return immediately. No data from the server will be available to the statement immediately following the request call. To process returned data, use a callback in the request options object, or an event listener.
 * 
 * Note: If you are doing a file upload, you will not get a normal response object sent back to your callback or event handler. Since the upload is handled via in IFRAME, there is no XMLHttpRequest. The response object is created using the innerHTML of the IFRAME's document as the responseText property and, if present, the IFRAME's XML document as the responseXML property.
 * 
 * This means that a valid XML or HTML document must be returned. If JSON data is required, it is suggested that it be placed either inside a <textarea> in an HTML document and retrieved from the responseText using a regex, or inside a CDATA section in an XML document and retrieved from the responseXML using standard DOM methods. 
 * 
 * @package PhpExt 
 */
class PhpExt_Data_Connection extends PhpExt_Observable 
{
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';

	// AutoAbort
	/**
	 * (Optional) Whether this request should abort any pending requests. (defaults to false) 
	 * @param boolean $value 
	 * @return PhpExt_Data_Connection
	 */
	public function setAutoAbort($value) {
	    $this->setExtConfigProperty("autoAbort", $value);
	    return $this;
	}	
	/**
	 * (Optional) Whether this request should abort any pending requests. (defaults to false) 
	 * @return boolean
	*/
	public function getAutoAbort() {
	    return $this->getExtConfigProperty("autoAbort");
	}
	
	// DefaultHeaders
	/**
	 * (Optional) An associative array containing request headers which are added to each request made by this object. (defaults to undefined)
	 * @param array $value 
	 * @return PhpExt_Data_Connection
	 */
	public function setDefaultHeaders($value) {
	    $this->setExtConfigProperty("defaultHeaders", $value);
	    return $this;
	}	
	/**
	 * (Optional) An associative array containing request headers which are added to each request made by this object. (defaults to undefined)
	 * @return array
	*/
	public function getDefaultHeaders() {
	    return $this->getExtConfigProperty("defaultHeaders");
	}
	
	// DisableCaching
	/**
	 * (Optional) True to add a unique cache-buster param to GET requests. (defaults to true) 
	 * @param boolean $value 
	 * @return PhpExt_Data_Connection
	 */
	public function setDisableCaching($value) {
	    $this->setExtConfigProperty("disableCaching", $value);
	    return $this;
	}	
	/**
	 * (Optional) True to add a unique cache-buster param to GET requests. (defaults to true) 
	 * @return boolean
	*/
	public function getDisableCaching() {
	    return $this->getExtConfigProperty("disableCaching");
	}

	// ExtraParams
	/**
	 * (Optional) An object containing properties which are used as extra parameters to each request made by this object. (defaults to undefined) 
	 * Format: 
	 * <code>array('param1'=>10,'param2'=>'some value')</code>
	 * @param array $value
	 * @return PhpExt_Data_Connection
	 */
	public function setExtraParams($value) {
		$this->setExtConfigProperty("extraParams", $value);
		return $this;
	}	
	/**
	 * (Optional) An object containing properties which are used as extra parameters to each request made by this object. (defaults to undefined) 
	 * Format: 
	 * <code>array('param1'=>10,'param2'=>'some value')</code>
	 * @return array
	 */
	public function getExtraParams() {
		return $this->getExtConfigProperty("extraParams");
	}
	
	// Method
	/**
	 * (Optional) The default HTTP method to be used for requests. (defaults to undefined; if not set, but request params are present, POST will be used; otherwise, GET will be used.) 
	 * @uses PhpExt_Data_Connection::METHOD_GET
	 * @uses PhpExt_Data_Connection::METHOD_POST
	 * @param boolean $value
	 * @return PhpExt_Data_Connection
	 */
	public function setMethod($value) {
		$this->setExtConfigProperty("method", $value);
		return $this;
	}	
	/**
	 * (Optional) The default HTTP method to be used for requests. (defaults to undefined; if not set, but request params are present, POST will be used; otherwise, GET will be used.) 
	 * @uses PhpExt_Data_Connection::METHOD_GET
	 * @uses PhpExt_Data_Connection::METHOD_POST
	 * @return boolean
	 */
	public function getMethod() {
		return $this->getExtConfigProperty("method");
	}		
	
	// Timeout
	/**
	 * (Optional) The timeout in milliseconds to be used for requests. (defaults to 30000) 
	 * @param integer $value
	 * @return PhpExt_Data_Connection
	 */
	public function setTimeout($value) {
		$this->setExtConfigProperty("timeout", $value);
		return $this;
	}	
	/**
	 * (Optional) The timeout in milliseconds to be used for requests. (defaults to 30000) 
	 * @return integer
	 */
	public function getTimeout() {
		return $this->getExtConfigProperty("timeout");
	}	

	// Url
	/**
	 * (Optional) The default URL to be used for requests to the server. (defaults to undefined) 
	 * @param string $value
	 * @return PhpExt_Data_Connection
	 */
	public function setUrl($value) {
		$this->setExtConfigProperty("url", $value);
		return $this;
	}	
	/**
	 * (Optional) The default URL to be used for requests to the server. (defaults to undefined) 
	 * @return string
	 */
	public function getUrl() {
		return $this->getExtConfigProperty("url");
	}
		
	
		
	
	/**
	 */
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.Connection",null);

		$validProps = array(
		    "autoAbort",
		    "defaultHeaders",
		    "disableCaching",
		    "method",
		    "timeout",
		    "url"
		);
		$this->addValidConfigProperties($validProps);
	}		
 	
	
}

