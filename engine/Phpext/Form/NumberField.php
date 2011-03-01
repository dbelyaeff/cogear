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
 * @see PhpExt_Form_TextField
 */
include_once 'PhpExt/Form/TextField.php';

/**
 * Numeric text field that provides automatic keystroke filtering and numeric validation.
 * 
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_NumberField extends PhpExt_Form_TextField 
{	
    // AllowDecimals
    /**
     * False to disallow decimal values (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_NumberField
     */
    public function setAllowDecimals($value) {
    	$this->setExtConfigProperty("allowDecimals", $value);
    	return $this;
    }	
    /**
     * False to disallow decimal values (defaults to true)
     * @return boolean
     */
    public function getAllowDecimals() {
    	return $this->getExtConfigProperty("allowDecimals");
    }
    
    // AllowNegative
    /**
     * False to prevent entering a negative sign (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_NumberField
     */
    public function setAllowNegative($value) {
    	$this->setExtConfigProperty("allowNegative", $value);
    	return $this;
    }	
    /**
     * False to prevent entering a negative sign (defaults to true)
     * @return boolean
     */
    public function getAllowNegative() {
    	return $this->getExtConfigProperty("allowNegative");
    }
    
    // BaseChars
    /**
     * The base set of characters to evaluate as valid numbers (defaults to '0123456789').
     * @param string $value 
     * @return PhpExt_Form_NumberField
     */
    public function setBaseChars($value) {
    	$this->setExtConfigProperty("baseChars", $value);
    	return $this;
    }	
    /**
     * The base set of characters to evaluate as valid numbers (defaults to '0123456789').
     * @return string
     */
    public function getBaseChars() {
    	return $this->getExtConfigProperty("baseChars");
    }
    
    // DecimalPrecision
    /**
     * The maximum precision to display after the decimal separator (defaults to 2)
     * @param integer $value 
     * @return PhpExt_Form_NumberField
     */
    public function setDecimalPrecision($value) {
    	$this->setExtConfigProperty("decimalPrecision", $value);
    	return $this;
    }	
    /**
     * The maximum precision to display after the decimal separator (defaults to 2)
     * @return integer
     */
    public function getDecimalPrecision() {
    	return $this->getExtConfigProperty("decimalPrecision");
    }
    
    // DecimalSeparator
    /**
     * Character(s) to allow as the decimal separator (defaults to '.')
     * @param string $value 
     * @return PhpExt_Form_NumberField
     */
    public function setDecimalSeparator($value) {
    	$this->setExtConfigProperty("decimalSeparator", $value);
    	return $this;
    }	
    /**
     * Character(s) to allow as the decimal separator (defaults to '.')
     * @return string
     */
    public function getDecimalSeparator() {
    	return $this->getExtConfigProperty("decimalSeparator");
    }
    
    // FieldCssClass
    /**
     * The default CSS class for the field (defaults to "x-form-field x-form-num-field")
     * @param string $value 
     * @return PhpExt_Form_NumberField
     */
    public function setFieldCssClass($value) {
    	$this->setExtConfigProperty("fieldClass", $value);
    	return $this;
    }	
    /**
     * The default CSS class for the field (defaults to "x-form-field x-form-num-field")
     * @return string
     */
    public function getFieldCssClass() {
    	return $this->getExtConfigProperty("fieldClass");
    }
    
    // MaxText
    /**
     * Error text to display if the maximum value validation fails (defaults to "The maximum value for this field is {maxValue}")
     * @param string $value 
     * @return PhpExt_Form_NumberField
     */
    public function setMaxText($value) {
    	$this->setExtConfigProperty("maxText", $value);
    	return $this;
    }	
    /**
     * Error text to display if the maximum value validation fails (defaults to "The maximum value for this field is {maxValue}")
     * @return string
     */
    public function getMaxText() {
    	return $this->getExtConfigProperty("maxText");
    }
    
    // MaxValue
    /**
     * The maximum allowed value (defaults to Number.MAX_VALUE)
     * @param integer|float $value 
     * @return PhpExt_Form_NumberField
     */
    public function setMaxValue($value) {
    	$this->setExtConfigProperty("maxValue", $value);
    	return $this;
    }	
    /**
     * The maximum allowed value (defaults to Number.MAX_VALUE)
     * @return integer|float
     */
    public function getMaxValue() {
    	return $this->getExtConfigProperty("maxValue");
    }
    
    // MinText
    /**
     * Error text to display if the minimum value validation fails (defaults to "The minimum value for this field is {minValue}")
     * @param string $value 
     * @return PhpExt_Form_NumberField
     */
    public function setMinText($value) {
    	$this->setExtConfigProperty("minText", $value);
    	return $this;
    }	
    /**
     * Error text to display if the minimum value validation fails (defaults to "The minimum value for this field is {minValue}")
     * @return string
     */
    public function getMinText() {
    	return $this->getExtConfigProperty("minText");
    }
    
    // MinValue
    /**
     * The minimum allowed value (defaults to Number.NEGATIVE_INFINITY)
     * @param integer|float $value 
     * @return PhpExt_Form_NumberField
     */
    public function setMinValue($value) {
    	$this->setExtConfigProperty("minValue", $value);
    	return $this;
    }	
    /**
     * The minimum allowed value (defaults to Number.NEGATIVE_INFINITY)
     * @return integer|float
     */
    public function getMinValue() {
    	return $this->getExtConfigProperty("minValue");
    }
    
    // NanText
    /**
     * Error text to display if the value is not a valid number. For example, this can happen if a valid character like '.' or '-' is left in the field with no number (defaults to "{value} is not a valid number")
     * @param string $value 
     * @return PhpExt_Form_NumberField
     */
    public function setNanText($value) {
    	$this->setExtConfigProperty("nanText", $value);
    	return $this;
    }	
    /**
     * Error text to display if the value is not a valid number. For example, this can happen if a valid character like '.' or '-' is left in the field with no number (defaults to "{value} is not a valid number")
     * @return string
     */
    public function getNanText() {
    	return $this->getExtConfigProperty("nanText");
    }
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.NumberField","numberfield");
		
		$validProps = array(
		    "allowDecimals",
		    "allowNegative",
		    "baseChars",
		    "decimalPrecision",
		    "decimalSeparator",
		    "fieldClass",
		    "maxText",
		    "maxValue",
		    "minText",
		    "minValue",
		    "nanText"
		);
		$this->addValidConfigProperties($validProps);
	}	 
	
    /**
	 * Helper function to create an NumberField.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @return PhpExt_Form_NumberField
	 */
	public static function createNumberField($name, $label = null, $id = null) {
	    $c = new PhpExt_Form_NumberField();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}

	
}

