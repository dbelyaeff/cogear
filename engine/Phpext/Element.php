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
class PhpExt_Element extends PhpExt_Observable
{	    
	private $id;
	/**
	 * @var PhpExt_JavascriptStm
	 */
	private $domNode;
	/**
	 * @var PhpExt_JavascriptStm
	 */
	private $createMethod;
	  
	

	/**** Ext Object Methods ****/

	/**
	 * Static method to retrieve Ext.Element objects.
	 * Uses simple caching to consistently return the same object. Automatically fixes if an object was recreated with the same id via AJAX or DOM.
	 * To retrieve an element by DOM Node use {@link PhpExt_Element::getByDOM}
	 * @param string $id The id of the node to retrieve
	 * @return PhpExt_Element
	 */
    public static function getById($id) {
        $e = new PhpExt_Element();
        $e->id = $id;
        $args = array($id);
		$methodSig = $e->createMethodSignature("get", $args, true);
		$e->createMethod = $e->getMethodInvokeStm('Ext.Element', $methodSig, true);
        return $e;  
    }
    
    /**
	 * Static method to retrieve Ext.Element objects.
	 * Uses simple caching to consistently return the same object. Automatically fixes if an object was recreated with the same id via AJAX or DOM.
	 * To retrieve an element by Id use {@link PhpExt_Element::getById}
	 * @param string $id The DOM node to retrieve
	 * @return PhpExt_Element
	 */
    public static function getByDOM($domNode) {
        if (!(PhpExt_Javascript::isJavascriptStm($domNode))) 
            $domNode = PhpExt_Javascript::variable($domNode);
            
        $e = new PhpExt_Element();
        $e->domNode = $domNode;
        $args = array($domNode);
		$methodSig = $e->createMethodSignature("get", $args, true);
		$e->createMethod = $e->getMethodInvokeStm('Ext.Element', $methodSig, true);
        return $e;        
    }
    
    public function on($eventName, $handler, $scope = null, $options = null) {
        $args = func_get_args();
		$methodSig = $this->createMethodSignature("on", $args);
		return $this->getMethodInvokeStm($this->createMethod->output(), $methodSig);
    }
	
	public function render() {
		$args = func_get_args();
		$methodSig = $this->createMethodSignature("render", $args);
		return $this->getMethodInvokeStm($this->_varName, $methodSig);
	}

	/**** Overrides ****/
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Element", null);

		$validProps = array(			
		);
		$this->addValidConfigProperties($validProps);
				
	}	
	
	/*protected function getConfigParams($lazy = false) {
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
	}*/
		
 	
	
}

