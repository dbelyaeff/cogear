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
 * Simple Button class
 * @package PhpExt
 */
class PhpExt_Button extends PhpExt_Component  
{	
	const BUTTON_TYPE_BUTTON = 'button';
	const BUTTON_TYPE_SUBMIT = 'submit';
	const BUTTON_TYPE_RESET = 'reset';

	// ClickEvent
	/**
	 * The type of event to map to the button's event handler (defaults to 'click')
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setClickEvent($value) {
		$this->setExtConfigProperty("clickEvent", $value);
		return $this;
	}	
	/**
	 * The type of event to map to the button's event handler (defaults to 'click')
	 * @return string
	 */
	public function getClickEvent() {
		return $this->getExtConfigProperty("clickEvent");
	}
	
	// Disabled
	/**
	 * True to start disabled (defaults to false)
	 * @param boolean $value
	 * @return PhpExt_Button
	 */
	public function setDisabled($value) {
		$this->setExtConfigProperty("disabled", $value);
		return $this;
	}	
	/**
	 * True to start disabled (defaults to false)
	 * @return boolean
	 */
	public function getDisabled() {
		return $this->getExtConfigProperty("disabled");
	}
	
	// EnableToogle
	/**
	 * True to enable pressed/not pressed toggling (defaults to false)
	 * @param boolean $value
	 * @return PhpExt_Button
	 */
	public function setEnableToogle($value) {
		$this->setExtConfigProperty("enableToogle", $value);
		return $this;
	}	
	/**
	 * True to enable pressed/not pressed toggling (defaults to false)
	 * @return boolean
	 */
	public function getEnableToogle() {
		return $this->getExtConfigProperty("enableToogle");
	}
	
	// HandleMouseEvents
	/**
	 * False to disable visual cues on mouseover, mouseout and mousedown (defaults to true)
	 * @param boolean $value
	 * @return PhpExt_Button
	 */
	public function setHandleMouseEvents($value) {
		$this->setExtConfigProperty("handleMouseEvents", $value);
		return $this;
	}	
	/**
	 * False to disable visual cues on mouseover, mouseout and mousedown (defaults to true)
	 * @return boolean
	 */
	public function getHandleMouseEvents() {
		return $this->getExtConfigProperty("handleMouseEvents");
	}
	
	// Handler
	/**
	 * A function called when the button is clicked (can be used instead of click event)
	 * @param PhpExt_Handler|PhpExt_JavascriptStm $value
	 * @return PhpExt_Button
	 */
	public function setHandler($value) {
		$this->setExtConfigProperty("handler", $value);
		return $this;
	}	
	/**
	 * A function called when the button is clicked (can be used instead of click event)
	 * @return PhpExt_Handler|PhpExt_JavascriptStm
	 */
	public function getHandler() {
		return $this->getExtConfigProperty("handler");
	}
	
	// Hidden
	/**
	 * True to start hidden (defaults to false)
	 * @param boolean $value
	 * @return PhpExt_Button
	 */
	public function setHidden($value) {
		$this->setExtConfigProperty("hidden", $value);
		return $this;
	}	
	/**
	 * True to start hidden (defaults to false)
	 * @return boolean
	 */
	public function getHidden() {
		return $this->getExtConfigProperty("hidden");
	}
	
	// Icon
	/**
	 * The path to an image to display in the button (the image will be set as the background-image CSS property of the button by default, so if you want a mixed icon/text button, set CssClass:"x-btn-text-icon")
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setIcon($value) {
		$this->setExtConfigProperty("icon", $value);
		return $this;
	}	
	/**
	 * The path to an image to display in the button (the image will be set as the background-image CSS property of the button by default, so if you want a mixed icon/text button, set CssClass:"x-btn-text-icon")
	 * @return string
	 */
	public function getIcon() {
		return $this->getExtConfigProperty("icon");
	}
	
	// IconCssClass
	/**
	 * A css class which sets a background image to be used as the icon for this button
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setIconCssClass($value) {
		$this->setExtConfigProperty("iconCls", $value);
		return $this;
	}	
	/**
	 * A css class which sets a background image to be used as the icon for this button
	 * @return string
	 */
	public function getIconCssClass() {
		return $this->getExtConfigProperty("iconCls");
	}
	
