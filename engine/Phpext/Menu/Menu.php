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
 * @see PhpExt_Observable
 */
include_once 'PhpExt/Observable.php';
/**
 * @see PhpExt_Menu_BaseItemCollection
 */
include_once 'PhpExt/Menu/BaseItemCollection.php';


/**
 * A menu object. This is the container to which you add all other menu items. Menu can also serve a as a base class when you want a specialzed menu based off of another component (like {@link PhpExt_Menu_DateMenu for example}). 
 *  
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_Menu extends PhpExt_Observable 
{
    // AllowOtherMenus
    /**
     * True to allow multiple menus to be displayed at the same time (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Menu_Menu
     */
    public function setAllowOtherMenus($value) {
    	$this->setExtConfigProperty("allowOtherMenus", $value);
    	return $this;
    }	
    /**
     * True to allow multiple menus to be displayed at the same time (defaults to false)
     * @return boolean
     */
    public function getAllowOtherMenus() {
    	return $this->getExtConfigProperty("allowOtherMenus");
    }
    
    // DefaultAlign
    /**
     * The default {@link PhpExt_Ext::combineAnchors()} anchor position value for this menu relative to its element of origin (defaults to "tl-bl?")
     * @param boolean $value 
     * @return PhpExt_Menu_Menu
     */
    public function setDefaultAlign($value) {
    	$this->setExtConfigProperty("defaultAlign", $value);
    	return $this;
    }	
    /**
     * The default {@link PhpExt_Ext::combineAnchors()} anchor position value for this menu relative to its element of origin (defaults to "tl-bl?")
     * @return boolean
     */
    public function getDefaultAlign() {
    	return $this->getExtConfigProperty("defaultAlign");
    }
    
    // Defaults
    /**
     * A config object that will be applied to all items added to this container either via the items config or via the add method. The defaults config can contain any number of name/value property pairs to be added to each item, and should be valid for the types of items being added to the menu.
     * @param PhpExt_Config_ConfigObject $value 
     * @return PhpExt_Menu_Menu
     */
    public function setDefaults($value) {
    	$this->setExtConfigProperty("defaults", $value);
    	return $this;
    }	
    /**
     * A config object that will be applied to all items added to this container either via the items config or via the add method. The defaults config can contain any number of name/value property pairs to be added to each item, and should be valid for the types of items being added to the menu.
     * @return PhpExt_Config_ConfigObject
     */
    public function getDefaults() {
    	return $this->getExtConfigProperty("defaults");
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
    	return $this->getExtConfigProperty("items");
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
	public function addItem($key, PhpExt_Menu_BaseItem $item) {
		$this->_items->add($item, $key);
		return $this;
	}
	
    
    // MinWidth
    /**
     * The minimum width of the menu in pixels (defaults to 120)
     * @param integer $value 
     * @return PhpExt_Menu_Menu
     */
    public function setMinWidth($value) {
    	$this->setExtConfigProperty("minWidth", $value);
    	return $this;
    }	
    /**
     * The minimum width of the menu in pixels (defaults to 120)
     * @return integer
     */
    public function getMinWidth() {
    	return $this->getExtConfigProperty("minWidth");
    }
    
    // Shadow
    /**
     * True or {@link PhpExt_Shadow::$MODE_SIDES} for the default effect, {@link PhpExt_Shadow::MODE_FRAME} for 4-way shadow, and {@link PhpExt_Shadow::MODE_DROP} for bottom-right shadow (defaults to {@link PhpExt_Shadow::MODE_SIDES})
     * @uses PhpExt_Shadow::$MODE_SIDES
     * @uses PhpExt_Shadow::$MODE_FRAME
     * @uses PhpExt_Shadow::$MODE_DROP
     * @param string $value 
     * @return PhpExt_Menu_Menu
     */
    public function setShadow($value) {
    	$this->setExtConfigProperty("shadow", $value);
    	return $this;
    }	
    /**
     * True or {@link PhpExt_Shadow::$MODE_SIDES} for the default effect, {@link PhpExt_Shadow::MODE_FRAME} for 4-way shadow, and {@link PhpExt_Shadow::MODE_DROP} for bottom-right shadow (defaults to {@link PhpExt_Shadow::MODE_SIDES})
     * @uses PhpExt_Shadow::$MODE_SIDES
     * @uses PhpExt_Shadow::$MODE_FRAME
     * @uses PhpExt_Shadow::$MODE_DROP 
     * @return string
     */
    public function getShadow() {
    	return $this->getExtConfigProperty("shadow");
    }
    
    // SubMenuAlign
    /**
     * The {@link PhpExt_Ext::combineAnchors()} anchor position value to use for submenus of this menu (defaults to "tl-tr?")
     * @param string $value 
     * @return PhpExt_Menu_Menu
     */
    public function setSubMenuAlign($value) {
    	$this->setExtConfigProperty("subMenuAlign", $value);
    	return $this;
    }	
    /**
     * The {@link PhpExt_Ext::combineAnchors()} anchor position value to use for submenus of this menu (defaults to "tl-tr?")
     * @return string
     */
    public function getSubMenuAlign() {
    	return $this->getExtConfigProperty("subMenuAlign");
    }
    
	public $AllowOtherMenus = false;
	public $DefaultAlign = null; //"tl-bl";
	public $Defaults = null;		
	public $Items = array();
	public $MinWidth = null;
	public $Shadow = null;
	public $SubMenuAlign = null;
	
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.Menu");
		
		$validProps = array(
		    "activeClass",
		    "canActivate",
		    "handler",
		    "hideDelay",
		    "hideOnClick",
		    "scope",
		    "items"		    
		);
		$this->addValidConfigProperties($validProps);
		
		$this->_items = new PhpExt_Menu_BaseItemCollection();
		$this->setExtConfigProperty('items', $this->_items);
	
	}
		
 		
}

