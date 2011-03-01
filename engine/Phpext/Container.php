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
 * @see PhpExt_BoxComponent
 */
include_once 'PhpExt/BoxComponent.php';
/**
 * @see PhpExt_ComponentCollection
 */
include_once 'PhpExt/ComponentCollection.php';
/**
 * @see PhpExt_Layout_ContainerLayout
 */
include_once 'PhpExt/Layout/ContainerLayout.php';


/**
 * Base class for any Ext.BoxComponent that can contain other components. Containers handle the basic behavior of containing items, namely adding, inserting and removing them. The specific layout logic required to visually render contained items is delegated to any one of the different layout classes available. This class is intended to be extended and should generally not need to be created directly via the new keyword.
 * 
 * @package PhpExt
 */
abstract class PhpExt_Container extends PhpExt_BoxComponent 
{
	
	// ActiveItem
	/**
	 * A string component id or the numeric index of the component that should be initially activated within the container's layout on render. For example, activeItem: 'item-1' or activeItem: 0 (index 0 = the first item in the container's collection). activeItem only applies to layout styles that can display items one at a time (like Ext.layout.Accordion, Ext.layout.CardLayout and Ext.layout.FitLayout). Related to Ext.layout.ContainerLayout.activeItem.
	 * @param string|int $value
	 * @return PhpExt_Container
	 */
	public function setActiveItem($value) {
		$this->setExtConfigProperty("activeItem", $value);
		return $this;
	}	
	/**
	 * A string component id or the numeric index of the component that should be initially activated within the container's layout on render. For example, activeItem: 'item-1' or activeItem: 0 (index 0 = the first item in the container's collection). activeItem only applies to layout styles that can display items one at a time (like Ext.layout.Accordion, Ext.layout.CardLayout and Ext.layout.FitLayout). Related to Ext.layout.ContainerLayout.activeItem.
	 * @return string|int
	 */
	public function getActiveItem() {
		return $this->getExtConfigProperty("activeItem");
	}
	
	// AutoDestroy
	/**
	 * If true the container will automatically destroy any contained component that is removed from it, else destruction must be handled manually (defaults to true).
	 * @param boolean $value
	 * @return PhpExt_Container
	 */
	public function setAutoDestroy($value) {
		$this->setExtConfigProperty("autoDestroy", $value);
		return $this;
	}	
	/**
	 * If true the container will automatically destroy any contained component that is removed from it, else destruction must be handled manually (defaults to true).
	 * @return boolean
	 */
	public function getAutoDestroy() {
		return $this->getExtConfigProperty("autoDestroy");
	}
	
	// BufferResize
	/**
	 * When set to true (100 milliseconds) or a number of milliseconds, the layout assigned for this container will buffer the frequency it calculates and does a re-layout of components. This is useful for heavy containers or containers with a large amount of sub components that frequent calls to layout are expensive.
	 * @param boolean|int $value
	 * @return PhpExt_Container
	 */
	public function setBufferResize($value) {
		$this->setExtConfigProperty("bufferResize", $value);
		return $this;
	}	
	/**
	 * When set to true (100 milliseconds) or a number of milliseconds, the layout assigned for this container will buffer the frequency it calculates and does a re-layout of components. This is useful for heavy containers or containers with a large amount of sub components that frequent calls to layout are expensive.
	 * @return boolean|int
	 */
	public function getBufferResize() {
		return $this->getExtConfigProperty("bufferResize");
	}
	
	// DefaultType
	/**
	 * The default type of container represented by this object as registered in Ext.ComponentMgr (defaults to 'panel').
	 * @param string $value
	 * @return PhpExt_Container
	 */
	public function setDefaultType($value) {
		$this->setExtConfigProperty("defaultType", $value);
		return $this;
	}	
	/**
	 * The default type of container represented by this object as registered in Ext.ComponentMgr (defaults to 'panel').
	 * @return string
	 */
	public function getDefaultType() {
		return $this->getExtConfigProperty("defaultType");
	}
	
	// Defaults
	/**
	 * A config object that will be applied to all components added to this container either via the items config or via the add or insert methods. The defaults config can contain any number of name/value property pairs to be added to each item, and should be valid for the types of items being added to the container. For example, to automatically apply padding to the body of each of a set of contained PhpExt_Panel items, you could pass: new PhpExt_Config_ConfigObject(array('bodyStyle'=>'padding:15px')).
	 * @param PhpExt_Config_ConfigObject $value
	 * @return PhpExt_Container
	 */
	public function setDefaults(PhpExt_Config_ConfigObject $value) {
		$this->setExtConfigProperty("defaults", $value);
		return $this;
	}	
	/**
	 * 
	 * @return PhpExt_Config_ConfigObject
	 */
	public function getDefaults() {
		return $this->getExtConfigProperty("defaults");
	}
	
	// HideBorders
	/**
	 * True to hide the borders of each contained component, false to defer to the component's existing border settings (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_Container
	 */
	public function setHideBorders($value) {
		$this->setExtConfigProperty("hideBorders", $value);
		return $this;
	}	
	/**
	 * True to hide the borders of each contained component, false to defer to the component's existing border settings (defaults to false).
	 * @return boolean
	 */
	public function getHideBorders() {
		return $this->getExtConfigProperty("hideBorders");
	}
	
