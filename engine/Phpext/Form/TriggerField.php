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
 * @see PhpExt_TextField
 */
include_once 'PhpExt/Form/TextField.php';

/**
 * Provides a convenient wrapper for TextFields that adds a clickable trigger button (looks like a combobox by default). The trigger has no default action, so you must assign a function to implement the trigger click handler by overriding onTriggerClick. You can create a TriggerField directly, as it renders exactly like a combobox for which you can provide a custom implementation. For example:
 * <code>
 * var trigger = new Ext.form.TriggerField();
 * trigger.onTriggerClick = myTriggerFn;
 * trigger.applyToMarkup('my-field');
 * </code>
 * However, in general you will most likely want to use TriggerField as the base class for a reusable component. Ext.form.DateField and Ext.form.ComboBox are perfect examples of this.
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_TriggerField extends PhpExt_Form_TextField 
{
    // AutoCreate
	/**
	 * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "text", size: "16", autocomplete: "off"})
	 * @param PhpExt_Config_Config $value 
	 * @return PhpExt_Form_TriggerField
	 */
	public function setAutoCreate(PhpExt_Config_ConfigObject $value) {
		return parent::setAutoCreate($value);
	}	
	/**
	 * A DomHelper element spec, or true for a default element spec (defaults to {tag: "input", type: "text", size: "16", autocomplete: "off"})
	 * @return PhpExt_Config_Config
	 */
	public function getAutoCreate() {
		return parent::getAutoCreate();
	}
	
	// HideTrigger
	/**
	 * True to hide the trigger element and display only the base text field (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_TriggerField
	 */
	public function setHideTrigger($value) {
		$this->setExtConfigProperty("hideTrigger", $value);
		return $this;
	}	
	/**
	 * True to hide the trigger element and display only the base text field (defaults to false)
	 * @return boolean
	 */
	public function getHideTrigger() {
		return $this->getExtConfigProperty("hideTrigger");
	}
	
	// TriggerCssClass
	/**
	 * A CSS class to apply to the trigger
	 * @param string $value 
	 * @return PhpExt_Form_TriggerField
	 */
	public function setTriggerCssClass($value) {
		$this->setExtConfigProperty("triggerClass", $value);
		return $this;
	}	
	/**
	 * A CSS class to apply to the trigger
	 * @return string
	 */
	public function getTriggerCssClass() {
		return $this->getExtConfigProperty("triggerClass");
	} 
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.TriggerField","triggerfield");
		
		$validProps = array(
		    "autoCreate",
		    "hideTrigger",
		    "triggerClass"
		);
		$this->addValidConfigProperties($validProps);
		
	}		 

    /**
	 * Helper function to create a TriggerField.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).	 
	 * @return PhpExt_Form_TriggerField
	 */
	public static function createTriggerField($name, $label = null, $id = null) {
	    $c = new PhpExt_Form_TriggerField();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}
}

