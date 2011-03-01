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
 * @see PhpExt_BoxComponent
 */
include_once 'PhpExt/BoxComponent.php';


/**
 * An updateable progress bar component. The progress bar supports two different modes: manual and automatic.
 * 
 * In manual mode, you are responsible for showing, updating (via updateProgress) and clearing the progress bar as needed from your own code. This method is most appropriate when you want to show progress throughout an operation that has predictable points of interest at which you can update the control.
 * 
 * In automatic mode, you simply call wait and let the progress bar run indefinitely, only clearing it once the operation is complete. You can optionally have the progress bar wait for a specific amount of time and then clear itself. Automatic mode is most appropriate for timed operations or asymchronous operations in which you have no need for indicating intermediate progress.
 * 
 * @package PhpExt
 */
abstract class PhpExt_ProgressBar extends PhpExt_BoxComponent 
{
	// BaseCssClass
	/**
	 * The base CSS class to apply to the progress bar's wrapper element (defaults to 'x-progress')
	 * @param string $value 
	 * @return PhpExt_ProgressBar
	 */
	public function setBaseCssClass($value) {
	    $this->setExtConfigProperty("baseCls", $value);
	    return $this;
	}	
	/**
	 * The base CSS class to apply to the progress bar's wrapper element (defaults to 'x-progress')
	 * @return string
	*/
	public function getBaseCssClass() {
	    return $this->getExtConfigProperty("baseCls");
	}
	
	// Id
	/**
	 * The progress bar element's id (defaults to an auto-generated id)
	 * @param string $value 
	 * @return PhpExt_ProgressBar
	 */
	public function setId($value) {
	    $this->setExtConfigProperty("id", $value);
	    return $this;
	}	
	/**
	 * The progress bar element's id (defaults to an auto-generated id)
	 * @return string
	*/
	public function getId() {
	    return $this->getExtConfigProperty("id");
	}
	
	// Text
	/**
	 * The progress bar text (defaults to '')
	 * @param string $value 
	 * @return PhpExt_ProgressBar
	 */
	public function setText($value) {
	    $this->setExtConfigProperty("text", $value);
	    return $this;
	}	
	/**
	 * The progress bar text (defaults to '')
	 * @return string
	*/
	public function getText() {
	    return $this->getExtConfigProperty("text");
	}
	
	// TextEl
	/**
	 * The element to render the progress text to (defaults to the progress bar's internal text element)
	 * @param string|PhpExt_JavascriptStm $value 
	 * @return PhpExt_ProgressBar
	 */
	public function setTextEl($value) {
	    $this->setExtConfigProperty("textEl", $value);
	    return $this;
	}	
	/**
	 * The element to render the progress text to (defaults to the progress bar's internal text element)
	 * @return string|PhpExt_JavascriptStm
	*/
	public function getTextEl() {
	    return $this->getExtConfigProperty("textEl");
	}
	
	// Value
	/**
	 * A floating point value between 0 and 1 (e.g., .5, defaults to 0)
	 * @param float $value 
	 * @return PhpExt_ProgressBar
	 */
	public function setValue($value) {
	    $this->setExtConfigProperty("value", $value);
	    return $this;
	}	
	/**
	 * A floating point value between 0 and 1 (e.g., .5, defaults to 0)
	 * @return float
	*/
	public function getValue() {
	    return $this->getExtConfigProperty("value");
	}
	
    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.ProgressBar","progress");
		
		$validProps = array(
		    "baseCls",
		    "id",
		    "text",
		    "textEl",
		    "value"		    
		);
		$this->addValidConfigProperties($validProps);			
				
	}	
	
	/********* METHODS ***********/

    /**
	 * Resets the progress bar value to 0 and text to empty string. 
	 * If hide = true, the progress bar will also be hidden (using the hideMode property internally).
	 * 
	 * @param bool $hide (optional) True to hide the progress bar (defaults to false)
	 * @return PhpExt_JavascriptStm
	 */
	static public function reset($hide = false) {
	    $args = array();
	    if ($hide == true)
	        $args[] = $hide;
		$mc = PhpExt_Object::createMethodSignature("reset", $args);
		return PhpExt_Object::getMethodInvokeStm($this->_varName, $mc, true);
	}
	
    /**
	 * Initiates an auto-updating progress bar. A duration can be specified, in which case the progress bar
	 * will automatically reset after a fixed amount of time and optionally call a callback function if specified. 
	 * If no duration is passed in, then the progress bar will run indefinitely and must be manually cleared by calling reset.
	 * 
	 * @param PhpExt_ProgressBarWaitConfigObject $config (optional) A PhpExt_ProgressBarWaitConfigObject object
	 * @return PhpExt_JavascriptStm
	 */
	static public function wait($config) {
	    $args[] = $config;
		$mc = PhpExt_Object::createMethodSignature("wait", $args);
		return PhpExt_Object::getMethodInvokeStm($this->_varName, $mc, true);
	}
		
}

