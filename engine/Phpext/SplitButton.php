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
 * @see PhpExt_Button
 */
include_once 'PhpExt/Button.php';


/**
 * Simple Button class
 * @package PhpExt
 */
class PhpExt_SplitButton extends PhpExt_Button  
{	
	// ArrowHandler
	/**
	 * A function called when the arrow button is clicked (can be used instead of click event)
	 * @param PhpExt_Handler $value 
	 * @return PhpExt_SplitButton
	 */
	public function setArrowHandler($value) {
		$this->setExtConfigProperty("arrowHandler", $value);
		return $this;
	}	
	/**
	 * A function called when the arrow button is clicked (can be used instead of click event)
	 * @return PhpExt_Handler
	 */
	public function getArrowHandler() {
		return $this->getExtConfigProperty("arrowHandler");
	}
	
	// ArrowTooltip
	/**
	 * The title attribute of the arrow
	 * @param string $value 
	 * @return PhpExt_SplitButton
	 */
	public function setArrowTooltip($value) {
		$this->setExtConfigProperty("arrowTooltip", $value);
		return $this;
	}	
	/**
	 * The title attribute of the arrow
	 * @return string
	 */
	public function getArrowTooltip() {
		return $this->getExtConfigProperty("arrowTooltip");
	}
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.SpitButton", "splitbutton");
		
		$validProps = array(
		    "arrowHandler",
		    "arrowTooltip"
		);	
		$this->addValidConfigProperties($validProps);
		
	}

	/**
	 * Helper function to create a SplitButton
	 * If $iconUrl is set it asigns the corresponding CssClass 'x-btn-text-icon' to show icon and text.
	 *
	 * @param string $text
	 * @param string $iconUrl
	 * @param PhpExt_Handler $handler
	 * @return PhpExt_Toolbar_Button
	 */
    public static function createSplitButton($text, $iconUrl = null, $arrowHandler = null) {
        $btn = new PhpExt_Toolbar_Button();
	    $btn->setText($text);
		if ($iconUrl !== null) {
		    $btn->setIcon($iconUrl);
		    if ($btn->getCssClass() == null)
		        $btn->setCssClass("x-btn-text-icon");       
		}
		if ($arrowHandler !== null)
		    $btn->setArrowHandler($arrowHandler);
		return $btn; 
	}
	
}

