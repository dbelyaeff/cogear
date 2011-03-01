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
 * @see PhpExt_Menu_MenuBaseItem
 */
include_once 'PhpExt/Menu/MenuBaseItem.php';

/**
 * A base class for all menu items that require menu-related functionality (like sub-menus) and are not static display items. 
 * Item extends the base functionality of {@link PhpExt_Menu_BaseItem} by adding menu-specific activation and click handling.
 * 
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_Item extends PhpExt_Menu_BaseItem   
{	
    // CanActivate
    /**
     * True if this item can be visually activated (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Menu_Item
     */
    public function setCanActivate($value) {
    	return parent::setCanActivate($value);
    }	
    /**
     * True if this item can be visually activated (defaults to true)
     * @return boolean
     */
    public function getCanActivate() {
    	return parent::getCanActivate();
    }		
    
    // Href
    /**
     * The href attribute to use for the underlying anchor link (defaults to '#').
     * @param string $value 
     * @return PhpExt_Menu_Item
     */
    public function setHref($value) {
    	$this->setExtConfigProperty("href", $value);
    	return $this;
    }	
    /**
     * The href attribute to use for the underlying anchor link (defaults to '#').
     * @return string
     */
    public function getHref() {
    	return $this->getExtConfigProperty("href");
    }
    
    // HrefTarget
    /**
     * The target attribute to use for the underlying anchor link (defaults to '').
     * @param boolean $value 
     * @return PhpExt_Menu_Item
     */
    public function setHrefTarget($value) {
    	$this->setExtConfigProperty("hrefTarget", $value);
    	return $this;
    }	
    /**
     * The target attribute to use for the underlying anchor link (defaults to '').
     * @return boolean
     */
    public function getHrefTarget() {
    	return $this->getExtConfigProperty("hrefTarget");
    }
    
    // Icon
    /**
     * The path to an icon to display in this item (defaults to Ext.BLANK_IMAGE_URL). If icon is specified iconCls should not be.
     * @param string $value 
     * @return PhpExt_Menu_Item
     */
    public function setIcon($value) {
    	$this->setExtConfigProperty("icon", $value);
    	return $this;
    }	
    /**
     * The path to an icon to display in this item (defaults to Ext.BLANK_IMAGE_URL). If icon is specified iconCls should not be.
     * @return string
     */
    public function getIcon() {
    	return $this->getExtConfigProperty("icon");
    }
    
    // IconCssClass
    /**
     * A CSS class that specifies a background image that will be used as the icon for this item (defaults to ''). If iconCls is specified icon should not be.
     * @param string $value 
     * @return PhpExt_Menu_Item
     */
    public function setIconCssClass($value) {
    	$this->setExtConfigProperty("iconCls", $value);
    	return $this;
    }	
    /**
     * A CSS class that specifies a background image that will be used as the icon for this item (defaults to ''). If iconCls is specified icon should not be.
     * @return string
     */
    public function getIconCssClass() {
    	return $this->getExtConfigProperty("iconCls");
    }
    
    // ItemCssClass
    /**
     * The default CSS class to use for menu items (defaults to 'x-menu-item')
     * @param string $value 
     * @return PhpExt_Menu_Item
     */
    public function setItemCssClass($value) {
    	$this->setExtConfigProperty("itemCls", $value);
    	return $this;
    }	
    /**
     * The default CSS class to use for menu items (defaults to 'x-menu-item')
     * @return string
     */
    public function getItemCssClass() {
    	return $this->getExtConfigProperty("itemCls");
    }
    
    // ShowDelay
    /**
     * Length of time in milliseconds to wait before showing this item (defaults to 200)
     * @param integer $value 
     * @return PhpExt_Menu_Item
     */
    public function setShowDelay($value) {
    	$this->setExtConfigProperty("showDelay", $value);
    	return $this;
    }	
    /**
     * Length of time in milliseconds to wait before showing this item (defaults to 200)
     * @return integer
     */
    public function getShowDelay() {
    	return $this->getExtConfigProperty("showDelay");
    }
    
    // Text
    /**
     * The text to display in this item (defaults to '').
     * @param string $value 
     * @return PhpExt_Menu_Item
     */
    public function setText($value) {
    	$this->setExtConfigProperty("text", $value);
    	return $this;
    }	
    /**
     * The text to display in this item (defaults to '').
     * @return string
     */
    public function getText() {
    	return $this->getExtConfigProperty("text");
    }    
		
	public function __construct($text, $handler = null) {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.Item",null);		
						
		$this->setText($text);
		
		if ($handler !== null)
		    $this->setHandler($handler);
	}
 		
}

