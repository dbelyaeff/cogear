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
 * A combobox control with support for autocomplete, remote-loading, paging and many other features.
 * 
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_ComboBox extends PhpExt_Form_TriggerField 
{		
	const MODE_LOCAL = 'local';
	const MODE_REMOTE = 'remote';

	const TRIGGER_ACTION_QUERY = 'query';
	const TRIGGER_ACTION_ALL = 'all';

	const SHADOW_SIDES = 'sides';
	const SHADOW_FRAME = 'frame';
	const SHADOW_DROP = 'drop';

	
	// AllQuery
	/**
	 * The text query to send to the server to return all records for the list with no filtering (defaults to '')
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setAllQuery($value) {
		$this->setExtConfigProperty("allQuery", $value);
		return $this;
	}	
	/**
	 * The text query to send to the server to return all records for the list with no filtering (defaults to '')
	 * @return string
	 */
	public function getAllQuery() {
		return $this->getExtConfigProperty("allQuery");
	}
	
	// AutoCreate
	/**
	 * A DomHelper element spec, or true for a default element spec (defaults to: {tag: "input", type: "text", size: "24", autocomplete: "off"})
	 * @param PhpExt_Config_Config $value 
	 * @return PhpExt_Form_ComboBox
	 */
    public function setAutoCreate(PhpExt_Config_ConfigObject $value) {
		return parent::setAutoCreate($value);
	}	
	/**
	 * A DomHelper element spec, or true for a default element spec (defaults to: {tag: "input", type: "text", size: "24", autocomplete: "off"})
	 * @return PhpExt_Config_Config
	 */
	public function getAutoCreate() {
		return parent::getAutoCreate();
	}
	
	// DisplayField
	/**
	 * The underlying data field name to bind to this ComboBox (defaults to undefined if mode = {@ling PhpExt_Form_ComboBox::MODE_REMOTE} or 'text' if transforming a select)
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setDisplayField($value) {
		$this->setExtConfigProperty("displayField", $value);
		return $this;
	}	
	/**
	 * The underlying data field name to bind to this ComboBox (defaults to undefined if mode = {@ling PhpExt_Form_ComboBox::MODE_REMOTE} or 'text' if transforming a select)
	 * @return string
	 */
	public function getDisplayField() {
		return $this->getExtConfigProperty("displayField");
	}
	
	// Editable
	/**
	 * False to prevent the user from typing text directly into the field, just like a traditional select (defaults to true)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setEditable($value) {
		$this->setExtConfigProperty("editable", $value);
		return $this;
	}	
	/**
	 * False to prevent the user from typing text directly into the field, just like a traditional select (defaults to true) 
	 * @return boolean
	 */
	public function getEditable() {
		return $this->getExtConfigProperty("editable");
	}
	
	// ForceSelection
	/**
	 * True to restrict the selected value to one of the values in the list, false to allow the user to set arbitrary text into the field (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setForceSelection($value) {
		$this->setExtConfigProperty("forceSelection", $value);
		return $this;
	}	
	/**
	 * True to restrict the selected value to one of the values in the list, false to allow the user to set arbitrary text into the field (defaults to false)
	 * @return boolean
	 */
	public function getForceSelection() {
		return $this->getExtConfigProperty("forceSelection");
	}
	
	// HandleHeight
	/**
	 * The height in pixels of the dropdown list resize handle if resizable = true (defaults to 8)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setHandleHeight($value) {
		$this->setExtConfigProperty("handleHeight", $value);
		return $this;
	}	
	/**
	 * The height in pixels of the dropdown list resize handle if resizable = true (defaults to 8)
	 * @return integer
	 */
	public function getHandleHeight() {
		return $this->getExtConfigProperty("handleHeight");
	}
	
	// HiddenName
	/**
	 * If specified, a hidden form field with this name is dynamically generated to store the field's data value (defaults to the underlying DOM element's name). Required for the combo's value to automatically post during a form submission.
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setHiddenName($value) {
		$this->setExtConfigProperty("hiddenName", $value);
		return $this;
	}	
	/**
	 * If specified, a hidden form field with this name is dynamically generated to store the field's data value (defaults to the underlying DOM element's name). Required for the combo's value to automatically post during a form submission.
	 * @return string
	 */
	public function getHiddenName() {
		return $this->getExtConfigProperty("hiddenName");
	}
	
	// LazyInit
	/**
	 * True to not initialize the list for this combo until the field is focused. (defaults to true)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setLazyInit($value) {
		$this->setExtConfigProperty("lazyInit", $value);
		return $this;
	}	
	/**
	 * True to not initialize the list for this combo until the field is focused. (defaults to true)
	 * @return boolean
	 */
	public function getLazyInit() {
		return $this->getExtConfigProperty("lazyInit");
	}
	
	// LazyRender
	/**
	 * True to prevent the ComboBox from rendering until requested (should always be used when rendering into an Ext.Editor, defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setLazyRender($value) {
		$this->setExtConfigProperty("lazyRender", $value);
		return $this;
	}	
	/**
	 * True to prevent the ComboBox from rendering until requested (should always be used when rendering into an Ext.Editor, defaults to false)
	 * @return boolean
	 */
	public function getLazyRender() {
		return $this->getExtConfigProperty("lazyRender");
	}
	
	// ListAlign
	/**
	 * A valid anchor position value. See Ext.Element.alignTo for details on supported anchor positions (defaults to 'tl-bl')
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setListAlign($value) {
		$this->setExtConfigProperty("listAlign", $value);
		return $this;
	}	
	/**
	 * A valid anchor position value. See Ext.Element.alignTo for details on supported anchor positions (defaults to 'tl-bl')
	 * @return string
	 */
	public function getListAlign() {
		return $this->getExtConfigProperty("listAlign");
	}
	
	// ListCssClass
	/**
	 * CSS class to apply to the dropdown list element (defaults to '')
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setListCssClass($value) {
		$this->setExtConfigProperty("listClass", $value);
		return $this;
	}	
	/**
	 * CSS class to apply to the dropdown list element (defaults to '')
	 * @return string
	 */
	public function getListCssClass() {
		return $this->getExtConfigProperty("listClass");
	}
	
	// ListWidth
	/**
	 * The width in pixels of the dropdown list (defaults to the width of the ComboBox field)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setListWidth($value) {
		$this->setExtConfigProperty("listWidth", $value);
		return $this;
	}	
	/**
	 * The width in pixels of the dropdown list (defaults to the width of the ComboBox field)
	 * @return integer
	 */
	public function getListWidth() {
		return $this->getExtConfigProperty("listWidth");
	}
	
	// LoadingText
	/**
	 * The text to display in the dropdown list while data is loading. Only applies when mode = {@ling PhpExt_Form_ComboBox::MODE_REMOTE} (defaults to 'Loading...')
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setLoadingText($value) {
		$this->setExtConfigProperty("loadingText", $value);
		return $this;
	}	
	/**
	 * The text to display in the dropdown list while data is loading. Only applies when mode = {@ling PhpExt_Form_ComboBox::MODE_REMOTE} (defaults to 'Loading...')
	 * @return string
	 */
	public function getLoadingText() {
		return $this->getExtConfigProperty("loadingText");
	}
	
	// MaxHeight
	/**
	 * The maximum height in pixels of the dropdown list before scrollbars are shown (defaults to 300)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setMaxHeight($value) {
		$this->setExtConfigProperty("maxHeight", $value);
		return $this;
	}	
	/**
	 * The maximum height in pixels of the dropdown list before scrollbars are shown (defaults to 300)
	 * @return integer
	 */
	public function getMaxHeight() {
		return $this->getExtConfigProperty("maxHeight");
	}
	
	// MinChars
	/**
	 * The minimum number of characters the user must type before autocomplete and typeahead activate (defaults to 4 if remote or 0 if local, does not apply if editable = false)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setMinChars($value) {
		$this->setExtConfigProperty("minChars", $value);
		return $this;
	}	
	/**
	 * The minimum number of characters the user must type before autocomplete and typeahead activate (defaults to 4 if remote or 0 if local, does not apply if editable = false)
	 * @return integer
	 */
	public function getMinChars() {
		return $this->getExtConfigProperty("minChars");
	}
	
	// MinListWidth
	/**
	 * The minimum width of the dropdown list in pixels (defaults to 70, will be ignored if listWidth has a higher value)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setMinListWidth($value) {
		$this->setExtConfigProperty("minListWidth", $value);
		return $this;
	}	
	/**
	 * The minimum width of the dropdown list in pixels (defaults to 70, will be ignored if listWidth has a higher value)
	 * @return integer
	 */
	public function getMinListWidth() {
		return $this->getExtConfigProperty("minListWidth");
	}
	
	// Mode
	/**
	 * Set to {@link PhpExt_Form_ComboBox::MODE_LOCAL} if the ComboBox loads local data (defaults to {@link PhpExt_Form_ComboBox::MODE_REMOTE} which loads from the server)
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setMode($value) {
		$this->setExtConfigProperty("mode", $value);
		return $this;
	}	
	/**
	 * Set to {@link PhpExt_Form_ComboBox::MODE_LOCAL} if the ComboBox loads local data (defaults to {@link PhpExt_Form_ComboBox::MODE_REMOTE} which loads from the server)
	 * @return string
	 */
	public function getMode() {
		return $this->getExtConfigProperty("mode");
	}
	
	// PageSize
	/**
	 * If greater than 0, a paging toolbar is displayed in the footer of the dropdown list and the filter queries will execute with page start and limit parameters. Only applies when mode = {@link PhpExt_Form_ComboBox::MODE_REMOTE} (defaults to 0)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setPageSize($value) {
		$this->setExtConfigProperty("pageSize", $value);
		return $this;
	}	
	/**
	 * If greater than 0, a paging toolbar is displayed in the footer of the dropdown list and the filter queries will execute with page start and limit parameters. Only applies when mode = {@link PhpExt_Form_ComboBox::MODE_REMOTE} (defaults to 0)
	 * @return integer
	 */
	public function getPageSize() {
		return $this->getExtConfigProperty("pageSize");
	}
	
	// QueryDelay
	/**
	 * The length of time in milliseconds to delay between the start of typing and sending the query to filter the dropdown list (defaults to 500 if mode = {@link PhpExt_Form_ComboBox::MODE_REMOTE} or 10 if mode = {@link PhpExt_Form_ComboBox::MODE_LOCAL})
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setQueryDelay($value) {
		$this->setExtConfigProperty("queryDelay", $value);
		return $this;
	}	
	/**
	 * The length of time in milliseconds to delay between the start of typing and sending the query to filter the dropdown list (defaults to 500 if mode = {@link PhpExt_Form_ComboBox::MODE_REMOTE} or 10 if mode = {@link PhpExt_Form_ComboBox::MODE_LOCAL})
	 * @return integer
	 */
	public function getQueryDelay() {
		return $this->getExtConfigProperty("queryDelay");
	}
	
	// QueryParam
	/**
	 * Name of the query as it will be passed on the querystring (defaults to 'query')
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setQueryParam($value) {
		$this->setExtConfigProperty("queryParam", $value);
		return $this;
	}	
	/**
	 * Name of the query as it will be passed on the querystring (defaults to 'query')
	 * @return string
	 */
	public function getQueryParam() {
		return $this->getExtConfigProperty("queryParam");
	}
	
	// Resizable
	/**
	 * True to add a resize handle to the bottom of the dropdown list (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setResizable($value) {
		$this->setExtConfigProperty("resizable", $value);
		return $this;
	}	
	/**
	 * True to add a resize handle to the bottom of the dropdown list (defaults to false)
	 * @return boolean
	 */
	public function getResizable() {
		return $this->getExtConfigProperty("resizable");
	}
	
	// SelectOnFocus
	/**
	 * True to select any existing text in the field immediately on focus. Only applies when editable = true (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setSelectOnFocus($value) {
		$this->setExtConfigProperty("selectOnFocus", $value);
		return $this;
	}	
	/**
	 * True to select any existing text in the field immediately on focus. Only applies when editable = true (defaults to false)
	 * @return boolean
	 */
	public function getSelectOnFocus() {
		return $this->getExtConfigProperty("selectOnFocus");
	}
	
	// SelectedCssClass
	/**
	 * CSS class to apply to the selected item in the dropdown list (defaults to 'x-combo-selected')
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setSelectedCssClass($value) {
		$this->setExtConfigProperty("selectedClass", $value);
		return $this;
	}	
	/**
	 * CSS class to apply to the selected item in the dropdown list (defaults to 'x-combo-selected')
	 * @return string
	 */
	public function getSelectedCssClass() {
		return $this->getExtConfigProperty("selectedClass");
	}
	
	// Shadow
	/**
	 * True or {@link PhpExt_Shadow::MODE_SIDES} for the default effect, {@link PhpExt_Shadow::MODE_FRAME} for 4-way shadow, and {@link PhpExt_Shadow::MODE_DROP} for bottom-right
	 * @uses PhpExt_Shadow::MODE_SIDES
	 * @uses PhpExt_Shadow::MODE_FRAME
	 * @uses PhpExt_Shadow::MODE_DROP
	 * @param boolean|string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setShadow($value) {
		$this->setExtConfigProperty("shadow", $value);
		return $this;
	}	
	/**
	 * True or {@link PhpExt_Shadow::MODE_SIDES} for the default effect, {@link PhpExt_Shadow::MODE_FRAME} for 4-way shadow, and {@link PhpExt_Shadow::MODE_DROP} for bottom-right
	 * @uses PhpExt_Shadow::MODE_SIDES
	 * @uses PhpExt_Shadow::MODE_FRAME
	 * @uses PhpExt_Shadow::MODE_DROP
	 * @return boolean|string
	 */
	public function getShadow() {
		return $this->getExtConfigProperty("shadow");
	}
	
	// Store
	/**
	 * The data store to which this combo is bound (defaults to undefined)
	 * @param PhpExt_Data_Store $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setStore(PhpExt_Data_Store $value) {
		$this->setExtConfigProperty("store", $value);
		return $this;
	}	
	/**
	 * The data store to which this combo is bound (defaults to undefined)
	 * @return PhpExt_Data_Store
	 */
	public function getStore() {
		return $this->getExtConfigProperty("store");
	}
	
	// Title
	/**
	 * If supplied, a header element is created containing this text and added into the top of the dropdown list (defaults to undefined, with no header element)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTitle($value) {
		$this->setExtConfigProperty("title", $value);
		return $this;
	}	
	/**
	 * If supplied, a header element is created containing this text and added into the top of the dropdown list (defaults to undefined, with no header element)
	 * @return boolean
	 */
	public function getTitle() {
		return $this->getExtConfigProperty("title");
	}
	
	// Template
	/**
	 * The template string, or {@link PhpExt_XTemplate} instance to use to display each item in the dropdown list. Use this to create custom UI layouts for items in the list.
	 * <p>If you wish to preserve the default visual look of list items, add the CSS class name: 'x-combo-list-item' to the template's container element.</p>
	 * <p><em>The template must contain one or more substitution parameters using field names from the Combo's Store.</em> An example of a custom template would be adding an 
     * ext:qtip attribute which might display other fields from the Store.</p>
     * <p>The dropdown list is displayed in a {@link PhpExt_DataView}. See {@link PhpExt_DataView} for details.</p>
     * @uses PhpExt_XTemplate 
	 * @param PhpExt_XTemplate|string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTemplate($value) {
		$this->setExtConfigProperty("tpl", $value);
		return $this;
	}	
	/**
	 * The template string, or {@link PhpExt_XTemplate} instance to use to display each item in the dropdown list. Use this to create custom UI layouts for items in the list.
	 * <p>If you wish to preserve the default visual look of list items, add the CSS class name: 'x-combo-list-item' to the template's container element.</p>
	 * <p><em>The template must contain one or more substitution parameters using field names from the Combo's Store.</em> An example of a custom template would be adding an 
     * ext:qtip attribute which might display other fields from the Store.</p>
     * <p>The dropdown list is displayed in a {@link PhpExt_DataView}. See {@link PhpExt_DataView} for details.</p>
     * @uses PhpExt_XTemplate 
	 * @return PhpExt_XTemplate|string
	 */
	public function getTemplate() {
		return $this->getExtConfigProperty("tpl");
	}
	
	// Transform
	/**
	 * The id, DOM node or element of an existing select to convert to a ComboBox
	 * @param string|PhpExt_JavascriptStm $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTransform($value) {
		$this->setExtConfigProperty("transform", $value);
		return $this;
	}	
	/**
	 * The id, DOM node or element of an existing select to convert to a ComboBox
	 * @return string|PhpExt_JavascriptStm
	 */
	public function getTransform() {
		return $this->getExtConfigProperty("transform");
	}
	
	// TriggerAction
	/**
	 * The action to execute when the trigger field is activated. Use {@link PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL} to run the query specified by the allQuery config option (defaults to {@link PhpExt_Form_ComboBox::TRIGGER_ACTION_QUERY})
	 * @uses PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL
	 * @uses PhpExt_Form_ComboBox::TRIGGER_ACTION_ALL
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTriggerAction($value) {
		$this->setExtConfigProperty("triggerAction", $value);
		return $this;
	}	
	/**
	 * 
	 * @return string
	 */
	public function getTriggerAction() {
		return $this->getExtConfigProperty("triggerAction");
	}
	
	// TriggerCssClass
	/**
	 * An additional CSS class used to style the trigger button. The trigger will always get the class 'x-form-trigger' and triggerClass will be <em>appended</em> if specified (defaults to 'x-form-arrow-trigger' which displays a downward arrow icon).
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTriggerCssClass($value) {
		$this->setExtConfigProperty("triggerClass", $value);
		return $this;
	}	
	/**
	 * An additional CSS class used to style the trigger button. The trigger will always get the class 'x-form-trigger' and triggerClass will be <em>appended</em> if specified (defaults to 'x-form-arrow-trigger' which displays a downward arrow icon). 
	 * @return string
	 */
	public function getTriggerCssClass() {
		return $this->getExtConfigProperty("triggerClass");
	}
	
	// TypeAhead
	/**
	 * True to populate and autoselect the remainder of the text being typed after a configurable delay (typeAheadDelay) if it matches a known value (defaults to false)
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTypeAhead($value) {
		$this->setExtConfigProperty("typeAhead", $value);
		return $this;
	}	
	/**
	 * True to populate and autoselect the remainder of the text being typed after a configurable delay (typeAheadDelay) if it matches a known value (defaults to false)
	 * @return boolean
	 */
	public function getTypeAhead() {
		return $this->getExtConfigProperty("typeAhead");
	}
	
	// TypeAheadDelay
	/**
	 * The length of time in milliseconds to wait until the typeahead text is displayed if typeAhead = true (defaults to 250)
	 * @param integer $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setTypeAheadDelay($value) {
		$this->setExtConfigProperty("typeAheadDelay", $value);
		return $this;
	}	
	/**
	 * The length of time in milliseconds to wait until the typeahead text is displayed if typeAhead = true (defaults to 250)
	 * @return integer
	 */
	public function getTypeAheadDelay() {
		return $this->getExtConfigProperty("typeAheadDelay");
	}
	
	// ValueField
	/**
	 * The underlying data value name to bind to this ComboBox (defaults to undefined if mode = {@link PhpExt_Form_ComboBox::MODE_REMOTE} or 'value' if transforming a select) Note: use of a valueField requires the user to make a selection in order for a value to be mapped.
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setValueField($value) {
		$this->setExtConfigProperty("valueField", $value);
		return $this;
	}	
	/**
	 * The underlying data value name to bind to this ComboBox (defaults to undefined if mode = {@link PhpExt_Form_ComboBox::MODE_REMOTE} or 'value' if transforming a select) Note: use of a valueField requires the user to make a selection in order for a value to be mapped.
	 * @return string
	 */
	public function getValueField() {
		return $this->getExtConfigProperty("valueField");
	}
	
	// ValueNotFoundText
	/**
	 * When using a name/value combo, if the value passed to setValue is not found in the store, valueNotFoundText will be displayed as the field text if defined (defaults to undefined)
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setValueNotFoundText($value) {
		$this->setExtConfigProperty("valueNotFoundText", $value);
		return $this;
	}	
	/**
	 * When using a name/value combo, if the value passed to setValue is not found in the store, valueNotFoundText will be displayed as the field text if defined (defaults to undefined)
	 * @return string
	 */
	public function getValueNotFoundText() {
		return $this->getExtConfigProperty("valueNotFoundText");
	}
		
	
	/**#@+
	 * Internal DataView Config Option:
	 * 
	 * The ComboBox uses a {@link PhpExt_DataView} to render the dropdown list.  
	 * DataView options may be included in the ComboBox Configuration for customization
	 * 
	 */	
	
	// ItemCssSelector
	/**
	 * A CSS selector in any format supported by Ext.DomQuery that will be used to determine what nodes this DataView will be working with.
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setItemCssSelector($value) {
		$this->setExtConfigProperty("itemSelector", $value);
		return $this;
	}	
	/**
	 * A CSS selector in any format supported by Ext.DomQuery that will be used to determine what nodes this DataView will be working with.
	 * @return string
	 */
	public function getItemCssSelector() {
		return $this->getExtConfigProperty("itemSelector");
	}
	
	// MultiSelect
	/**
	 * True to allow selection of more than one item at a time, false to allow selection of only a single item at a time or no selection at all, depending on the value of singleSelect (defaults to false).
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setMultiSelect($value) {
		$this->setExtConfigProperty("multiSelect", $value);
		return $this;
	}	
	/**
	 * True to allow selection of more than one item at a time, false to allow selection of only a single item at a time or no selection at all, depending on the value of singleSelect (defaults to false).
	 * @return boolean
	 */
	public function getMultiSelect() {
		return $this->getExtConfigProperty("multiSelect");
	}
	
	// OverCssClass
	/**
	 * A CSS class to apply to each item in the view on mouseover (defaults to undefined).
	 * @param string $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setOverCssClass($value) {
		$this->setExtConfigProperty("overClass", $value);
		return $this;
	}	
	/**
	 * A CSS class to apply to each item in the view on mouseover (defaults to undefined).
	 * @return string
	 */
	public function getOverCssClass() {
		return $this->getExtConfigProperty("overClass");
	}
	
	// SimpleSelect
	/**
	 * True to enable multiselection by clicking on multiple items without requiring the user to hold Shift or Ctrl, false to force the user to hold Ctrl or Shift to select more than on item (defaults to false).
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setSimpleSelect($value) {
		$this->setExtConfigProperty("simpleSelect", $value);
		return $this;
	}	
	/**
	 * True to enable multiselection by clicking on multiple items without requiring the user to hold Shift or Ctrl, false to force the user to hold Ctrl or Shift to select more than on item (defaults to false).
	 * @return boolean
	 */
	public function getSimpleSelect() {
		return $this->getExtConfigProperty("simpleSelect");
	}
	
	// SingleSelect
	/**
	 * True to allow selection of exactly one item at a time, false to allow no selection at all (defaults to false). Note that if multiSelect = true, this value will be ignored.
	 * @param boolean $value 
	 * @return PhpExt_Form_ComboBox
	 */
	public function setSingleSelect($value) {
		$this->setExtConfigProperty("singleSelect", $value);
		return $this;
	}	
	/**
	 * True to allow selection of exactly one item at a time, false to allow no selection at all (defaults to false). Note that if multiSelect = true, this value will be ignored.
	 * @return boolean
	 */
	public function getSingleSelect() {
		return $this->getExtConfigProperty("singleSelect");
	}
	/**#@-*/
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.ComboBox", "combo");
		
		$validProps = array(
		    "allQuery",
		    "autoCreate",
		    "displayField",
		    "editable",
		    "forceSelection",
		    "handleHeight",
		    "hiddenName",
		    "lazyInit",
		    "lazyRender",
		    "listAlign",
		    "listClass",
		    "listWidth",
		    "loadingText",
		    "maxHeight",
		    "minChars",
		    "minListWidth",
		    "mode",
		    "pageSize",
		    "queryDelay",
		    "queryParam",
		    "resizable",
		    "selectOnFocus",
		    "selectedClass",
		    "shadow",
		    "store",
		    "title",
		    "tpl",
		    "transform",
		    "triggerAction",
		    "triggerClass",
		    "typeAhead",
		    "typeAheadDelay",
		    "valueField",
		    "valueNotFoundText",
		    // DataView props
            "itemSelector",
            "multiSelect",
            "overClass",
            "simpleSelect",
            "singleSelect"
		);
		$this->addValidConfigProperties($validProps);		
	}		
 	
    /**
	 * Helper function to create a ComboBox.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $labelThe label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @param string $hiddenName If specified, a hidden form field with this name is dynamically generated to store the field's data value (defaults to the underlying DOM element's name). Required for the combo's value to automatically post during a form submission.
	 * @return PhpExt_Form_ComboBox
	 */
	public static function createComboBox($name, $label = null, $id = null, $hiddenName = null) {
	    $c = new PhpExt_Form_ComboBox();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
	    if ($hiddenName !== null)
	      $c->setHiddenName($hiddenName);
	    return $c;
	}
	
}

