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
 * @see PhpExt_Panel
 */
include_once 'PhpExt/Panel.php';
/**
 * @see PhpExt_Layout_FormLayout
 */
include_once 'PhpExt/Layout/FormLayout.php';

/**
 * Standard container used for grouping form fields.
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_FieldSet extends PhpExt_Panel 
{	
    // BaseCssClass
    /**
     * The base CSS class applied to the fieldset (defaults to 'x-fieldset').
     * @param string $value 
     * @return PhpExt_Form_FieldSet
     */
    public function setBaseCssClass($value) {
    	return parent::setBaseCssClass($value);
    }	
    /**
     * The base CSS class applied to the fieldset (defaults to 'x-fieldset').
     * @return string
     */
    public function getBaseCssClass() {
    	return parent::getBaseCssClass();
    }
    
    // CheckboxName
    /**
     * The name to assign to the fieldset's checkbox if checkboxToggle = true (defaults to '[checkbox id]-checkbox').
     * @param string $value 
     * @return PhpExt_Form_FieldSet
     */
    public function setCheckboxName($value) {
    	$this->setExtConfigProperty("checkboxName", $value);
    	return $this;
    }	
    /**
     * The name to assign to the fieldset's checkbox if checkboxToggle = true (defaults to '[checkbox id]-checkbox').
     * @return string
     */
    public function getCheckboxName() {
    	return $this->getExtConfigProperty("checkboxName");
    }
    
    // CheckboxToggle
    /**
     * True to render a checkbox into the fieldset frame just in front of the legend (defaults to false). The fieldset will be expanded or collapsed when the checkbox is toggled.
     * @param boolean $value 
     * @return PhpExt_Form_FieldSet
     */
    public function setCheckboxToggle($value) {
    	$this->setExtConfigProperty("checkboxToggle", $value);
    	return $this;
    }	
    /**
     * True to render a checkbox into the fieldset frame just in front of the legend (defaults to false). The fieldset will be expanded or collapsed when the checkbox is toggled.
     * @return boolean
     */
    public function getCheckboxToggle() {
    	return $this->getExtConfigProperty("checkboxToggle");
    }
    
    // ItemCssClass
    /**
     * A css class to apply to the x-form-item of fields. This property cascades to child containers.
     * @param string $value 
     * @return PhpExt_Form_FieldSet
     */
    public function setItemCssClass($value) {        
    	$this->setExtConfigProperty("itemCls", $value);
    	return $this;
    }	
    /**
     * A css class to apply to the x-form-item of fields. This property cascades to child containers.
     * @return string
     */
    public function getItemCssClass() {
    	return $this->getExtConfigProperty("itemCls");
    }
    
    // LabelWidth
    /**
     * The width of labels. This property cascades to child containers.
     * @param integer $value 
     * @return PhpExt_Form_FieldSet
     */
    public function setLabelWidth($value) {
    	$this->setExtConfigProperty("labelWidth", $value);
    	return $this;
    }	
    /**
     * The width of labels. This property cascades to child containers.
     * @return integer
     */
    public function getLabelWidth() {
    	return $this->getExtConfigProperty("labelWidth");
    }
    
    // Layout
    /**
     * The Ext.Container.layout to use inside the fieldset (defaults to {@link PhpExt_Layout_FormLayout}).
     * @param PhpExt_Layout_ContainerLayout  $value 
     * @return PhpExt_Form_FieldSet
     */
    public function setLayout(PhpExt_Layout_ContainerLayout $value) {
    	return parent::setLayout($value);
    }	
    /**
     * The Ext.Container.layout to use inside the fieldset (defaults to 'form').
     * @return PhpExt_Layout_ContainerLayout 
     */
    public function getLayout() {
    	return parent::getLayout();
    }
        	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.FieldSet","fieldset");
		
		$validProps = array(
		    "baseCls",
		    "checkboxName",
		    "checkboxToggle",
		    "itemCls",
		    "labelWidth",
		    "layout"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->_defaultLayout = new PhpExt_Layout_FormLayout();
		$this->setLayout($this->_defaultLayout);
	}

}