	// Menu
	/**
	 * Standard menu attribute consisting of a reference to a menu object, a menu id or a menu config blob (defaults to undefined).
	 * @param PhpExt_Menu_Menu $value
	 * @return PhpExt_Button
	 */
	public function setMenu(PhpExt_Menu_Menu $value) {
		$this->setExtConfigProperty("menu", $value);
		return $this;
	}	
	/**
	 * Standard menu attribute consisting of a reference to a menu object, a menu id or a menu config blob (defaults to undefined).
	 * @return PhpExt_Menu_Menu
	 */
	public function getMenu() {
		return $this->getExtConfigProperty("menu");
	}
	
	// MenuAlign
	/**
	 * The position to align the menu to (see PhpExt_Ext.combineAnchors for more details, defaults to 'tl-bl?').
	 * @see PhpExt_Ext::combineAnchors
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setMenuAlign($value) {
		$this->setExtConfigProperty("menuAlign", $value);
		return $this;
	}	
	/**
	 * The position to align the menu to (see PhpExt_Ext for more details, defaults to 'tl-bl?').
	 * @return string
	 */
	public function getMenuAlign() {
		return $this->getExtConfigProperty("menuAlign");
	}
	
	// MinWidth
	/**
	 * The minimum width for this button (used to give a set of buttons a common width)
	 * @param integer $value
	 * @return PhpExt_Button
	 */
	public function setMinWidth($value) {
		$this->setExtConfigProperty("minWidth", $value);
		return $this;
	}	
	/**
	 * The minimum width for this button (used to give a set of buttons a common width)
	 * @return integer
	 */
	public function getMinWidth() {
		return $this->getExtConfigProperty("minWidth");
	}
	
	// Name
	/**
	 * Button's DOM element name
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setName($value) {
		$this->setExtConfigProperty("name", $value);
		return $this;
	}	
	/**
	 * Button's DOM element name
	 * @return string
	 */
	public function getName() {
		return $this->getExtConfigProperty("name");
	}
	
	// Pressed
	/**
	 * True to start pressed (only if enableToggle = true)
	 * @param boolean $value
	 * @return PhpExt_Button
	 */
	public function setPressed($value) {
		$this->setExtConfigProperty("pressed", $value);
		return $this;
	}	
	/**
	 * True to start pressed (only if enableToggle = true)
	 * @return boolean
	 */
	public function getPressed() {
		return $this->getExtConfigProperty("pressed");
	}
	
	// Repeat
	/**
	 * True to repeat fire the click event while the mouse is down. This can also be an Ext.util.ClickRepeater config object (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_Button
	 */
	public function setRepeat($value) {
		$this->setExtConfigProperty("repeat", $value);
		return $this;
	}	
	/**
	 * True to repeat fire the click event while the mouse is down. This can also be an Ext.util.ClickRepeater config object (defaults to false).
	 * @return boolean
	 */
	public function getRepeat() {
		return $this->getExtConfigProperty("repeat");
	}
	
	// Scope
	/**
	 * The scope of the handler
	 * @param PhpExt_JavascriptStm $value
	 * @return PhpExt_Button
	 */
	public function setScope(JavascriptStm $value) {
		$this->setExtConfigProperty("scope", $value);
		return $this;
	}	
	/**
	 * The scope of the handler
	 * @return PhpExt_JavascriptStm
	 */
	public function getScope() {
		return $this->getExtConfigProperty("scope");
	}
	
	// TabIndex
	/**
	 * Set a DOM tabIndex for this button (defaults to undefined)
	 * @param integer $value
	 * @return PhpExt_Button
	 */
	public function setTabIndex($value) {
		$this->setExtConfigProperty("tabIndex", $value);
		return $this;
	}	
	/**
	 * Set a DOM tabIndex for this button (defaults to undefined)
	 * @return integer
	 */
	public function getTabIndex() {
		return $this->getExtConfigProperty("tabIndex");
	}
	
