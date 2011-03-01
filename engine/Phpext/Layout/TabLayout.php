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
 *  @see PhpExt_Layout_CardLayout
 */
include_once 'PhpExt/Layout/CardLayout.php';

/**
 * This layout contains multiple panels, each fit to the container, where only a single panel can be visible at any given time. This layout style is most commonly used for wizards, tab implementations, etc.
 * 
 * The CardLayout's focal method is setActiveItem. Since only one panel is displayed at a time, the only way to move from one panel to the next is by calling setActiveItem, passing the id or index of the next panel to display. The layout itself does not provide a mechanism for handling this navigation, so that functionality must be provided by the developer.
 * 
 * @see PhpExt_Layout_CardLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_TabLayout extends PhpExt_Layout_CardLayout  {
        
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_TAB;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_TAB;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.CardLayout", null);
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_TabLayoutData");
	    

	}
	
	
}

