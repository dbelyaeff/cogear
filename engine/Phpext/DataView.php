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
 * A mechanism for displaying data using custom layout templates and formatting. 
 * DataView uses an {@link PhpExt_XTemplate} as its internal templating mechanisma, and is bound to an {@link PhpExt_Data_Store} so that as the data in the store changes the view is automatically updated to reflect the changes. 
 * The view also provides built-in behavior for many common events that can occur for its contained items including click, doubleclick, mouseover, mouseout, etc. as well as a built-in selection model. 
 * <b>In order to use these features, an itemSelector config must be provided for the DataView to determine what nodes it will be working with.</b>
 * 
 * @package PhpExt
 */
class PhpExt_DataView extends PhpExt_BoxComponent 
{
    // EmptyText
    /**
     * The text to display in the view when there is no data to display (defaults to '').
     * @param string $value
     * @return PhpExt_DataView
     */
    public function setEmptyText($value) {
    	$this->setExtConfigProperty("emptyText", $value);
    	return $this;
    }	
    /**
     * The text to display in the view when there is no data to display (defaults to '').
     * @return string
     */
    public function getEmptyText() {
    	return $this->getExtConfigProperty("emptyText");
    }
    
    // ItemCssSelector
    /**
     * <b>This is a required setting.</b> A CSS selector in any format supported by Ext.DomQuery that will be used to determine what nodes this DataView will be working with.
     * @param string $value
     * @return PhpExt_DataView
     */
    public function setItemCssSelector($value) {
    	$this->setExtConfigProperty("itemSelector", $value);
    	return $this;
    }	
    /**
     * <b>This is a required setting.</b> A CSS selector in any format supported by Ext.DomQuery that will be used to determine what nodes this DataView will be working with.
     * @return string
     */
    public function getItemCssSelector() {
    	return $this->getExtConfigProperty("itemSelector");
    }
    
    // LoadingText
    /**
     * A string to display during data load operations (defaults to undefined). If specified, this text will be displayed in a loading div and the view's contents will be cleared while loading, otherwise the view's contents will continue to display normally until the new data is loaded and the contents are replaced.
     * @param string $value
     * @return PhpExt_DataView
     */
    public function setLoadingText($value) {
    	$this->setExtConfigProperty("loadingText", $value);
    	return $this;
    }	
    /**
     * A string to display during data load operations (defaults to undefined). If specified, this text will be displayed in a loading div and the view's contents will be cleared while loading, otherwise the view's contents will continue to display normally until the new data is loaded and the contents are replaced.
     * @return string
     */
    public function getLoadingText() {
    	return $this->getExtConfigProperty("loadingText");
    }
    
    // MultiSelect
    /**
     * True to allow selection of more than one item at a time, false to allow selection of only a single item at a time or no selection at all, depending on the value of singleSelect (defaults to false).
     * @param boolean $value
     * @return PhpExt_DataView
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
     * @return PhpExt_DataView
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
    
	// SelectedCssClass
	/**
	 * A CSS class to apply to each selected item in the view (defaults to 'x-view-selected').
	 * @param string $value
	 * @return PhpExt_DataView
	 */
	public function setSelectedCssClass($value) {
		$this->setExtConfigProperty("selectedClass", $value);
		return $this;
	}	
	/**
	 * A CSS class to apply to each selected item in the view (defaults to 'x-view-selected').
	 * @return string
	 */
	public function getSelectedCssClass() {
		return $this->getExtConfigProperty("selectedClass");
	}
	
	// SimpleSelect
	/**
	 * True to enable multiselection by clicking on multiple items without requiring the user to hold Shift or Ctrl, false to force the user to hold Ctrl or Shift to select more than on item (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_DataView
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
	 * True to allow selection of exactly one item at a time, false to allow no selection at all (defaults to false). Note that if multiSelect = true, this value will be ignored
	 * @param boolean $value
	 * @return PhpExt_DataView
	 */
	public function setSingleSelect($value) {
		$this->setExtConfigProperty("singleSelect", $value);
		return $this;
	}	
	/**
	 * True to allow selection of exactly one item at a time, false to allow no selection at all (defaults to false). Note that if multiSelect = true, this value will be ignored
	 * @return boolean
	 */
	public function getSingleSelect() {
		return $this->getExtConfigProperty("singleSelect");
	}

	// Store
	/**
	 * The PhpExt_Data_Store or any of its children to bind this DataView to.
	 * @param PhpExt_Data_Store $value Descendats of {@link PhpExt_Data_Store}
	 * @return PhpExt_DataView
	 */
	public function setStore(PhpExt_Data_Store $value) {
		$this->setExtConfigProperty("store", $value);
		return $this;
	}	
	/**
	 * The PhpExt_Data_Store or any of its children to bind this DataView to.
	 * @return PhpExt_Data_Store
	 */
	public function getStore() {
		return $this->getExtConfigProperty("store");
	}
	
	// Template
	/**
	 * The template used to render the DataView
	 * @param PhpExt_XTemplate $value
	 * @return PhpExt_DataView
	 */
	public function setTemplate(PhpExt_XTemplate $value) {
		$this->setExtConfigProperty("tpl", $value);
		return $this;
	}	
	/**
	 * The template used to render the DataView
	 * @return PhpExt_XTemplate
	 */
	public function getTemplate() {
		return $this->getExtConfigProperty("tpl");
	}	
	
	/**
	 * @param string $itemSelector A CSS selector in any format supported by Ext.DomQuery that will be used to determine what nodes this DataView will be working with.
	 */
	public function __construct($itemSelector) {
		parent::__construct();
		$this->setExtClassInfo("Ext.DataView","dataview");

		$validProps = array(
		    "emptyText",
		    "itemSelector",
		    "loadingText",
		    "multiSelect",
		    "overClass",
		    "selectedClass",
		    "simpleSelect",
		    "singleSelect",
		    "store",
		    "tpl"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setItemCssSelector($itemSelector);
	}
		
}