	// Items
    /**
	 * PhpExt_Component Collection
	 *
	 * @var PhpExt_ComponentCollection
	 */
	protected $_items = null;
	/**
	 * Adds a component to the items collection
	 *
	 * @param PhpExt_Component $item Descendants of {@link PhpExt_Component}
	 * @param PhpExt_Layout_ContainerLayoutData
	 * @return PhpExt_Container
	 */
	public function addItem($item, $layoutData = null) {	    
		$this->_items->add($item);		
		if ($layoutData !== null && $item instanceof PhpExt_Component) {
		    $validLayoutData = $this->getLayout()->getValidLayoutDataClassNames();
		    if (!in_array(get_class($layoutData), $validLayoutData) )
		        throw new Exception("Invalid layout data. Layout data provided '".get_class($layoutData)."' but expecting any of ".implode(", ", $validLayoutData).".");

		    $item->setLayoutData($layoutData);
		}
		    
		return $this;
	}		
	/**
	 * A single item, or an array of child Components to be added to this container. Each item can be any type of object based on Ext.Component.
	 * 
	 * Component config objects may also be specified in order to avoid the overhead of constructing a real Component object if lazy rendering might mean that the added Component will not be rendered immediately. To take advantage of this "lazy instantiation", set the Ext.Component.xtype config property to the registered type of the Component wanted.
	 * 
	 * For a list of all available xtypes, see Ext.Component.
	 * 
	 * @return PhpExt_ComponentCollection
	 */
	public function getItems() {
		return $this->_items;
	}	

    // Layout
    /**
     * @var PhpExt_Layout_ContainerLayout 
     */
    protected $_defaultLayout;
    /**
     * @var PhpExt_Layout_ContainerLayout 
     */
    protected $_layout;
    /**
     * The layout type to be used in this container. If not specified, a default PhpExt_Layout_ContainerLayout will be created and used. 
     * Valid values are: {@link PhpExt_Layout_AccordionLayout}, {@link PhpExt_Layout_Anchor}, 
     * {@link PhpExt_Layout_Border}, {@link PhpExt_Layout_Card}, {@link PhpExt_Layout_Column}, 
     * {@link PhpExt_Layout_Fit}, {@link PhpExt_Layout_Form} and {@link PhpExt_Layout_Table}. 
     * Specific config values for the chosen layout type can be specified using setLayoutConfig().
     * @uses PhpExt_Layout_ContainerLayout
     * @uses PhpExt_Layout_AccordionLayout
     * @uses PhpExt_Layout_Anchor
     * @uses PhpExt_Layout_Border
     * @uses PhpExt_Layout_Card
     * @uses PhpExt_Layout_Column
     * @uses PhpExt_Layout_Fit
     * @uses PhpExt_Layout_Form
     * @uses PhpExt_Layout_Table     
     * @param PhpExt_Layout_ContainerLayout $value
     * @return PhpExt_Container
     */
    public function setLayout(PhpExt_Layout_ContainerLayout $value) {
    	$this->_layout = $value;
    	return $this;
    }	
    /**
     * The layout type to be used in this container. If not specified, a default PhpExt_Layout_ContainerLayout will be created and used. 
     * Valid values are: {@link PhpExt_Layout_AccordionLayout}, {@link PhpExt_Layout_Anchor}, 
     * {@link PhpExt_Layout_Border}, {@link PhpExt_Layout_Card}, {@link PhpExt_Layout_Column}, 
     * {@link PhpExt_Layout_Fit}, {@link PhpExt_Layout_Form} and {@link PhpExt_Layout_Table}. 
     * Specific config values for the chosen layout type can be specified using setLayoutConfig().
     * @uses PhpExt_Layout_ContainerLayout
     * @uses PhpExt_Layout_AccordionLayout
     * @uses PhpExt_Layout_Anchor
     * @uses PhpExt_Layout_Border
     * @uses PhpExt_Layout_Card
     * @uses PhpExt_Layout_Column
     * @uses PhpExt_Layout_Fit
     * @uses PhpExt_Layout_Form
     * @uses PhpExt_Layout_Table 
     * @return PhpExt_Layout_ContainerLayout
     */
    public function getLayout() {
    	return $this->_layout;
    }		
		
    // MonitorResize
    /**
     * True to automatically monitor window resize events to handle anything that is sensitive to the current size of the viewport. This value is typically managed by the chosen layout and should not need to be set manually.
     * @param boolean $value
     * @return PhpExt_Container
     */
    public function setMonitorResize($value) {
    	$this->setExtConfigProperty("monitorResize", $value);
    	return $this;
    }	
    /**
     * True to automatically monitor window resize events to handle anything that is sensitive to the current size of the viewport. This value is typically managed by the chosen layout and should not need to be set manually.
     * @return boolean
     */
    public function getMonitorResize() {
    	return $this->getExtConfigProperty("monitorResize");
    }    	
	
    
    
    
    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Container","container");
		
		$validProps = array(
		    "activeItem",
		    "autoDestroy",
		    "bufferResize",
		    "defaults",
		    "defaultType",
		    "hideBorders",
		    "items",
		    "layout",
		    "monitorResize"		    
		);
		$this->addValidConfigProperties($validProps);			
		
		$this->_items = new PhpExt_ComponentCollection($this);
		$this->_extConfigProperties['items'] = $this->_items;
		
		$this->_defaultLayout = new PhpExt_Layout_ContainerLayout();
	}	
	
    protected function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
    
		$layout = $this->getLayout();
		if ($layout !== null) {
		    if ($this->_defaultLayout !== null  && $this->_defaultLayout->getLayoutKey() != $layout->getLayoutKey())
		        $params[] = $this->paramToString("layout", $layout->getLayoutKey());
		    $layoutConfig = $layout->getJavascript(true); 	    		   
		    if ($layoutConfig != '{}')
			    $params[] = "layoutConfig:".$layoutConfig;
		}

		return $params;
	}
		
}

