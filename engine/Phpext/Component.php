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
 * @see PhpExt_ObjectCollection
 */
include_once 'PhpExt/ObjectCollection.php';


/**
 * Base class for all Ext components.  All subclasses of Component can automatically participate in the standard
 * Ext component lifecycle of creation, rendering and destruction.  They also have automatic support for basic hide/show
 * and enable/disable behavior.   All visual widgets that require rendering into a layout should subclass {@link PhpExt_Component} (or
 * BoxComponent if managed box model handling is required).
 * 
 * Every component has a specific xtype.  This is the list of all valid xtypes:
 * 
 * <pre>
 * xtype            Class
 * -------------    ------------------
 * box              BoxComponent
 * button           Button
 * colorpalette     ColorPalette
 * component        Component
 * container        Container
 * cycle            CycleButton
 * dataview         DataView
 * datepicker       DatePicker
 * editor           Editor
 * editorgrid       EditorGridPanel
 * grid             GridPanel
 * paging           PagingToolbar
 * panel            Panel
 * progress         ProgressBar
 * splitbutton      SplitButton
 * tabpanel         TabPanel
 * treepanel        TreePanel
 * viewport         ViewPort
 * window           Window
 * 
 * Toolbar components
 * ---------------------------------------
 * toolbar          Toolbar
 * 
 * Form components
 * ---------------------------------------
 * checkbox         Checkbox
 * combo            ComboBox
 * datefield        DateField
 * field            Field
 * fieldset         FieldSet
 * form             FormPanel
 * hidden           Hidden
 * htmleditor       HtmlEditor
 * numberfield      NumberField
 * radio            Radio
 * textarea         TextArea
 * textfield        TextField
 * timefield        TimeField
 * </pre>
 *   
 * @package PhpExt
 */
abstract class PhpExt_Component extends PhpExt_Observable
{
	const HIDE_MODE_VISIBILITY = 'visibility';
	const HIDE_MODE_OFFSETS = 'offsets';
	const HIDE_MODE_DISPLAY = 'display';
	
	protected $_xType = "";
			
	
	// AllowDomMove
	/**
	 * Whether the component can move the Dom node when rendering (defaults to true).
	 * @param boolean $value
	 * @return PhpExt_Component
	 */
	public function setAllowDomMove($value) {
		$this->setExtConfigProperty("allowDomMove", $value);
		return $this;
	}	
	/**
	 * Whether the component can move the Dom node when rendering (defaults to true).
	 * @return boolean
	 */
	public function getAllowDomMove() {
		return $this->getExtConfigProperty("allowDomMove");
	}
		
	// ApplyTo
	/**
	 * The id of the node, a DOM node or an existing Element corresponding to a DIV that is already present in the document that specifies some structural markup for this component. When applyTo is used, constituent parts of the component can also be specified by id or CSS class name within the main element, and the component being created may attempt to create its subcomponents from that markup if applicable. Using this config, a call to render() is not required. If applyTo is specified, any value passed for renderTo will be ignored and the target element's parent node will automatically be used as the component's container.
	 * @param string $value
	 * @return PhpExt_Component
	 */
	public function setApplyTo($value) {
		$this->setExtConfigProperty("applyTo", $value);
		return $this;
	}	
	/**
	 * The id of the node, a DOM node or an existing Element corresponding to a DIV that is already present in the document that specifies some structural markup for this component. When applyTo is used, constituent parts of the component can also be specified by id or CSS class name within the main element, and the component being created may attempt to create its subcomponents from that markup if applicable. Using this config, a call to render() is not required. If applyTo is specified, any value passed for renderTo will be ignored and the target element's parent node will automatically be used as the component's container.
	 * @return string
	 */
	public function getApplyTo() {
		return $this->getExtConfigProperty("applyTo");
	}
	
	// AutoShow
	/**
	 * True if the component should check for hidden classes (e.g. 'x-hidden' or 'x-hide-display') and remove them on render (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_Component
	 */
	public function setAutoShow($value) {
		$this->setExtConfigProperty("autoShow", $value);
		return $this;
	}	
	/**
	 * True if the component should check for hidden classes (e.g. 'x-hidden' or 'x-hide-display') and remove them on render (defaults to false).
	 * @return boolean
	 */
	public function getAutoShow() {
		return $this->getExtConfigProperty("autoShow");
	}
		
	// CssClass
	/**
	 * An optional extra CSS class that will be added to this component's Element (defaults to ''). This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
	 * @param string $value
	 * @return PhpExt_Component
	 */
	public function setCssClass($value) {
		$this->setExtConfigProperty("cls", $value);
		return $this;
	}	
	/**
	 * An optional extra CSS class that will be added to this component's Element (defaults to ''). This can be useful for adding customized styles to the component or any of its children using standard CSS rules.
	 * @return string
	 */
	public function getCssClass() {
		return $this->getExtConfigProperty("cls");
	}
	
