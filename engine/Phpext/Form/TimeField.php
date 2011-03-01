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
 * @see PhpExt_Form_ComboBox
 */
include_once 'PhpExt/Form/ComboBox.php';

/**
 * Provides a time input field with a time dropdown and automatic time validation.
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_TimeField extends PhpExt_Form_ComboBox 
{
    // AltFormats
    /**
     * Multiple date formats separated by "|" to try when parsing a user input value and it doesn't match the defined format (defaults to 'm/d/Y|m-d-y|m-d-Y|m/d|m-d|d').
     * @param string $value 
     * @return PhpExt_Form_TimeField
     */
    public function setAltFormats($value) {
    	$this->setExtConfigProperty("altFormats", $value);
    	return $this;
    }	
    /**
     * Multiple date formats separated by "|" to try when parsing a user input value and it doesn't match the defined format (defaults to 'm/d/Y|m-d-y|m-d-Y|m/d|m-d|d').
     * @return string
     */
    public function getAltFormats() {
    	return $this->getExtConfigProperty("altFormats");
    }
    
    // Format
	/**
	 * The default date format string which can be overriden for localization support. The format must be valid according to Date.parseDate (defaults to 'm/d/y').
	 * @param string $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setFormat($value) {
		$this->setExtConfigProperty("format", $value);
		return $this;
	}	
	/**
	 * The default date format string which can be overriden for localization support. The format must be valid according to Date.parseDate (defaults to 'm/d/y').
	 * @return string
	 */
	public function getFormat() {
		return $this->getExtConfigProperty("format");
	}
    
	// Increment
	/**
	 * The number of minutes between each time value in the list (defaults to 15).
	 * @param integer $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setIncrement($value) {
		$this->setExtConfigProperty("increment", $value);
		return $this;
	}	
	/**
	 * The number of minutes between each time value in the list (defaults to 15).
	 * @return integer
	 */
	public function getIncrement() {
		return $this->getExtConfigProperty("increment");
	}
	
	// InvalidText
	/**
	 * The error text to display when the time in the field is invalid (defaults to '{value} is not a valid time - it must be in the format {format}').
	 * @param string $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setInvalidText($value) {
		$this->setExtConfigProperty("invalidText", $value);
		return $this;
	}	
	/**
	 * The error text to display when the time in the field is invalid (defaults to '{value} is not a valid time - it must be in the format {format}').
	 * @return string
	 */
	public function getInvalidText() {
		return $this->getExtConfigProperty("invalidText");
	}
	
// MaxText
	/**
	 * The error text to display when the time is after maxValue (defaults to 'The time in this field must be equal to or before {0}').
	 * @param string $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setMaxText($value) {
		$this->setExtConfigProperty("maxText", $value);
		return $this;
	}	
	/**
	 * The error text to display when the time is after maxValue (defaults to 'The time in this field must be equal to or before {0}').
	 * @return string
	 */
	public function getMaxText() {
		return $this->getExtConfigProperty("maxText");
	}
	
	// MaxValue
	/**
	 * The maximum allowed time. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @param string|PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setMaxValue($value) {
		$this->setExtConfigProperty("maxValue", $value);
		return $this;
	}	
	/**
	 * The maximum allowed time. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getMaxValue() {
		return $this->getExtConfigProperty("maxValue");
	}
	
	// MinText
	/**
	 * The error text to display when the date in the cell is before minValue (defaults to 'The time in this field must be equal to or after {0}').
	 * @param string $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setMinText($value) {
		$this->setExtConfigProperty("minText", $value);
		return $this;
	}	
	/**
	 * The error text to display when the date in the cell is before minValue (defaults to 'The time in this field must be equal to or after {0}').
	 * @return string
	 */
	public function getMinText() {
		return $this->getExtConfigProperty("minText");
	}
	
	// MinValue
	/**
	 * The minimum allowed time. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @param string|PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_TimeField
	 */
	public function setMinValue($value) {
		$this->setExtConfigProperty("minValue", $value);
		return $this;
	}	
	/**
	 * The minimum allowed time. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getMinValue() {
		return $this->getExtConfigProperty("minValue");
	}	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.TimeField", "timefield");

		$validProps = array(
		    "altFormat",
		    "format",
		    "increment",
		    "invalidText",
		    "maxText",
		    "maxValue",
		    "minText",
		    "minValue"
		);
		$this->addValidConfigProperties($validProps);
	}	
		
    /**
	 * Helper function to create a TimeField.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).	 
	 * @return PhpExt_Form_TimeField
	 */
	public static function createTimeField($name, $label = null, $id = null) {
	    $c = new PhpExt_Form_TimeField();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}
	
}


