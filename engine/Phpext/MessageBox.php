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
 * Provides attractive and customizable tooltips for any element. The QuickTips singleton is used to configure and manage tooltips globally for multiple elements in a generic manner. To create individual tooltips with maximum customizability, you should consider either Ext.Tip or Ext.ToolTip.
 * <p>Quicktips can be configured via tag attributes directly in markup, or by registering quick tips programmatically via the register method.</p>
 * <p>The singleton's instance of Ext.QuickTip is available via getQuickTip, and supports all the methods, and all the all the configuration properties of Ext.QuickTip. These settings will apply to all tooltips shown by the singleton.<p>
 * @package PhpExt
 */
class PhpExt_MessageBox extends PhpExt_Object {	        
    
	protected function __construct() {
		parent::__construct();	

		$this->setExtClassInfo("Ext.Msg");
	}		
	
	/**
	 * Button config that displays a single Cancel button
	 * @return PhpExt_JavascriptStm
	 */
	static public function CANCEL() {
	    return PhpExt_Javascript::variable("Ext.Msg.CANCEL");
	}
	
    /**
	 * The CSS class that provides the ERROR icon image
	 * @return PhpExt_JavascriptStm
	 */
	static public function ERROR() {
	    return PhpExt_Javascript::variable("Ext.Msg.ERROR");
	}
	
    /**
	 * The CSS class that provides the INFO icon image
	 * @return PhpExt_JavascriptStm
	 */
	static public function INFO() {
	    return PhpExt_Javascript::variable("Ext.Msg.INFO");
	}
	
    /**
	 * Button config that displays a single OK button
	 * @return PhpExt_JavascriptStm
	 */
	static public function OK() {
	    return PhpExt_Javascript::variable("Ext.Msg.OK");
	}
	
    /**
	 * Button config that displays OK and Cancel buttons
	 * @return PhpExt_JavascriptStm
	 */
	static public function OKCANCEL() {
	    return PhpExt_Javascript::variable("Ext.Msg.OKCANCEL");
	}

    /**
	 * The CSS class that provides the QUESTION icon image
	 * @return PhpExt_JavascriptStm
	 */
	static public function QUESTION() {
	    return PhpExt_Javascript::variable("Ext.Msg.QUESTION");
	}
	
    /**
	 * The CSS class that provides the WARNING icon image
	 * @return PhpExt_JavascriptStm
	 */
	static public function WARNING() {
	    return PhpExt_Javascript::variable("Ext.Msg.WARNING");
	}
    /**
	 * Button config that displays Yes and No buttons
	 * @return PhpExt_JavascriptStm
	 */
	static public function YESNO() {
	    return PhpExt_Javascript::variable("Ext.Msg.YESNO");
	}
    /**
	 * Button config that displays Yes, No and Cancel buttons
	 * @return PhpExt_JavascriptStm
	 */
	static public function YESNOCANCEL() {
	    return PhpExt_Javascript::variable("Ext.Msg.YESNOCANCEL");	    
	}
	
	/**************** STATIC METHODS *********************/

