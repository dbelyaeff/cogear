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
 * @see PhpExt_Menu_Item
 */
include_once 'PhpExt/Menu/Item.php';

/**
 * Adds a menu item that contains a checkbox by default, but can also be part of a radio group
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_CheckItem extends PhpExt_Menu_Item   
{	
    // Checked
    /**
     * True to initialize this checkbox as checked (defaults to false). Note that if this checkbox is part of a radio group (group = true) only the last item in the group that is initialized with checked = true will be rendered as checked.
     * @param boolean $value 
     * @return PhpExt_Menu_CheckItem
     */
    public function setChecked($value) {
    	$this->setExtConfigProperty("checked", $value);
    	return $this;
    }	
    /**
     * True to initialize this checkbox as checked (defaults to false). Note that if this checkbox is part of a radio group (group = true) only the last item in the group that is initialized with checked = true will be rendered as checked.
     * @return boolean
     */
    public function getChecked() {
    	return $this->getExtConfigProperty("checked");
    }		
    
    // Group
    /**
     * All check items with the same group name will automatically be grouped into a single-select radio button group (defaults to '')
     * @param string $value 
     * @return PhpExt_Menu_CheckItem
     */
    public function setGroup($value) {
    	$this->setExtConfigProperty("group", $value);
    	return $this;
    }	
    /**
     * All check items with the same group name will automatically be grouped into a single-select radio button group (defaults to '')
     * @return string
     */
    public function getGroup() {
    	return $this->getExtConfigProperty("group");
    }
    
    // GroupCssClass
    /**
     * The default CSS class to use for radio group check items (defaults to "x-menu-group-item")
     * @param string $value 
     * @return PhpExt_Menu_CheckItem
     */
    public function setGroupCssClass($value) {
    	$this->setExtConfigProperty("groupClass", $value);
    	return $this;
    }	
    /**
     * The default CSS class to use for radio group check items (defaults to "x-menu-group-item")
     * @return string
     */
    public function getGroupCssClass() {
    	return $this->getExtConfigProperty("groupClass");
    }
    
    // ItemCssClass
    /**
     * The default CSS class to use for check items (defaults to "x-menu-item x-menu-check-item")
     * @param string $value 
     * @return PhpExt_Menu_CheckItem
     */
    public function setItemCssClass($value) {
    	$this->setExtConfigProperty("itemCls", $value);
    	return $this;
    }	
    /**
     * The default CSS class to use for check items (defaults to "x-menu-item x-menu-check-item")
     * @return string
     */
    public function getItemCssClass() {
    	return $this->getExtConfigProperty("itemCls");
    }
    
    /**
     * 
     *
     * @param string $text
     * @param PhpExt_Handler|PhpExt_JavascriptStm $handler
     */		
	public function __construct($text, $handler = null) {
		parent::__construct($text, $handler);
		$this->setExtClassInfo("Ext.menu.CheckItem",null);

		$validProps = array(
		    "checked",
		    "group",
		    "groupClass",
		    "itemCls"
		);
		$this->addValidConfigProperties($validProps);
				
	}
 		
}

