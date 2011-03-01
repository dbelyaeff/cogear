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
 * @see PhpExt_Data_DataProxy
 */
include_once 'PhpExt/Data/DataProxy.php';

/**
 * An implementation of Ext.data.DataProxy that reads a data object from a URL which may be in a domain other than the originating domain of the running page.
 * <p><b>Note that if you are retrieving data from a page that is in a domain that is NOT the same as the originating domain of the running page, you must use this class, rather than HttpProxy.</b></p>
 * <p>The content passed back from a server resource requested by a ScriptTagProxy is executable JavaScript source code that is used as the source inside a <script> tag.</p>
 * <p>In order for the browser to process the returned data, the server must wrap the data object with a call to a callback function, the name of which is passed as a parameter by the ScriptTagProxy. Below is a Java example for a servlet which returns data for either a ScriptTagProxy, or an HttpProxy depending on whether the callback name was passed:
 * <code>
 * boolean scriptTag = false;
 * String cb = request.getParameter("callback");
 * if (cb != null) {
 *     scriptTag = true;
 *     response.setContentType("text/javascript");
 * } else {
 *     response.setContentType("application/x-json");
 * }
 * Writer out = response.getWriter();
 * if (scriptTag) {
 *     out.write(cb + "(");
 * }
 * out.print(dataBlock.toJsonString());
 * if (scriptTag) {
 *     out.write(");");
 * }
 * </code></p>
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_ScriptTagProxy extends PhpExt_Data_DataProxy  
{	
    // CallbackParam
    /**
     * <p>(Optional) The name of the parameter to pass to the server which tells the server the name of the callback function set up by the load call to process the returned data object. Defaults to "callback".</p>
     * <p>The server-side processing must read this parameter value, and generate javascript output which calls this named function passing the data object as its only parameter.</p>
     *  
     * @param string $value
     * @return PhpExt_Data_ScriptTagProxy
     */
    public function setCallbackParam($value) {
    	$this->setExtConfigProperty("callbackParam", $value);
    	return $this;
    }	
    /**
     * (Optional) The name of the parameter to pass to the server which tells the server the name of the callback function set up by the load call to process the returned data object. Defaults to "callback".
     * <p>The server-side processing must read this parameter value, and generate javascript output which calls this named function passing the data object as its only parameter.</p>
     *  
     * @return string
     */
    public function getCallbackParam() {
    	return $this->getExtConfigProperty("callbackParam");
    }
    
    // NoCache
    /**
     * (Optional) Defaults to true. Disable cacheing by adding a unique parameter name to the request.
     * @param boolean $value
     * @return PhpExt_Data_ScriptTagProxy
     */
    public function setNoCache($value) {
    	$this->setExtConfigProperty("nocache", $value);
    	return $this;
    }	
    /**
     * (Optional) Defaults to true. Disable cacheing by adding a unique parameter name to the request.
     * @return boolean
     */
    public function getNoCache() {
    	return $this->getExtConfigProperty("nocache");
    }
    
    // Timeout
    /**
     * (Optional) The number of milliseconds to wait for a response. Defaults to 30 seconds.
     * @param integer $value
     * @return PhpExt_Data_ScriptTagProxy
     */
    public function setTimeout($value) {
    	$this->setExtConfigProperty("timeout", $value);
    	return $this;
    }	
    /**
     * (Optional) The number of milliseconds to wait for a response. Defaults to 30 seconds.
     * @return integer
     */
    public function getTimeout() {
    	return $this->getExtConfigProperty("timeout");
    }
    
    // Url
    /**
     * The URL from which to request the data object.
     * @param string $value
     * @return PhpExt_Data_ScriptTagProxy
     */
    public function setUrl($value) {
    	$this->setExtConfigProperty("url", $value);
    	return $this;
    }	
    /**
     * The URL from which to request the data object.
     * @return string
     */
    public function getUrl() {
    	return $this->getExtConfigProperty("url");
    }	
	
    /**
     * @param string $url The URL from which to request the data object.
     */
	public function __construct($url) {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.ScriptTagProxy", null);

		$validProps = array(
		    "callbackParam",
		    "nocache",
		    "timeout",
		    "url"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setUrl($url);
	}		
 	
	
}