	/**
	 * Displays a standard read-only message box with an OK button (comparable to the basic JavaScript alert prompt). If a callback function is passed it will be called after the user clicks the button, and the id of the button that was clicked will be passed as the only parameter to the callback (could also be the top-right close button).
	 * 
	 * @param string $title The title bar text
	 * @param string $msg The message box body text
	 * @param PhpExt_JavascriptStm $fn (optional) The callback function invoked after the message box is closed
	 * @param PhpExt_JavascriptStm $scope (optional) The scope of the callback function
	 * @return PhpExt_JavascriptStm
	 */
	static public function alert($title, $msg, $fn = null, $scope = null) {
	    $args[] = $title;
	    $args[] = $msg;
	    if ($fn !== null)
	        $args[] = $fn;
	    if ($scope !== null)
	        $args[] = $scope;	    		
		$mc = PhpExt_Object::createMethodSignature("alert", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Displays a confirmation message box with Yes and No buttons (comparable to JavaScript's confirm). If a callback function is passed it will be called after the user clicks either button, and the id of the button that was clicked will be passed as the only parameter to the callback (could also be the top-right close button).
	 * 
	 * @param string $title The title bar text
	 * @param string $msg The message box body text
	 * @param PhpExt_JavascriptStm $fn (optional) The callback function invoked after the message box is closed
	 * @param PhpExt_JavascriptStm $scope (optional) The scope of the callback function
	 * @return PhpExt_JavascriptStm
	 */
	static public function confirm($title, $msg, $fn = null, $scope = null) {
	    $args[] = $title;
	    $args[] = $msg;
	    if ($fn !== null)
	        $args[] = $fn;
	    if ($scope !== null) {
	        if ($fn === null ) $args[] = null;
	        $args[] = $scope;
	    }	    		
		$mc = PhpExt_Object::createMethodSignature("confirm", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}

	/**
	 * Hides the message box if it is displayed 
	 * 	 
	 * @return PhpExt_JavascriptStm
	 */
	static public function hide() {		
		$mc = PhpExt_Object::createMethodSignature("hide", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Displays a message box with a progress bar. This message box has no buttons and is not closeable by the user. You are responsible for updating the progress bar as needed via Ext.MessageBox.updateProgress and closing the message box when the process is complete.
	 * 
	 * @param string $title The title bar text
	 * @param string $msg The message box body text
	 * @param string $progressText (optional) The text to display inside the progress bar (defaults to '')
	 * @return PhpExt_JavascriptStm
	 */
	static public function progress($title, $msg, $progressText = null) {
	    $args[] = $title;
	    $args[] = $msg;
	    if ($progressText !== null)
	        $args[] = $progressText;	    		
		$mc = PhpExt_Object::createMethodSignature("progress", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Displays a message box with OK and Cancel buttons prompting the user to enter some text (comparable to JavaScript's prompt). The prompt can be a single-line or multi-line textbox. If a callback function is passed it will be called after the user clicks either button, and the id of the button that was clicked (could also be the top-right close button) and the text that was entered will be passed as the two parameters to the callback.
	 * 
	 * @param string $title The title bar text
	 * @param string $msg The message box body text
	 * @param PhpExt_JavascriptStm $fn (optional) The callback function invoked after the message box is closed
	 * @param PhpExt_JavascriptStm $scope (optional) The scope of the callback function
	 * @param boolean|int $multiline (optional) (optional) True to create a multiline textbox using the defaultTextHeight property, or the height in pixels to create the textbox (defaults to false / single-line)
	 * @param string $value (optional) (optional) Default value of the text input element (defaults to '')
	 * @return PhpExt_JavascriptStm
	 */
	static public function prompt($title, $msg, $fn = null, $scope = null, $multiline = null, $value = null) {
	    $args[] = $title;
	    $args[] = $msg;
	    if ($fn !== null) {
	        $args[] = $fn;
	    }
	    if ($scope !== null) {
	        if ($fn === null ) $args[] = null;
	        $args[] = $scope;
	    }	
	    if ($multiline !== null) {
	        if ($scope === null ) {
	            $args[] = null;
	            $args[] = null;
	        }	        
	        $args[] = $multiline;
	    }
	    if ($value !== null) {
	        if ($multiline === null ) {
	            $args[] = null;
	            $args[] = null;
	            $args[] = null;
	        }	        
	        $args[] = $value; 
	    }   		
		$mc = PhpExt_Object::createMethodSignature("prompt", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Displays a new message box, or reinitializes an existing message box, based on the config options passed in. All display functions (e.g. prompt, alert, etc.) on MessageBox call this function internally, although those calls are basic shortcuts and do not support all of the config options allowed here. 
	 * 
	 * @see PhpExt_MessageBoxOptions 
	 * @param PhpExt_MessageBoxOptions $options A MessageBoxOptions object 
	 * @return PhpExt_JavascriptStm
	 */
	static public function show($options) {	    
		$mc = PhpExt_Object::createMethodSignature("show", array($options), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Updates a progress-style message box's text and progress bar. Only relevant on message boxes initiated via Ext.MessageBox.progress or by calling Ext.MessageBox.show with progress: true.
	 * 
	 * @param float|Javascript_Stm $value Any number between 0 and 1 (e.g., .5, defaults to 0) or a javascript statement 
	 * @param string|Javascript_Stm $progressText The progress text to display inside the progress bar (defaults to '') or a javascript statement
	 * @param string $msg The message box's body text is replaced with the specified string (defaults to undefined so that any existing body text will not get overwritten by default unless a new value is passed in)
	 * @return PhpExt_JavascriptStm
	 */
	static public function updateProgress($value, $progressText, $msg = null) {
	    $args[] = $value;
	    $args[] = $progressText;
	    if ($msg !== null)
	        $args[] = $msg;	    		
		$mc = PhpExt_Object::createMethodSignature("updateProgress", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Updates the message box body text
	 * 
	 * @param float $text (optional) Replaces the message box element's innerHTML with the specified string (defaults to the XHTML-compliant non-breaking space character '&#160;')
	 * @return PhpExt_JavascriptStm
	 */
	static public function updateText($text = null) {
	    $args = array();
	    if ($text !== null)
	        $args[] = $text;	    		
		$mc = PhpExt_Object::createMethodSignature("updateText", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}
	
    /**
	 * Displays a message box with an infinitely auto-updating progress bar. This can be used to block user interaction while waiting for a long-running process to complete that does not have defined intervals. You are responsible for closing the message box when the process is complete.
	 * 
	 * @param string $msg The message box body text
	 * @param string $title (optional) The title bar text
	 * @param PhpExt_ProgressBarWaitConfigObject $config (optional) A PhpExt_ProgressBarWaitConfigObject object
	 * @return PhpExt_JavascriptStm
	 */
	static public function wait($msg, $title = null, $config = null) {
	    $args[] = $msg;
	    if ($title !== null)
	        $args[] = $title;
	    if ($config !== null) {
	        if ($title === null ) $args[] = null;
	        $args[] = $config;
	    }	    		
		$mc = PhpExt_Object::createMethodSignature("wait", $args, true);
		return PhpExt_Object::getMethodInvokeStm("Ext.Msg", $mc, true);
	}	

	

}
