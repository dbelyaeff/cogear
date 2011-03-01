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
 * @see PhpExt_Form_Field
 */
include_once 'PhpExt/Form/Field.php';

/**
 * Single checkbox field. Can be used as a direct replacement for traditional checkbox fields.
 * 
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_Checkbox extends PhpExt_Form_Field 
{	
    // AutoCreate
    /**
     * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "checkbox", autocomplete: "off"})
     * @param PhpExt_Config_ConfigObject $value 
     * @return PhpExt_Form_Checkbox
     */
    public function setAutoCreate(PhpExt_Config_ConfigObject $value) {
    	return parent::setAutoCreate($value);
    }	
    /**
     * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "checkbox", autocomplete: "off"}) 
     * @return PhpExt_Config_ConfigObject
     */
    public function getAutoCreate() {
    	return parent::getAutoCreate();
    }
    
    // BoxLabel
    /**
     * The text that appears beside the checkbox
     * @param string $value 
     * @return PhpExt_Form_Checkbox
     */
    public function setBoxLabel($value) {
    	$this->setExtConfigProperty("boxLabel", $value);
    	return $this;
    }	
    /**
     * The text that appears beside the checkbox
     * @return string
     */
    public function getBoxLabel() {
    	return $this->getExtConfigProperty("boxLabel");
    }
    
    // Checked
    /**
     * True if the the checkbox should render already checked (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Form_Checkbox
     */
    public function setChecked($value) {
    	$this->setExtConfigProperty("checked", $value);
    	return $this;
    }	
    /**
     * True if the the checkbox should render already checked (defaults to false)
     * @return boolean
     */
    public function getChecked() {
    	return $this->getExtConfigProperty("checked");
    }
    
    // FieldCssClass
    /**
     * The default CSS class for the checkbox (defaults to "x-form-field")
     * @param string $value 
     * @return PhpExt_Form_Checkbox
     */
    public function setFieldCssClass($value) {
    	return parent::setFieldCssClass($value);
    }	
    /**
     * The default CSS class for the checkbox (defaults to "x-form-field")
     * @return string
     */
    public function getFieldCssClass() {
    	return parent::getFieldCssClass();
    }
    
    // FocusClass
    /**
     * The CSS class to use when the checkbox receives focus (defaults to undefined)
     * @param string $value 
     * @return PhpExt_Form_Checkbox
     */
    public function setFocusClass($value) {
    	$this->setExtConfigProperty("focusClass", $value);
    	return $this;
    }	
    /**
     * The CSS class to use when the checkbox receives focus (defaults to undefined)
     * @return string
     */
    public function getFocusClass() {
    	return $this->getExtConfigProperty("focusClass");
    }
    
    // InputValue
    /**
     * The value that should go into the generated input element's value attribute
     * @param string $value 
     * @return PhpExt_Form_Checkbox
     */
    public function setInputValue($value) {
    	$this->setExtConfigProperty("inputValue", $value);
    	return $this;
    }	
    /**
     * The value that should go into the generated input element's value attribute
     * @return string
     */
    public function getInputValue() {
    	return $this->getExtConfigProperty("inputValue");
    }    	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.Checkbox","checkbox");
		
		$validProps = array(
		    "autoCreate",
		    "boxLabel",
		    "checked",
		    "fieldClass",
		    "focusClass",
		    "inputValue"
		);
		$this->addValidConfigProperties($validProps);
	}

	/**
	 * Helper function to create a Checkbox.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @param string $inputValue The value when the field is checked
	 * @return PhpExt_Form_Checkbox
	 */
	public static function createCheckbox($name, $label = null, $id = null, $inputValue = null) {
	    $c = new PhpExt_Form_Checkbox();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
	    if ($inputValue !== null)
	      $c->setInputValue($inputValue);
	      
	    return $c;
	}
	
	
	
}

