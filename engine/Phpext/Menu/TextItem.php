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
 * @see PhpExt_Menu_BaseItem
 */
include_once 'PhpExt/Menu/BaseItem.php';

/**
 * Adds a static text string to a menu, usually used as either a heading or group separator.
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_TextItem extends PhpExt_Menu_BaseItem   
{	
    // HideOnClick
    /**
     * True to hide the containing menu after this item is clicked (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Menu_Separator
     */
    public function setHideOnClick($value) {
    	return parent::setHideOnClick($value);
    }	
    /**
     * True to hide the containing menu after this item is clicked (defaults to false)
     * @return boolean
     */
    public function getHideOnClick() {
    	return parent::getHideOnClick();
    }
    
    // ItemCssClass
    /**
     * The default CSS class to use for text items (defaults to "x-menu-text")
     * @param string $value 
     * @return PhpExt_Menu_Separator
     */
    public function setItemCssClass($value) {
    	$this->setExtConfigProperty("itemCls", $value);
    	return $this;
    }	
    /**
     * The default CSS class to use for text items (defaults to "x-menu-text")
     * @return string
     */
    public function getItemCssClass() {
    	return $this->getExtConfigProperty("itemCls");
    }		
	
    // Text
    /**
     * The text to display for this item (defaults to '')
     * @param boolean $value 
     * @return PhpExt_Menu_TextItem
     */
    public function setText($value) {
    	$this->setExtConfigProperty("text", $value);
    	return $this;
    }	
    /**
     * The text to display for this item (defaults to '')
     * @return boolean
     */
    public function getText() {
    	return $this->getExtConfigProperty("text");
    }
		
	public function __construct($text, $handler = null) {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.TextItem",null);		
				
		$this->setText($text);
		if ($handler !== null)
		    $this->setHandler($handler);
	}
 		
}

