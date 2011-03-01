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
 * Adds a separator bar to a menu, used to divide logical groups of menu items.
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_Separator extends PhpExt_Menu_BaseItem   
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
     * The default CSS class to use for separators (defaults to "x-menu-sep")
     * @param string $value 
     * @return PhpExt_Menu_Separator
     */
    public function setItemCssClass($value) {
    	$this->setExtConfigProperty("itemCls", $value);
    	return $this;
    }	
    /**
     * The default CSS class to use for separators (defaults to "x-menu-sep")
     * @return string
     */
    public function getItemCssClass() {
    	return $this->getExtConfigProperty("itemCls");
    }
			
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.Separator",null);

		$validProps = array(
		    "hideOnClick",
		    "itemCls"
		);
		$this->addValidConfigProperties($validProps);
		
	}

	public function getJavascript($lazy = false, $varName = null) {	
		if ($lazy)
			return "'-'";
		else {
			return parent::getJavascript($lazy, $varName);
		}
	}
	

 		
}

