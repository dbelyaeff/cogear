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
 * @see PhpExt_Form_TriggerField
 */
include_once 'PhpExt/Form/TriggerField.php';

/**
 * Provides a date input field with a Ext.DatePicker dropdown and automatic date validation.
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_DateField extends PhpExt_Form_TriggerField 
{
    // AltFormats
    /**
     * Multiple date formats separated by "|" to try when parsing a user input value and it doesn't match the defined format (defaults to 'm/d/Y|m-d-y|m-d-Y|m/d|m-d|d').
     * @param string $value 
     * @return PhpExt_Form_DateField
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
    
	// AutoCreate
	/**
	 * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "text", size: "10", autocomplete: "off"})
	 * @param PhpExt_Config_ConfigObject $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setAutoCreate(PhpExt_Config_ConfigObject $value) {
		return parent::setAutoCreate($value);
	}	
	/**
	 * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "text", size: "10", autocomplete: "off"})
	 * @return PhpExt_Config_Config
	 */
	public function getAutoCreate() {
		return parent::getAutoCreate();
	}
	
	// DisableDates
	/**
	 * An array of "dates" to disable, as strings. These strings will be used to build a dynamic regular expression so they are very powerful. Some examples:
     * <pre>
     * ["03/08/2003", "09/16/2003"] would disable those exact dates
     * ["03/08", "09/16"] would disable those days for every year
     * ["^03/08"] would only match the beginning (useful if you are using short years)
     * ["03/../2006"] would disable every day in March 2006
     * ["^03"] would disable every day in every March
     * </pre>
     * In order to support regular expressions, if you are using a date format that has "." in it, you will have to escape the dot when restricting dates. For example: ["03\\.08\\.03"].
	 * @param array $value An array of regular expression strings 
	 * @return PhpExt_Form_DateField
	 */
	public function setDisableDates($value) {
		$this->setExtConfigProperty("disableDates", $value);
		return $this;
	}	
	/**
	 * An array of "dates" to disable, as strings. These strings will be used to build a dynamic regular expression so they are very powerful. Some examples:
     * <pre>
     * ["03/08/2003", "09/16/2003"] would disable those exact dates
     * ["03/08", "09/16"] would disable those days for every year
     * ["^03/08"] would only match the beginning (useful if you are using short years)
     * ["03/../2006"] would disable every day in March 2006
     * ["^03"] would disable every day in every March
     * </pre>
     * In order to support regular expressions, if you are using a date format that has "." in it, you will have to escape the dot when restricting dates. For example: ["03\\.08\\.03"].
	 * @return array An array of regular expression strings
	 */
	public function getDisableDates() {
		return $this->getExtConfigProperty("disableDates");
	}
	
	// DisabledDatesText
	/**
	 * The tooltip text to display when the date falls on a disabled date (defaults to 'Disabled'
	 * @param string $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setDisabledDatesText($value) {
		$this->setExtConfigProperty("disabledDatesText", $value);
		return $this;
	}	
	/**
	 * The tooltip text to display when the date falls on a disabled date (defaults to 'Disabled'
	 * @return string
	 */
	public function getDisabledDatesText() {
		return $this->getExtConfigProperty("disabledDatesText");
	}
	
	// DisabledDays
	/**
	 * An array of days to disable, 0 based. For example, [0, 6] disables Sunday and Saturday (defaults to null).
	 * @param array $value An array of integer values corresponding to 0 based days of the week. 
	 * @return PhpExt_Form_DateField
	 */
	public function setDisabledDays($value) {
		$this->setExtConfigProperty("disabledDays", $value);
		return $this;
	}	
	/**
	 * An array of days to disable, 0 based. For example, [0, 6] disables Sunday and Saturday (defaults to null).
	 * @return array An array of integer values corresponding to 0 based days of the week.
	 */
	public function getDisabledDays() {
		return $this->getExtConfigProperty("disabledDays");
	}
	
	// DisabledDaysText
	/**
	 * The tooltip to display when the date falls on a disabled day (defaults to 'Disabled')
	 * @param string $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setDisabledDaysText($value) {
		$this->setExtConfigProperty("disabledDaysText", $value);
		return $this;
	}	
	/**
	 * The tooltip to display when the date falls on a disabled day (defaults to 'Disabled')
	 * @return string
	 */
	public function getDisabledDaysText() {
		return $this->getExtConfigProperty("disabledDaysText");
	}
	
	// Format
	/**
	 * The default date format string which can be overriden for localization support. The format must be valid according to Date.parseDate (defaults to 'm/d/y').
	 * @param string $value 
	 * @return PhpExt_Form_DateField
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
	
	// InvalidText
	/**
	 * The error text to display when the date in the field is invalid (defaults to '{value} is not a valid date - it must be in the format {format}').
	 * @param string $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setInvalidText($value) {
		$this->setExtConfigProperty("invalidText", $value);
		return $this;
	}	
	/**
	 * The error text to display when the date in the field is invalid (defaults to '{value} is not a valid date - it must be in the format {format}').
	 * @return string
	 */
	public function getInvalidText() {
		return $this->getExtConfigProperty("invalidText");
	}
    
	// MaxText
	/**
	 * The error text to display when the date in the cell is after maxValue (defaults to 'The date in this field must be before {maxValue}').
	 * @param string $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setMaxText($value) {
		$this->setExtConfigProperty("maxText", $value);
		return $this;
	}	
	/**
	 * The error text to display when the date in the cell is after maxValue (defaults to 'The date in this field must be before {maxValue}').
	 * @return string
	 */
	public function getMaxText() {
		return $this->getExtConfigProperty("maxText");
	}
	
	// MaxValue
	/**
	 * The maximum allowed date. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @param string|PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setMaxValue($value) {
		$this->setExtConfigProperty("maxValue", $value);
		return $this;
	}	
	/**
	 * The maximum allowed date. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getMaxValue() {
		return $this->getExtConfigProperty("maxValue");
	}
	
	// MinText
	/**
	 * The error text to display when the date in the cell is before minValue (defaults to 'The date in this field must be after {minValue}').
	 * @param string $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setMinText($value) {
		$this->setExtConfigProperty("minText", $value);
		return $this;
	}	
	/**
	 * The error text to display when the date in the cell is before minValue (defaults to 'The date in this field must be after {minValue}').
	 * @return string
	 */
	public function getMinText() {
		return $this->getExtConfigProperty("minText");
	}
	
	// MinValue
	/**
	 * The minimum allowed date. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @param string|PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setMinValue($value) {
		$this->setExtConfigProperty("minValue", $value);
		return $this;
	}	
	/**
	 * The minimum allowed date. Can be either a Javascript date object or a string date in a valid format (defaults to null).
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getMinValue() {
		return $this->getExtConfigProperty("minValue");
	}
	
	// TriggerCssClass
	/**
	 * An additional CSS class used to style the trigger button. The trigger will always get the class 'x-form-trigger' and triggerClass will be appended if specified (defaults to 'x-form-date-trigger' which displays a calendar icon).
	 * @param string $value 
	 * @return PhpExt_Form_DateField
	 */
	public function setTriggerCssClass($value) {
		return parent::setTriggerCssClass($value);
	}	
	/**
	 * An additional CSS class used to style the trigger button. The trigger will always get the class 'x-form-trigger' and triggerClass will be appended if specified (defaults to 'x-form-date-trigger' which displays a calendar icon).
	 * @return string
	 */
	public function getTriggerCssClass() {
		return parent::getTriggerCssClass();
	}    
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.DateField", "datefield");

		$validProps = array(
		    "altFormats",
		    "autoCreate",
		    "disabledDates",
		    "disabledDatesText",
		    "disabledDays",
		    "disabledDaysText",
		    "format",
		    "invalidText",
		    "maxText",
		    "maxValue",
		    "minText",
		    "minValue",
		    "triggerClass"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
    /**
	 * Helper function to create a DateField.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @return PhpExt_Form_DateField
	 */
	public static function createDateField($name, $label = null, $id = null) {
	    $c = new PhpExt_Form_DateField();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}
}


