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
 * @see PhpExt_Component
 */
include_once 'PhpExt/Component.php';
/**
 * @see PhpExt_Menu_BaseItemCollection
 */
include_once 'PhpExt/Menu/BaseItemCollection.php';

/**
 * The base class for all items that render into menus. BaseItem provides default rendering, activated state management and base configuration options shared by all menu components.
 * 
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_BaseItem extends PhpExt_Component  
{	
    // ActiveCssClass
    /**
     * The CSS class to use when the item becomes activated (defaults to "x-menu-item-active")
     * @param string $value 
     * @return PhpExt_Menu_BaseItem
     */
    public function setActiveCssClass($value) {
    	$this->setExtConfigProperty("activeClass", $value);
    	return $this;
    }	
    /**
     * The CSS class to use when the item becomes activated (defaults to "x-menu-item-active")
     * @return string
     */
    public function getActiveCssClass() {
    	return $this->getExtConfigProperty("activeClass");
    }	
    
    // CanActivate
    /**
     * True if this item can be visually activated (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Menu_BaseItem
     */
    public function setCanActivate($value) {
    	$this->setExtConfigProperty("canActivate", $value);
    	return $this;
    }	
    /**
     * True if this item can be visually activated (defaults to false)
     * @return boolean
     */
    public function getCanActivate() {
    	return $this->getExtConfigProperty("canActivate");
    } 
    
    // Handler
    /**
     * A function that will handle the click event of this menu item (defaults to undefined)
     * @param PhpExt_Handler|PhpExt_JavascriptStm $value 
     * @return PhpExt_Menu_BaseItem
     */
    public function setHandler($value) {
    	$this->setExtConfigProperty("handler", $value);
    	return $this;
    }	
    /**
     * A function that will handle the click event of this menu item (defaults to undefined)
     * @return PhpExt_Handler|PhpExt_JavascriptStm
     */
    public function getHandler() {
    	return $this->getExtConfigProperty("handler");
    }
    
    // HideDelay
    /**
     * Length of time in milliseconds to wait before hiding after a click (defaults to 100)
     * @param integer $value 
     * @return PhpExt_Menu_BaseItem
     */
    public function setHideDelay($value) {
    	$this->setExtConfigProperty("hideDelay", $value);
    	return $this;
    }	
    /**
     * Length of time in milliseconds to wait before hiding after a click (defaults to 100)
     * @return integer
     */
    public function getHideDelay() {
    	return $this->getExtConfigProperty("hideDelay");
    }
    
    // HideOnClick
    /**
     * True to hide the containing menu after this item is clicked (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Menu_BaseItem
     */
    public function setHideOnClick($value) {
    	$this->setExtConfigProperty("hideOnClick", $value);
    	return $this;
    }	
    /**
     * True to hide the containing menu after this item is clicked (defaults to true)
     * @return boolean
     */
    public function getHideOnClick() {
    	return $this->getExtConfigProperty("hideOnClick");
    }
    
    // Scope
    /**
     * The scope in which the handler function will be called.
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_Menu_BaseItem
     */
    public function setScope($value) {
    	$this->setExtConfigProperty("scope", $value);
    	return $this;
    }	
    /**
     * The scope in which the handler function will be called.
     * @return PhpExt_JavascriptStm
     */
    public function getScope() {
    	return $this->getExtConfigProperty("scope");
    }
    	
    // Items
    /**
     * @var PhpExt_Menu_BaseItemCollection
     */
    protected $_items;
    /**
     * An array of items to be added to this menu. See add for a list of valid item types.
     * @return PhpExt_Menu_BaseItemCollection
     */
    public function getItems() {
    	return $this->_items;
    }
    /**
     * Helper function to quick add a separator
     * @return PhpExt_Menu_Menu
     */
    public function addSeparator($key) {
		$this->_items->add(PhpExt_Menu_Separator(), $key);
		return $this;
	}
	/**
	 * Helper function to quick add a checkitem
	 * @return PhpExt_Menu_Menu
	 */
	public function addCheckItem($key, $text, $handler = null) {
		$this->_items->add(new PhpExt_Menu_MenuCheckItem($text, $handler), $key);
		return $this;
	}	
	/**
	 * Helper function to quick add a textitem
	 * @return PhpExt_Menu_Menu
	 */
	public function addTextItem($key, $text, $handler = null) {
		$this->_items->add(new PhpExt_Menu_MenuTextItem($text, $handler), $key);
		return $this;
	}	
    /**
	 * Helper function to quick add an item
	 * @return PhpExt_Menu_Menu
	 */
	public function addSubItem($key, PhpExt_Menu_BaseItem $item) {
		$this->_items->add($item, $key);
		return $this;
	}
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.BaseItem",null);		

		$validProps = array(
		    "activeClass",
		    "canActivate",
		    "handler",
		    "hideDelay",
		    "hideOnClick",
		    "scope",		    
		);
		$this->addValidConfigProperties($validProps);
		
		$this->_items = new PhpExt_Menu_BaseItemCollection();		
	}
		

	protected function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);			

		// Items
		if ($this->_items->getCount() > 0) {
			$params[] = "menu: { items: ".$this->_items->getJavascript() . "}";
		}			
			
		return $params;
	}
 		
}