	// Text
	/**
	 * The button text
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setText($value) {
		$this->setExtConfigProperty("text", $value);
		return $this;
	}	
	/**
	 * The button text
	 * @return string
	 */
	public function getText() {
		return $this->getExtConfigProperty("text");
	}
	
	// ToogleGroup
	/**
	 * The group this toggle button is a member of (only 1 per group can be pressed, only applies if enableToggle = true)
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setToogleGroup($value) {
		$this->setExtConfigProperty("toogleGroup", $value);
		return $this;
	}	
	/**
	 * The group this toggle button is a member of (only 1 per group can be pressed, only applies if enableToggle = true)
	 * @return string
	 */
	public function getToogleGroup() {
		return $this->getExtConfigProperty("toogleGroup");
	}
	
	// Tooltip
	/**
	 * The tooltip for the button - can be a string or QuickTips config object
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setTooltip($value) {
		$this->setExtConfigProperty("tooltip", $value);
		return $this;
	}	
	/**
	 * The tooltip for the button - can be a string or QuickTips config object
	 * @return string
	 */
	public function getTooltip() {
		return $this->getExtConfigProperty("tooltip");
	}
	
	// TooltipType
	/**
	 * The type of tooltip to use. Either "qtip" (default) for QuickTips or "title" for title attribute.
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setTooltipType($value) {
		$this->setExtConfigProperty("tooltipType", $value);
		return $this;
	}	
	/**
	 * The type of tooltip to use. Either "qtip" (default) for QuickTips or "title" for title attribute.
	 * @return string
	 */
	public function getTooltipType() {
		return $this->getExtConfigProperty("tooltipType");
	}
	
	// Type
	/**
	 * PhpExt_Button::BUTTON_TYPE_SUBMIT, PhpExt_Button::BUTTON_TYPE_RESET or PhpExt_Button::BUTTON_TYPE_BUTTON - defaults to PhpExt_Button::BUTTON_TYPE_BUTTON
	 * @param string $value
	 * @return PhpExt_Button
	 */
	public function setType($value) {
		$this->setExtConfigProperty("type", $value);
		return $this;
	}	
	/**
	 * PhpExt_Button::BUTTON_TYPE_SUBMIT, PhpExt_Button::BUTTON_TYPE_RESET or PhpExt_Button::BUTTON_TYPE_BUTTON - defaults to PhpExt_Button::BUTTON_TYPE_BUTTON
	 * @return string
	 */
	public function getType() {
		return $this->getExtConfigProperty("type");
	}				
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Button", "button");
		
		$validProps = array(
		    "clickEvent",
		    "disabled",
		    "enableToogle",
		    "handleMouseEvents",
		    "handler",
		    "hidden",
		    "icon",
		    "iconCls",
		    "menu",
		    "menuAlign",
		    "minWidth",
		    "name",
		    "pressed",
		    "repeat",
		    "scope",
		    "tabIndex",
		    "text",
		    "toogleGroup",
		    "tooltip",
		    "tooltipType",
		    "type"
		);	
		$this->addValidConfigProperties($validProps);
		
	}	
	
	/**
	 * Helper function to create a new Text Button with optional handler, name, id and icon.
	 * If $iconUrl is set it asigns the corresponding CssClass 'x-btn-text-icon' to show icon and text. 
	 *
	 * @param string $text
	 * @param PhpExt_Handler $handler
	 * @param string $name
	 * @param string $id
	 * @param string $icon
	 * @return PhpExt_Button
	 */
	public static function createTextButton($text, $handler = null, $name = null, $id = null, $icon = null) {
	    
	    $btn = new PhpExt_Button();
	    $btn->setText($text);
	    if ($handler !== null) {
	        $btn->setHandler($handler);
	    }
	    if ($name !== null) {
	        $btn->setName($name);
	    }
	    if ($id !== null) {
	        $btn->setId($id);
	    }
	    if ($icon !== NULL) {
	        $btn->setIcon($icon);
	        $btn->setCssClass("x-btn-text-icon");
	    }
	    
	    return $btn;
	}
	
	
 	
	
}