	// ContainerCssClass
	/**
	 * An optional extra CSS class that will be added to this component's container (defaults to ''). This can be useful for adding customized styles to the container or any of its children using standard CSS rules.
	 * @param string $value
	 * @return PhpExt_Component
	 */
	public function setContainerCssClass($value) {
		$this->setExtConfigProperty("ctCls", $value);
		return $this;
	}	
	/**
	 * An optional extra CSS class that will be added to this component's container (defaults to ''). This can be useful for adding customized styles to the container or any of its children using standard CSS rules.
	 * @return string
	 */
	public function getContainerCssClass() {
		return $this->getExtConfigProperty("ctCls");
	}
	
	// DisabledCssClass
	/**
	 * CSS class added to the component when it is disabled (defaults to "x-item-disabled").
	 * @param string $value
	 * @return PhpExt_Component
	 */
	public function setDisabledCssClass($value) {
		$this->setExtConfigProperty("disabledClass", $value);
		return $this;
	}	
	/**
	 * CSS class added to the component when it is disabled (defaults to "x-item-disabled").
	 * @return string
	 */
	public function getDisabledCssClass() {
		return $this->getExtConfigProperty("disabledClass");
	}	
	
	// El
	/**
	 * The DOM element to which this component show be rendered to.  This should be used instead of renderTo or applyTo if using lazy render.
	 * @param string $value 
	 * @return PhpExt_Component
	 */
	public function setEl($value) {
	    $this->setExtConfigProperty("el", $value);
	    return $this;
	}	
	/**
	 * The DOM element to which this component show be rendered to.  This should be used instead of renderTo or applyTo if using lazy render.
	 * @return string
	*/
	public function getEl() {
	    return $this->getExtConfigProperty("el");
	}
	
	// HideMode
	/**
	 * How this component should hidden. Supported values are <code>PhpExt_Component::HIDE_MODE_VISIBILITY</code> (css visibility), <code>PhpExt_Component::HIDE_MODE_OFFSETS</code> (negative offset position) and <code>PhpExt_Component::HIDE_MODE_DISPLAY</code> (css display) - defaults to <code>PhpExt_Component::HIDE_MODE_DISPLAY</code>.
	 * @param string $value
	 * @return PhpExt_Component
	 */
	public function setHideMode($value) {
		$this->setExtConfigProperty("hideMode", $value);
		return $this;
	}	
	/**
	 * How this component should hidden. Supported values are <code>PhpExt_Component::HIDE_MODE_VISIBILITY</code> (css visibility), <code>PhpExt_Component::HIDE_MODE_OFFSETS</code> (negative offset position) and <code>PhpExt_Component::HIDE_MODE_DISPLAY</code> (css display) - defaults to <code>PhpExt_Component::HIDE_MODE_DISPLAY</code>.
	 * @return string
	 */
	public function getHideMode() {
		return $this->getExtConfigProperty("hideMode");
	}	
	
	// HideParent
	/**
	 * True to hide and show the component's container when hide/show is called on the component, false to hide and show the component itself (defaults to false). For example, this can be used as a shortcut for a hide button on a window by setting hide:true on the button when adding it to its parent container.
	 * @param boolean $value
	 * @return PhpExt_Component
	 */
	public function setHideParent($value) {
		$this->setExtConfigProperty("hideParent", $value);
		return $this;
	}	
	/**
	 * True to hide and show the component's container when hide/show is called on the component, false to hide and show the component itself (defaults to false). For example, this can be used as a shortcut for a hide button on a window by setting hide:true on the button when adding it to its parent container.
	 * @return boolean
	 */
	public function getHideParent() {
		return $this->getExtConfigProperty("hideParent");		
	}	

	// Id
	/**
	 * The unique id of this component (defaults to an auto-assigned id).
	 * @param string $value
	 * @return PhpExt_Component
	 */
	public function setId($value) {
		$this->setExtConfigProperty("id", $value);
		return $this;
	}	
	/**
	 * The unique id of this component (defaults to an auto-assigned id).
	 * @return string
	 */
	public function getId() {
		return $this->getExtConfigProperty("id");		
	}	
	
