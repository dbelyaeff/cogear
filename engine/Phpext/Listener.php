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
 * @see PhpExt_Javascript
 */
include_once 'PhpExt/Javascript.php';


/**
 * @package PhpExt
 * @subpackage 
 */
class PhpExt_Listener extends PhpExt_Config_ConfigObject  {
	
    // Handler
    /**
     * The method the event invokes
     * @param string|PhpExt_JavascriptStm $value 
     * @return PhpExt_Listener
     */
    public function setHandler($value) {
    	$this->setExtConfigProperty("fn", $value);
    	return $this;
    }	
    /**
     * The method the event invokes
     * @return string|PhpExt_JavascriptStm
     */
    public function getHandler() {
    	return $this->getExtConfigProperty("fn");
    }
	
    // Scope
    /**
     * (optional) The scope in which to execute the handler function. The handler function's "this" context.
     * @param string|PhpExt_JavascriptStm $value 
     * @return PhpExt_Listener
     */
    public function setScope($value) {
    	$this->setExtConfigProperty("scope", $value);
    	return $this;
    }	
    /**
     * (optional) The scope in which to execute the handler function. The handler function's "this" context.
     * @return string|PhpExt_JavascriptStm
     */
    public function getScope() {
    	return $this->getExtConfigProperty("scope");
    }
    
    // Delay
    /**
     * The number of milliseconds to delay the invocation of the handler after the event fires.
     * @param integer $value 
     * @return PhpExt_Listener
     */
    public function setDelay($value) {
    	$this->setExtConfigProperty("delay", $value);
    	return $this;
    }	
    /**
     * The number of milliseconds to delay the invocation of the handler after the event fires.
     * @return integer
     */
    public function getDelay() {
    	return $this->getExtConfigProperty("delay");
    }
    
    // Single
    /**
     * True to add a handler to handle just the next firing of the event, and then remove itself.
     * @param boolean $value 
     * @return PhpExt_Listener
     */
    public function setSingle($value) {
    	$this->setExtConfigProperty("single", $value);
    	return $this;
    }	
    /**
     * True to add a handler to handle just the next firing of the event, and then remove itself.
     * @return boolean
     */
    public function getSingle() {
    	return $this->getExtConfigProperty("single");
    }
    
    // Buffer
    /**
     * Causes the handler to be scheduled to run in an {@link PhpExt_Util_DelayedTask} delayed by the specified number of milliseconds. If the event fires again within that time, the original handler is not invoked, but the new handler is scheduled in its place.
     * @param integer $value 
     * @return PhpExt_Listener
     */
    public function setBuffer($value) {
    	$this->setExtConfigProperty("buffer", $value);
    	return $this;
    }	
    /**
     * Causes the handler to be scheduled to run in an {@link PhpExt_Util_DelayedTask} delayed by the specified number of milliseconds. If the event fires again within that time, the original handler is not invoked, but the new handler is scheduled in its place.
     * @return integer
     */
    public function getBuffer() {
    	return $this->getExtConfigProperty("buffer");
    }

	
	public function __construct($handler, $scope = null, $delay = null, $single = null, $buffer = null) {
		parent::__construct();
		
		$validProps = array(
		    "fn",
		    "scope",
		    "delay",
		    "single",
		    "buffer"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setHandler($handler);
		$this->setScope($scope);
		$this->setDelay($delay);
		$this->setSingle($single);
		$this->setBuffer($buffer);			
	}							
				
	
}

