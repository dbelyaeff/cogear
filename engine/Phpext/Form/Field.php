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
 * @see PhpExt_Form_FormPanel
 */
include_once 'PhpExt/Form/FormPanel.php';

/**
 * @see PhpExt_Toolbar_IToolbarItem
 */
include_once 'PhpExt/Toolbar/IToolbarItem.php';

/**
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_Field extends PhpExt_BoxComponent implements PhpExt_Toolbar_IToolbarItem 
{
    // AutoCreate
    /**
     * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "text", size: "20", autocomplete: "off"})
     * @param PhpExt_Config_ConfigObject $value 
     * @return PhpExt_Form_Field
     */
    public function setAutoCreate(PhpExt_Config_ConfigObject $value) {
    	$this->setExtConfigProperty("autoCreate", $value);
    	return $this;
    }	
    /**
     * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "text", size: "20", autocomplete: "off"})
     * @return PhpExt_Config_ConfigObject
     */
    public function getAutoCreate() {
    	return $this->getExtConfigProperty("autoCreate");
    }
    
    // ClearCssClass
    /**
     * The CSS class used to provide field clearing (defaults to 'x-form-clear-left')
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setClearCssClass($value) {
    	$this->setExtConfigProperty("clearCls", $value);
    	return $this;
    }	
    /**
     * The CSS class used to provide field clearing (defaults to 'x-form-clear-left')
     * @return string
     */
    public function getClearCssClass() {
    	return $this->getExtConfigProperty("clearCls");
    }
    
    // CssClass
    /**
     * A CSS class to apply to the field's underlying element.
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setCssClass($value) {
    	return parent::setCssClass($value);
    }	
    /**
     * A CSS class to apply to the field's underlying element.
     * @return string
     */
    public function getCssClass() {
    	return parent::getCssClass();
    }
    
    // Disabled
    /**
     * True to disable the field (defaults to false).
     * @param boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setDisabled($value) {
    	$this->setExtConfigProperty("disabled", $value);
    	return $this;
    }	
    /**
     * True to disable the field (defaults to false).
     * @return boolean
     */
    public function getDisabled() {
    	return $this->getExtConfigProperty("disabled");
    }
    
    // FieldCssClass
    /**
     * The default CSS class for the field (defaults to "x-form-field")
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setFieldCssClass($value) {
    	$this->setExtConfigProperty("fieldClass", $value);
    	return $this;
    }	
    /**
     * The default CSS class for the field (defaults to "x-form-field")
     * @return string
     */
    public function getFieldCssClass() {
    	return $this->getExtConfigProperty("fieldClass");
    }
    
    // FieldLabel
    /**
     * The label text to display next to this field (defaults to '')
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setFieldLabel($value) {
    	$this->setExtConfigProperty("fieldLabel", $value);
    	return $this;
    }	
    /**
     * The label text to display next to this field (defaults to '')
     * @return string
     */
    public function getFieldLabel() {
    	return $this->getExtConfigProperty("fieldLabel");
    }
    
    // FocusCssClass
    /**
     * The CSS class to use when the field receives focus (defaults to "x-form-focus")
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setFocusCssClass($value) {
    	$this->setExtConfigProperty("focusClass", $value);
    	return $this;
    }	
    /**
     * The CSS class to use when the field receives focus (defaults to "x-form-focus")
     * @return string
     */
    public function getFocusCssClass() {
    	return $this->getExtConfigProperty("focusClass");
    }
    
    // HideLabel
    /**
     * True to completely hide the label element (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setHideLabel($value) {
    	$this->setExtConfigProperty("hideLabel", $value);
    	return $this;
    }	
    /**
     * True to completely hide the label element (defaults to false)
     * @return boolean
     */
    public function getHideLabel() {
    	return $this->getExtConfigProperty("hideLabel");
    }
    
    // InputType
    /**
     * The type attribute for input fields -- e.g. radio, text, password (defaults to "text").
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setInputType($value) {
    	$this->setExtConfigProperty("inputType", $value);
    	return $this;
    }	
    /**
     * The type attribute for input fields -- e.g. radio, text, password (defaults to "text").
     * @return string
     */
    public function getInputType() {
    	return $this->getExtConfigProperty("inputType");
    }
    
    // InvalidCssClass
    /**
     * The CSS class to use when marking a field invalid (defaults to "x-form-invalid")
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setInvalidCssClass($value) {
    	$this->setExtConfigProperty("invalidClass", $value);
    	return $this;
    }	
    /**
     * The CSS class to use when marking a field invalid (defaults to "x-form-invalid")
     * @return string
     */
    public function getInvalidCssClass() {
    	return $this->getExtConfigProperty("invalidClass");
    }
    
    // InvalidText
    /**
     * The error text to use when marking a field invalid and no message is provided (defaults to "The value in this field is invalid")
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setInvalidText($value) {
    	$this->setExtConfigProperty("invalidText", $value);
    	return $this;
    }	
    /**
     * The error text to use when marking a field invalid and no message is provided (defaults to "The value in this field is invalid")
     * @return string
     */
    public function getInvalidText() {
    	return $this->getExtConfigProperty("invalidText");
    }
    
    // ItemCssClass
    /**
     * An additional CSS class to apply to this field (defaults to the container's itemCls value if set, or '')
     * @param boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setItemCssClass($value) {
    	$this->setExtConfigProperty("itemCls", $value);
    	return $this;
    }	
    /**
     * An additional CSS class to apply to this field (defaults to the container's itemCls value if set, or '')
     * @return boolean
     */
    public function getItemCssClass() {
    	return $this->getExtConfigProperty("itemCls");
    }
    
    // LabelSeparator
    /**
     * The standard separator to display after the text of each form label (defaults to the value of Ext.layout.FormLayout.labelSeparator, which is a colon ':' by default). To display no separator for this field's label specify empty string ''.
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setLabelSeparator($value) {
    	$this->setExtConfigProperty("labelSeparator", $value);
    	return $this;
    }	
    /**
     * The standard separator to display after the text of each form label (defaults to the value of Ext.layout.FormLayout.labelSeparator, which is a colon ':' by default). To display no separator for this field's label specify empty string ''.
     * @return string
     */
    public function getLabelSeparator() {
    	return $this->getExtConfigProperty("labelSeparator");
    }
    
    // LabelCssStyle
    /**
     * A CSS style specification to apply directly to this field's label (defaults to the container's labelStyle value if set, or ''). For example: 'font-weight:bold;'.
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setLabelCssStyle($value) {
    	$this->setExtConfigProperty("labelStyle", $value);
    	return $this;
    }	
    /**
     * A CSS style specification to apply directly to this field's label (defaults to the container's labelStyle value if set, or ''). For example: 'font-weight:bold;'.
     * @return string
     */
    public function getLabelCssStyle() {
    	return $this->getExtConfigProperty("labelStyle");
    }
    
    // MsgFx
    /**
     * Experimental The effect used when displaying a validation message under the field (defaults to 'normal').
     * @param boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setMsgFx($value) {
    	$this->setExtConfigProperty("msgFx", $value);
    	return $this;
    }	
    /**
     * Experimental The effect used when displaying a validation message under the field (defaults to 'normal').
     * @return boolean
     */
    public function getMsgFx() {
    	return $this->getExtConfigProperty("msgFx");
    }
    
    // MsgTarget
    /**
     * The location where error text should display. Should be one of the following values (defaults to 'qtip'):
     * <pre>
     * Value                                           Description
	 * --------------------------------------------    ----------------------------------------------------------------------
	 * PhpExt_Form_FormPanel::MSG_TARGET_QTIP          Display a quick tip when the user hovers over the field
	 * PhpExt_Form_FormPanel::MSG_TARGET_TITLE         Display a default browser title attribute popup
	 * PhpExt_Form_FormPanel::MSG_TARGET_UNDER         Add a block div beneath the field containing the error text
	 * PhpExt_Form_FormPanel::MSG_TARGET_SIDE          Add an error icon to the right of the field with a popup on hover
	 * [element id]                                    Add the error text directly to the innerHTML of the specified element
     * </pre>
     * @uses PhpExt_Form_FormPanel::MSG_TARGET_QTIP
	 * @uses PhpExt_Form_FormPanel::MSG_TARGET_TITLE
	 * @uses PhpExt_Form_FormPanel::MSG_TARGET_UNDER
	 * @uses PhpExt_Form_FormPanel::MSG_TARGET_SIDE
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setMsgTarget($value) {
    	$this->setExtConfigProperty("msgTarget", $value);
    	return $this;
    }	
    /**
     * The location where error text should display. Should be one of the following values (defaults to 'qtip'):
     * <pre>
     * Value                                           Description
	 * --------------------------------------------    ----------------------------------------------------------------------
	 * PhpExt_Form_FormPanel::MSG_TARGET_QTIP          Display a quick tip when the user hovers over the field
	 * PhpExt_Form_FormPanel::MSG_TARGET_TITLE         Display a default browser title attribute popup
	 * PhpExt_Form_FormPanel::MSG_TARGET_UNDER         Add a block div beneath the field containing the error text
	 * PhpExt_Form_FormPanel::MSG_TARGET_SIDE          Add an error icon to the right of the field with a popup on hover
	 * [element id]                                    Add the error text directly to the innerHTML of the specified element
     * </pre>
     * @uses PhpExt_Form_FormPanel::MSG_TARGET_QTIP
	 * @uses PhpExt_Form_FormPanel::MSG_TARGET_TITLE
	 * @uses PhpExt_Form_FormPanel::MSG_TARGET_UNDER
	 * @uses PhpExt_Form_FormPanel::MSG_TARGET_SIDE
     * @return string
     */
    public function getMsgTarget() {
    	return $this->getExtConfigProperty("msgTarget");
    }
    
    // Name
    /**
     * The field's HTML name attribute.
     * @param string $value 
     * @return PhpExt_Form_Field
     */
    public function setName($value) {
    	$this->setExtConfigProperty("name", $value);
    	return $this;
    }	
    /**
     * The field's HTML name attribute.
     * @return string
     */
    public function getName() {
    	return $this->getExtConfigProperty("name");
    }
    
    // ReadOnly
    /**
     * True to mark the field as readOnly in HTML (defaults to false) -- Note: this only sets the element's readOnly DOM attribute.
     * @param boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setReadOnly($value) {
    	$this->setExtConfigProperty("readOnly", $value);
    	return $this;
    }	
    /**
     * True to mark the field as readOnly in HTML (defaults to false) -- Note: this only sets the element's readOnly DOM attribute.
     * @return boolean
     */
    public function getReadOnly() {
    	return $this->getExtConfigProperty("readOnly");
    }
    
    // TabIndex
    /**
     * The tabIndex for this field. Note this only applies to fields that are rendered, not those which are built via applyTo (defaults to undefined).
     * @param integer $value 
     * @return PhpExt_Form_Field
     */
    public function setTabIndex($value) {
    	$this->setExtConfigProperty("tabIndex", $value);
    	return $this;
    }	
    /**
     * The tabIndex for this field. Note this only applies to fields that are rendered, not those which are built via applyTo (defaults to undefined).
     * @return integer
     */
    public function getTabIndex() {
    	return $this->getExtConfigProperty("tabIndex");
    }
    
    // ValidateOnBlur
    /**
     * Whether the field should validate when it loses focus (defaults to true).
     * @param boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setValidateOnBlur($value) {
    	$this->setExtConfigProperty("validateOnBlur", $value);
    	return $this;
    }	
    /**
     * Whether the field should validate when it loses focus (defaults to true).
     * @return boolean
     */
    public function getValidateOnBlur() {
    	return $this->getExtConfigProperty("validateOnBlur");
    }
    
    // ValidationDelay
    /**
     * The length of time in milliseconds after user input begins until validation is initiated (defaults to 250)
     * @param integer $value 
     * @return PhpExt_Form_Field
     */
    public function setValidationDelay($value) {
    	$this->setExtConfigProperty("validationDelay", $value);
    	return $this;
    }	
    /**
     * The length of time in milliseconds after user input begins until validation is initiated (defaults to 250)
     * @return integer
     */
    public function getValidationDelay() {
    	return $this->getExtConfigProperty("validationDelay");
    }
    
    // ValidationEvent
    /**
     * The event that should initiate field validation. Set to false to disable automatic validation (defaults to "keyup").
     * @param string|boolean $value 
     * @return PhpExt_Form_Field
     */
    public function setValidationEvent($value) {
    	$this->setExtConfigProperty("validationEvent", $value);
    	return $this;
    }	
    /**
     * The event that should initiate field validation. Set to false to disable automatic validation (defaults to "keyup").
     * @return string|boolean
     */
    public function getValidationEvent() {
    	return $this->getExtConfigProperty("validationEvent");
    }
    
    // Value
    /**
     * A value to initialize this field with.
     * @param mixed $value 
     * @return PhpExt_Form_Field
     */
    public function setValue($value) {
    	$this->setExtConfigProperty("value", $value);
    	return $this;
    }	
    /**
     * A value to initialize this field with.
     * @return mixed
     */
    public function getValue() {
    	return $this->getExtConfigProperty("value");
    }
    		
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.Field","field");
		
		$validProps = array(
		    "autoCreate",
		    "clearCls",
		    "cls",
		    "disabled",
		    "fieldClass",
		    "fieldLabel",
		    "focusClass",
		    "hideLabel",
		    "inputType",
		    "invalidClass",
		    "invalidText",
		    "itemCls",
		    "labelSeparator",
		    "labelStyle",
		    "msgFx",
		    "msgTarget",
		    "name",
		    "readOnly",
		    "tabIndex",
		    "validateOnBlur",
		    "validationDelay",
		    "validationEvent",
		    "value"
		);
		$this->addValidConfigProperties($validProps);
	}	
		
 	
	
}

