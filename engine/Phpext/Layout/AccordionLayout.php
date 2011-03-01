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
 *  @see PhpExt_Layout_FitLayout
 */
include_once 'PhpExt/Layout/FitLayout.php';

/**
 * This is a layout that contains multiple panels in an expandable accordion style such that only one panel can be open at any given time. Each panel has built-in support for expanding and collapsing.
 * 
 * Panels added to the items collection of the container will render in an accordion style.
 * 
 * @see PhpExt_Layout_AccordionLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_AccordionLayout extends PhpExt_Layout_FitLayout  {

	// ActiveOnTop
    /**
     * True to swap the position of each panel as it is expanded so that it becomes the first item in the container, false to keep the panels in the rendered order. This is NOT compatible with "animate:true" (defaults to false).
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setActiveOnTop($value) {
    	$this->setExtConfigProperty("activeOnTop", $value);
    	return $this;
    }	
    /**
     * True to swap the position of each panel as it is expanded so that it becomes the first item in the container, false to keep the panels in the rendered order. This is NOT compatible with "animate:true" (defaults to false).
     * @return boolean
     */
    public function getActiveOnTop() {
    	return $this->getExtConfigProperty("activeOnTop");
    }
    
	// Animate
    /**
     * True to slide the contained panels open and closed during expand/collapse using animation, false to open and close directly with no animation (defaults to false). Note: to defer to the specific config setting of each contained panel for this property, set this to undefined at the layout level.
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setAnimate($value) {
    	$this->setExtConfigProperty("animate", $value);
    	return $this;
    }	
    /**
     * True to slide the contained panels open and closed during expand/collapse using animation, false to open and close directly with no animation (defaults to false). Note: to defer to the specific config setting of each contained panel for this property, set this to undefined at the layout level.
     * @return boolean
     */
    public function getAnimate() {
    	return $this->getExtConfigProperty("animate");
    }
    
	// AutoWidth
    /**
     * True to set each contained item's width to 'auto', false to use the item's current width (defaults to true).
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setAutoWidth($value) {
    	$this->setExtConfigProperty("autoWidth", $value);
    	return $this;
    }	
    /**
     * True to set each contained item's width to 'auto', false to use the item's current width (defaults to true).
     * @return boolean
     */
    public function getAutoWidth() {
    	return $this->getExtConfigProperty("autoWidth");
    }
	

	// CollapseFirst
    /**
     * True to make sure the collapse/expand toggle button always renders first (to the left of) any other tools in the contained panels' title bars, false to render it last (defaults to false).
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setCollapseFirst($value) {
    	$this->setExtConfigProperty("collapseFirst", $value);
    	return $this;
    }	
    /**
     * True to make sure the collapse/expand toggle button always renders first (to the left of) any other tools in the contained panels' title bars, false to render it last (defaults to false).
     * @return boolean
     */
    public function getCollapseFirst() {
    	return $this->getExtConfigProperty("collapseFirst");
    }

	// Fill
    /**
     * True to adjust the active item's height to fill the available space in the container, false to use the item's current height, or auto height if not explicitly set (defaults to true).
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setFill($value) {
    	$this->setExtConfigProperty("fill", $value);
    	return $this;
    }	
    /**
     * True to adjust the active item's height to fill the available space in the container, false to use the item's current height, or auto height if not explicitly set (defaults to true).
     * @return boolean
     */
    public function getFill() {
    	return $this->getExtConfigProperty("fill");
    }

	// HideCollapseTool
    /**
     * True to hide the contained panels' collapse/expand toggle buttons, false to display them (defaults to false). When set to true, titleCollapse should be true also.
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setHideCollapseTool($value) {
    	$this->setExtConfigProperty("hideCollapseTool", $value);
    	return $this;
    }	
    /**
     * True to hide the contained panels' collapse/expand toggle buttons, false to display them (defaults to false). When set to true, titleCollapse should be true also.
     * @return boolean
     */
    public function getHideCollapseTool() {
    	return $this->getExtConfigProperty("hideCollapseTool");
    }

	// Sequence
    /**
     * <b>Experimental.</b> If animate is set to true, this will result in each animation running in sequence.
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setSequence($value) {
    	$this->setExtConfigProperty("sequence", $value);
    	return $this;
    }	
    /**
     * <b>Experimental.</b> If animate is set to true, this will result in each animation running in sequence.
     * @return boolean
     */
    public function getSequence() {
    	return $this->getExtConfigProperty("sequence");
    }

	// TitleCollapse
    /**
     * True to allow expand/collapse of each contained panel by clicking anywhere on the title bar, false to allow expand/collapse only when the toggle tool button is clicked (defaults to true). When set to false, hideCollapseTool should be false also.
     * @param boolean $value 
     * @return PhpExt_Layout_AccordionLayout
     */
    public function setTitleCollapse($value) {
    	$this->setExtConfigProperty("titleCollapse", $value);
    	return $this;
    }	
    /**
     * True to allow expand/collapse of each contained panel by clicking anywhere on the title bar, false to allow expand/collapse only when the toggle tool button is clicked (defaults to true). When set to false, hideCollapseTool should be false also.
     * @return boolean
     */
    public function getTitleCollapse() {
    	return $this->getExtConfigProperty("titleCollapse");
    }
	
    
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_ACCORDION;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_ACCORDION;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.Accordion", null);
	    
	    $validLayoutProps = array(
	        "activeOnTop",
	        "animate",
	        "autoWidth",
	        "collapseFirst",
	        "fill",
	        "hideCollapseTool",
	        "sequence",
	        "titleCollapse"
	    );
	    $this->addValidConfigProperties($validLayoutProps);
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_AccordionLayoutData");
	}
	
	
}

