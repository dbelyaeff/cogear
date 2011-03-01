<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ex JS: http://extjs.com
 * 
 */

/**
 * @see PhpExt_SplitButton
 */
include_once 'PhpExt/SplitButton.php';
/**
 * @see PhpExt_Toolbar_IToolbarItem
 */
include_once 'PhpExt/Toolbar/IToolbarItem.php';

/**
 * A menu button that renders into a toolbar.
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_SplitButton extends PhpExt_SplitButton implements PhpExt_Toolbar_IToolbarItem  
{		
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Toolbar.SplitButton", "tbsplit");
		
	}
	
	/**
	 * Helper function to create a Toolbar SplitButton
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