	// LayoutData
    /**
     * @var PhpExt_Layout_ContainerLayoutData
     */
    protected $_layoutData;
	/**
	 * Layout specific properties for the corresponding layout of the container. 
	 * It must be a {@link PhpExt_Layout_ContainerLayoutData} object or any of its descendants.
	 * 
	 * @uses PhpExt_Layout_AbsoluteLayoutData
	 * @uses PhpExt_Layout_AnchorLayoutData
	 * @uses PhpExt_Layout_AccordionLayoutData
	 * @uses PhpExt_Layout_BorderLayoutData
	 * @uses PhpExt_Layout_CardLayoutData
	 * @uses PhpExt_Layout_ColumnLayoutData
	 * @uses PhpExt_Layout_FitLayoutData
	 * @uses PhpExt_Layout_FormLayoutData
	 * @uses PhpExt_Layout_TableLayoutData	 
	 * @param PhpExt_Layout_ContainerLayoutData $value 
	 * @return PhpExt_Component
	 */
	public function setLayoutData($value) {
		$this->_layoutData = $value;
		return $this;
	}	
	/**
	 * 
	 * @return PhpExt_Layout_ContainerLayoutData
	 */
	public function getLayoutData() {
		return $this->_layoutData;
	}
	
	// Plugins
	/**
	 * @var PhpExt_ObjectCollection
	 */
	protected $_plugins = null;			
	/**
	 * An object or array of objects that will provide custom functionality for this component. The only requirement for a valid plugin is that it contain an init method that accepts a reference of type Ext.Component. When a component is created, if any plugins are available, the component will call the init method on each plugin, passing a reference to itself. Each plugin can then call methods or respond to events on the component as needed to provide its functionality.
	 * @return PhpExt_ObjectCollection
	 */
	public function getPlugins() {
		return $this->_plugins;			
	}	
	
	// RenderTo
	/**
	 * The id of the node, a DOM node or an existing Element that will be the container to render this component into. Using this config, a call to render() is not required.
	 * @param string|PhpExt_JavascriptStm $value
	 * @return PhpExt_Component
	 */
	public function setRenderTo($value) {
		$this->setExtConfigProperty("renderTo", $value);
		return $this;
	}	
	/**
	 * The id of the node, a DOM node or an existing Element that will be the container to render this component into. Using this config, a call to render() is not required.
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getRenderTo() {
		return $this->getExtConfigProperty("renderTo");		
	}
	
	// CssStyle
	/**
	 * A custom style specification to be applied to this component's Element.
	 * @param string|PhpExt_JavascriptStm $value
	 * @return PhpExt_Component
	 */
	public function setCssStyle($value) {
		$this->setExtConfigProperty("style", $value);
		return $this;
	}	
	/**
	 * A custom style specification to be applied to this component's Element.
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getCssStyle() {
		return $this->getExtConfigProperty("style");		
	}
	
	//TODO: implement StateEvents
	//TODO: implement StateId
		
	
	// The following properties are specific properties for the different possible layouts
    //----------------------------------------------------------------------------
    /**
     * @var PhpExt_ComponentCollection
     */
    protected $_ownerCollection;
	public function setOwnerCollection(PhpExt_ComponentCollection $owner) {
	    $this->_ownerCollection = $owner;
	}
	
	/**
	 * @return PhpExt_ComponentCollection
	 */
	public function getOwnerCollection() {
	    return $this->_ownerCollection;
	}
	/**
	 * @return PhpExt_Layout_ContainerLayout
	 */
    private function getOwnerLayout() {
        if ($this->_ownerCollection != null) {
            $owner = $this->_ownerCollection->getOwner();
            if ($owner instanceof PhpExt_Container) {
                $layout = $owner->getLayout();
                if ($layout == null)
                    $layout == new PhpExt_Layout_ContainerLayout();
                return $layout;
            }
        }
        return null;
    }
        
	

	/**** Ext Object Methods ****/
	public function render() {
		$args = func_get_args();
		$methodSig = $this->createMethodSignature("render", $args);
		return $this->getMethodInvokeStm($this->_varName, $methodSig);
	}

	/**** Overrides ****/
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Component","component");

		$validProps = array(
			"allowDomMove",
			"applyTo",
			"autoShow",
			"cls",
			"ctCls",
			"disabledClass",
			"el",
			"hideMode",
			"hideParent",
			"id",
			"plugins",
			"renderTo",
			// "stateEvents",
			// "stateId",
			"style",
			"xtype"
		);
		$this->addValidConfigProperties($validProps);
		
		// TODO: Implement PluginCollection
		$this->_plugins = new PhpExt_ObjectCollection();
		$this->setExtConfigProperty("plugins", $this->_plugins);
	}	
	
	protected function setExtClassInfo($extClassName, $xtype) {
		parent::setExtClassInfo($extClassName, $xtype);
		$this->_xType = $xtype;
	}	
	
	protected function getConfigParams($lazy = false) {
		if ($this->_plugins->getCount() == 0) {
		    $this->setExtConfigProperty("plugins", null);
		}
	    
	    $params = parent::getConfigParams($lazy);

		if ($lazy && $this->_xType != null) {
			$params[] = $this->paramToString("xtype",$this->_xType);
		}
		
		if ($this->_layoutData !== null) {
		    $layoutParams = $this->_layoutData->getConfigParams();
		    $params = array_merge($params, $layoutParams);
		}


		return $params;
	}
 	
	
}

