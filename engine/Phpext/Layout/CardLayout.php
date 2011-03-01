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
 * This layout contains multiple panels, each fit to the container, where only a single panel can be visible at any given time. This layout style is most commonly used for wizards, tab implementations, etc.
 * 
 * The CardLayout's focal method is setActiveItem. Since only one panel is displayed at a time, the only way to move from one panel to the next is by calling setActiveItem, passing the id or index of the next panel to display. The layout itself does not provide a mechanism for handling this navigation, so that functionality must be provided by the developer.
 * 
 * @see PhpExt_Layout_CardLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_CardLayout extends PhpExt_Layout_FitLayout  {
        
    // DeferredRender
    /**
     * True to render each contained item at the time it becomes active, false to render all contained items as soon as the layout is rendered (defaults to false). If there is a significant amount of content or a lot of heavy controls being rendered into panels that are not displayed by default, setting this to true might improve performance.
     * @param boolean $value 
     * @return PhpExt_Layout_CardLayout
     */
    public function setDeferredRender($value) {
    	$this->setExtConfigProperty("deferredRender", $value);
    	return $this;
    }	
    /**
     * 
     * @return boolean
     */
    public function getDeferredRender() {
    	return $this->getExtConfigProperty("deferredRender");
    }
    	
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_CARD;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_CARD;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.CardLayout", null);
	    
	    $validProps = array(
	        "deferredRender"	        
	    );
	    $this->addValidConfigProperties($validProps);
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_CardLayoutData");
	}
	
	
}

