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
 * Basic text field. Can be used as a direct replacement for traditional text inputs, or as the base class for more sophisticated input controls (like {@link PhpExt_Form_TextArea} and {@link PhpExt_Form_ComboBox}).
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_TextField extends PhpExt_Form_Field 
{	
	public $IsPassword = false;
	
	// AllowBlank
	/**
	 * False to validate that the value length > 0 (defaults to true)
	 * @param boolean $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setAllowBlank($value) {
		$this->setExtConfigProperty("allowBlank", $value);
		return $this;
	}	
	/**
	 * False to validate that the value length > 0 (defaults to true)
	 * @return boolean
	 */
	public function getAllowBlank() {
		return $this->getExtConfigProperty("allowBlank");
	}
	
	// BlankText
	/**
	 * Error text to display if the allow blank validation fails (defaults to "This field is required")
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setBlankText($value) {
		$this->setExtConfigProperty("blankText", $value);
		return $this;
	}	
	/**
	 * Error text to display if the allow blank validation fails (defaults to "This field is required")
	 * @return string
	 */
	public function getBlankText() {
		return $this->getExtConfigProperty("blankText");
	}
	
	// DisableKeyFilter
	/**
	 * True to disable input keystroke filtering (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setDisableKeyFilter($value) {
		$this->setExtConfigProperty("disableKeyFilter", $value);
		return $this;
	}	
	/**
	 * True to disable input keystroke filtering (defaults to false)
	 * @return boolean
	 */
	public function getDisableKeyFilter() {
		return $this->getExtConfigProperty("disableKeyFilter");
	}
	
	// EmptyCssClass
	/**
	 * The CSS class to apply to an empty field to style the emptyText (defaults to 'x-form-empty-field'). This class is automatically added and removed as needed depending on the current field value.
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setEmptyCssClass($value) {
		$this->setExtConfigProperty("emptyClass", $value);
		return $this;
	}	
	/**
	 * The CSS class to apply to an empty field to style the emptyText (defaults to 'x-form-empty-field'). This class is automatically added and removed as needed depending on the current field value.
	 * @return string
	 */
	public function getEmptyCssClass() {
		return $this->getExtConfigProperty("emptyClass");
	}
	
	// EmptyText
	/**
	 * The default text to display in an empty field (defaults to null).
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setEmptyText($value) {
		$this->setExtConfigProperty("emptyText", $value);
		return $this;
	}	
	/**
	 * The default text to display in an empty field (defaults to null).
	 * @return string
	 */
	public function getEmptyText() {
		return $this->getExtConfigProperty("emptyText");
	}
	
	// Grow
	/**
	 * True if this field should automatically grow and shrink to its content
	 * @param boolean $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setGrow($value) {
		$this->setExtConfigProperty("grow", $value);
		return $this;
	}	
	/**
	 * True if this field should automatically grow and shrink to its content
	 * @return boolean
	 */
	public function getGrow() {
		return $this->getExtConfigProperty("grow");
	}
	
	// GrowMax
	/**
	 * The maximum width to allow when grow = true (defaults to 800)
	 * @param integer $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setGrowMax($value) {
		$this->setExtConfigProperty("growMax", $value);
		return $this;
	}	
	/**
	 * The maximum width to allow when grow = true (defaults to 800)
	 * @return integer
	 */
	public function getGrowMax() {
		return $this->getExtConfigProperty("growMax");
	}
	
	// GrowMin
	/**
	 * The minimum width to allow when grow = true (defaults to 30)
	 * @param integer $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setGrowMin($value) {
		$this->setExtConfigProperty("growMin", $value);
		return $this;
	}	
	/**
	 * The minimum width to allow when grow = true (defaults to 30)
	 * @return integer
	 */
	public function getGrowMin() {
		return $this->getExtConfigProperty("growMin");
	}
	
	// MaskRegEx
	/**
	 * An input mask regular expression (Javascript RegEx) that will be used to filter keystrokes that don't match (defaults to null)
	 * @param PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setMaskRegEx($value) {
		$this->setExtConfigProperty("maskRe", $value);
		return $this;
	}	
	/**
	 * An input mask regular expression (Javascript RegEx) that will be used to filter keystrokes that don't match (defaults to null)
	 * @return PhpExt_JavascriptStm
	 */
	public function getMaskRegEx() {
		return $this->getExtConfigProperty("maskRe");
	}
	
	// MaxLength
	/**
	 * Maximum input field length allowed (defaults to Number.MAX_VALUE)
	 * @param integer $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setMaxLength($value) {
		$this->setExtConfigProperty("maxLength", $value);
		return $this;
	}	
	/**
	 * Maximum input field length allowed (defaults to Number.MAX_VALUE)
	 * @return integer
	 */
	public function getMaxLength() {
		return $this->getExtConfigProperty("maxLength");
	}
	
	// MaxLengthText
	/**
	 * Error text to display if the maximum length validation fails (defaults to "The maximum length for this field is {maxLength}")
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setMaxLengthText($value) {
		$this->setExtConfigProperty("maxLengthText", $value);
		return $this;
	}	
	/**
	 * Error text to display if the maximum length validation fails (defaults to "The maximum length for this field is {maxLength}")
	 * @return string
	 */
	public function getMaxLengthText() {
		return $this->getExtConfigProperty("maxLengthText");
	}
	
	// MinLength
	/**
	 * Minimum input field length required (defaults to 0)
	 * @param integer $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setMinLength($value) {
		$this->setExtConfigProperty("minLength", $value);
		return $this;
	}	
	/**
	 * Minimum input field length required (defaults to 0)
	 * @return integer
	 */
	public function getMinLength() {
		return $this->getExtConfigProperty("minLength");
	}
	
	// MinLengthText
	/**
	 * Error text to display if the minimum length validation fails (defaults to "The minimum length for this field is {minLength}")
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setMinLengthText($value) {
		$this->setExtConfigProperty("minLengthText", $value);
		return $this;
	}	
	/**
	 * Error text to display if the minimum length validation fails (defaults to "The minimum length for this field is {minLength}")
	 * @return string
	 */
	public function getMinLengthText() {
		return $this->getExtConfigProperty("minLengthText");
	}
	
	// RegEx
	/**
	 * A JavaScript RegExp object to be tested against the field value during validation (defaults to null). If available, this regex will be evaluated only after the basic validators all return true, and will be passed the current field value. If the test fails, the field will be marked invalid using regexText.
	 * @param PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setRegEx($value) {
		$this->setExtConfigProperty("regex", $value);
		return $this;
	}	
	/**
	 * A JavaScript RegExp object to be tested against the field value during validation (defaults to null). If available, this regex will be evaluated only after the basic validators all return true, and will be passed the current field value. If the test fails, the field will be marked invalid using regexText.
	 * @return PhpExt_JavascriptStm
	 */
	public function getRegEx() {
		return $this->getExtConfigProperty("regex");
	}
	
	// RegExText
	/**
	 * The error text to display if regex is used and the test fails during validation (defaults to "")
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setRegExText($value) {
		$this->setExtConfigProperty("regexText", $value);
		return $this;
	}	
	/**
	 * The error text to display if regex is used and the test fails during validation (defaults to "")
	 * @return string
	 */
	public function getRegExText() {
		return $this->getExtConfigProperty("regexText");
	}
	
	// SelectOnFocus
	/**
	 * True to automatically select any existing field text when the field receives input focus (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setSelectOnFocus($value) {
		$this->setExtConfigProperty("selectOnFocus", $value);
		return $this;
	}	
	/**
	 * True to automatically select any existing field text when the field receives input focus (defaults to false)
	 * @return boolean
	 */
	public function getSelectOnFocus() {
		return $this->getExtConfigProperty("selectOnFocus");
	}

	// Validator
	/**
	 * A custom validation function to be called during field validation (defaults to null). If available, this function will be called only after the basic validators all return true, and will be passed the current field value and expected to return boolean true if the value is valid or a string error message if invalid.
	 * @param PhpExt_Handler $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setValidator($value) {
		$this->setExtConfigProperty("validator", $value);
		return $this;
	}	
	/**
	 * A custom validation function to be called during field validation (defaults to null). If available, this function will be called only after the basic validators all return true, and will be passed the current field value and expected to return boolean true if the value is valid or a string error message if invalid.
	 * @return PhpExt_Handler
	 */
	public function getValidator() {
		return $this->getExtConfigProperty("validator");
	}
	
	// VType
	/**
	 * A validation type name as defined in PhpExt_Form_FormPanel (defaults to null). Posible values are:
	 *  - PhpExt_Form_FormPanel::VTYPE_ALPHAMASK
	 *  - PhpExt_Form_FormPanel::VTYPE_ALPHANUM
	 *  - PhpExt_Form_FormPanel::VTYPE_EMAIL
	 *  - PhpExt_Form_FormPanel::VTYPE_URL
	 * @uses PhpExt_Form_FormPanel::VTYPE_ALPHAMASK
	 * @uses PhpExt_Form_FormPanel::VTYPE_ALPHANUM
	 * @uses PhpExt_Form_FormPanel::VTYPE_EMAIL
	 * @uses PhpExt_Form_FormPanel::VTYPE_URL
	 * @param string $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setVType($value) {
		$this->setExtConfigProperty("vtype", $value);
		return $this;
	}	
	/**
	 * A validation type name as defined in PhpExt_Form_FormPanel (defaults to null). Posible values are:
	 *  - PhpExt_Form_FormPanel::VTYPE_ALPHAMASK
	 *  - PhpExt_Form_FormPanel::VTYPE_ALPHANUM
	 *  - PhpExt_Form_FormPanel::VTYPE_EMAIL
	 *  - PhpExt_Form_FormPanel::VTYPE_URL
	 * @uses PhpExt_Form_FormPanel::VTYPE_ALPHAMASK
	 * @uses PhpExt_Form_FormPanel::VTYPE_ALPHANUM
	 * @uses PhpExt_Form_FormPanel::VTYPE_EMAIL
	 * @uses PhpExt_Form_FormPanel::VTYPE_URL
	 * @return string
	 */
	public function getVType() {
		return $this->getExtConfigProperty("vtype");
	}
	
	// VTypeText
	/**
	 * A custom error message to display in place of the default message provided for the vtype currently set for this field (defaults to ''). Only applies if vtype is set, else ignored.
	 * @param boolean $value 
	 * @return PhpExt_Form_TextField
	 */
	public function setVTypeText($value) {
		$this->setExtConfigProperty("vtypeText", $value);
		return $this;
	}	
	/**
	 * A custom error message to display in place of the default message provided for the vtype currently set for this field (defaults to ''). Only applies if vtype is set, else ignored.
	 * @return boolean
	 */
	public function getVTypeText() {
		return $this->getExtConfigProperty("vtypeText");
	}
		
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.TextField","textfield");
		
		$validProps = array(
		    "allowBlank",
		    "blankText",
		    "disableKeyFilter",
		    "emptyClass",
		    "emptyText",
		    "grow",
		    "growMax",
		    "growMin",
		    "maskRe",
		    "maxLength",
		    "maxLengthText",
		    "minLength",
		    "minLengthText",
		    "regex",
		    "regexText",
		    "selectOnFocus",
		    "validator",
		    "vtype",
		    "vtypeText"
		);
		$this->addValidConfigProperties($validProps);
		

	}	 
	
    /**
	 * Helper function to create a TextField.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @param string $vtype A validation type name as defined in PhpExt_Form_FormPanel. i.e. {@link PhpExt_Form_FormPanel::VTYPE_EMAIL} 
	 * @uses PhpExt_Form_FormPanel::VTYPE_ALPHAMASK
	 * @uses PhpExt_Form_FormPanel::VTYPE_ALPHANUM
	 * @uses PhpExt_Form_FormPanel::VTYPE_EMAIL
	 * @uses PhpExt_Form_FormPanel::VTYPE_URL
	 * @return PhpExt_Form_TextField
	 */
	public static function createTextField($name, $label = null, $id = null, $vtype = null) {
	    $c = new PhpExt_Form_TextField();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
	    if ($vtype !== null)
		    $c->setVType($vtype);		    		   
        return $c;
	}
	
}

