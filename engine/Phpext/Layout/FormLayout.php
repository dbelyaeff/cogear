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
 *  @see PhpExt_Layout_AnchorLayout
 */
include_once 'PhpExt/Layout/AnchorLayout.php';

/**
 * This is a layout specifically designed for creating forms. However, when used in an application, it will usually be preferrable to use a {@link PhpExt_Form_FormPanel} (which automatically uses FormLayout as its layout class) since it also provides built-in functionality for loading, validating and submitting the form.
 *
 * Note that when creating a layout via config, the layout-specific config properties will be passed in via the Ext.Container.layoutConfig object which will then be applied internally to the layout. The container using the FormLayout can also supply the following form-specific config properties which will be applied by the layout:
 *
 *   - <b>hideLabels:</b> (Boolean) True to hide field labels by default (defaults to false)
 *   - <b>itemCls:</b> (String) A CSS class to add to the div wrapper that contains each field label and field element (the default class is 'x-form-item' and itemCls will be added to that)
 *   - <b>labelAlign:</b> (String) The default label alignment. The default value is empty string '' for left alignment, but specifying 'top' will align the labels above the fields.
 *   - <b>labelPad:</b> (Number) The default padding in pixels for field labels (defaults to 5). labelPad only applies if labelWidth is also specified, otherwise it will be ignored.
 *   - <b>labelWidth:</b> (Number) The default width in pixels of field labels (defaults to 100)
 *
 * Any type of components can be added to a FormLayout, but items that inherit from Ext.form.Field can also supply the following field-specific config properties:
 *
 *   - <b>clearCls:</b> (String) The CSS class to apply to the special clearing div rendered directly after each form field wrapper (defaults to 'x-form-clear-left')
 *   - <b>fieldLabel:</b> (String) The text to display as the label for this field (defaults to '')
 *   - <b>hideLabel:</b> (Boolean) True to hide the label and separator for this field (defaults to false).
 *   - <b>itemCls:</b> (String) A CSS class to add to the div wrapper that contains this field label and field element (the default class is 'x-form-item' and itemCls will be added to that). If supplied, itemCls at the field level will override the default itemCls supplied at the container level.
 *   - <b>labelSeparator:</b> (String) The separator to display after the text of the label for this field (defaults to a colon ':' or the layout's value for labelSeparator). To hide the separator use empty string ''.
 *   - <b>labelStyle:</b> (String) A CSS style specification string to add to the field label for this field (defaults to '' or the layout's value for labelStyle).
 * 
 * @see PhpExt_Layout_FormLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_FormLayout extends PhpExt_Layout_AnchorLayout  {
	
	// HideLabels
	/**
	 * True to hide field labels by default (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setHideLabels($value) {
		$this->setExtConfigProperty("hideLabels", $value);
		return $this;
	}	
	/**
	 * True to hide field labels by default (defaults to false)
	 * @return boolean
	 */
	public function getHideLabels() {
		return $this->getExtConfigProperty("hideLabels");
	}
	
	// ItemCssClass
	/**
	 * A CSS class to add to the div wrapper that contains each field label and field element (the default class is 'x-form-item' and itemCls will be added to that)
	 * @param string $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setItemCssClass($value) {
		$this->setExtConfigProperty("itemCls", $value);
		return $this;
	}	
	/**
	 * A CSS class to add to the div wrapper that contains each field label and field element (the default class is 'x-form-item' and itemCls will be added to that)
	 * @return string
	 */
	public function getItemCssClass() {
		return $this->getExtConfigProperty("itemCls");
	}
	
	// LabelAlign
	/**
	 * The default label alignment. The default value is empty string '' or {@link PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT} for left alignment, but specifying {@link PhpExt_Form_FormPanel::LABEL_ALIGN_TOP} will align the labels above the fields.
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_TOP
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_RIGHT
	 * @param string $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setLabelAlign($value) {
		$this->setExtConfigProperty("labelAlign", $value);
		return $this;
	}	
	/**
	 * The default label alignment. The default value is empty string '' or {@link PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT} for left alignment, but specifying {@link PhpExt_Form_FormPanel::LABEL_ALIGN_TOP} will align the labels above the fields.
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_TOP
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_RIGHT
	 * @return string
	 */
	public function getLabelAlign() {
		return $this->getExtConfigProperty("labelAlign");
	}
    
	// LabelPad
	/**
	 * The default padding in pixels for field labels (defaults to 5). labelPad only applies if labelWidth is also specified, otherwise it will be ignored.
	 * @param integer $value 
	 * @return PhpExt_Layout_FormLayot
	 */
	public function setLabelPad($value) {
		$this->setExtConfigProperty("labelPad", $value);
		return $this;
	}	
	/**
	 * The default padding in pixels for field labels (defaults to 5). labelPad only applies if labelWidth is also specified, otherwise it will be ignored.
	 * @return integer
	 */
	public function getLabelPad() {
		return $this->getExtConfigProperty("labelPad");
	}
	
	// LabelWidth
	/**
	 * The default width in pixels of field labels (defaults to 100)
	 * @param integer $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setLabelWidth($value) {
		$this->setExtConfigProperty("labelWidth", $value);
		return $this;
	}	
	/**
	 * The default width in pixels of field labels (defaults to 100)
	 * @return integer
	 */
	public function getLabelWidth() {
		return $this->getExtConfigProperty("labelWidth");
	}
    
	// ElementCssStyle
	/**
	 * A CSS style specification string to add to each field element in this layout (defaults to '').
	 * @param string $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setElementCssStyle($value) {
		$this->setExtConfigProperty("elementStyle", $value);
		return $this;
	}	
	/**
	 * A CSS style specification string to add to each field element in this layout (defaults to '').
	 * @return string
	 */
	public function getElementCssStyle() {
		return $this->getExtConfigProperty("elementStyle");
	}
	
	// LabelSeparator
	/**
	 * The standard separator to display after the text of each form label (defaults to a colon ':'). To turn off separators for all fields in this layout by default specify empty string '' (if the labelSeparator value is explicitly set at the field level, those will still be displayed).
	 * @param string $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setLabelSeparator($value) {
		$this->setExtConfigProperty("labelSeparator", $value);
		return $this;
	}	
	/**
	 * The standard separator to display after the text of each form label (defaults to a colon ':'). To turn off separators for all fields in this layout by default specify empty string '' (if the labelSeparator value is explicitly set at the field level, those will still be displayed).
	 * @return string
	 */
	public function getLabelSeparator() {
		return $this->getExtConfigProperty("labelSeparator");
	}
	
	// LabelCssStyle
	/**
	 * A CSS style specification string to add to each field label in this layout (defaults to '').
	 * @param boolean $value 
	 * @return PhpExt_Layout_FormLayout
	 */
	public function setLabelCssStyle($value) {
		$this->setExtConfigProperty("labelStyle", $value);
		return $this;
	}	
	/**
	 * A CSS style specification string to add to each field label in this layout (defaults to '').
	 * @return boolean
	 */
	public function getLabelCssStyle() {
		return $this->getExtConfigProperty("labelStyle");
	}
	
	/**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_FORM;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_FORM;
    }
	
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.FormLayout", null);	    	   

	    $validProps = array(
	        "hideLabels",
	        "itemCls",
	        "labelAlign",
	        "labelPad",
	        "labelWidth",
	        "elementStyle",
	        "labelSeparator",
	        "labelStyle"
	    );
	    $this->addValidConfigProperties($validProps);	    	    
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_FormLayoutData");
	}
	
	
}

