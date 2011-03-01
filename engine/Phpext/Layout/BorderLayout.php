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
 *  @see PhpExt_Layout_ContainerLayout
 */
include_once 'PhpExt/Layout/ContainerLayout.php';

/**
 * This is a multi-pane, application-oriented UI layout style that supports multiple nested panels, automatic split bars between regions and built-in expanding and collapsing of regions. 
 *
 * BorderLayout does not have any direct config options (other than inherited ones). All configs available for customizing the BorderLayout are at the Ext.layout.BorderLayout.Region and Ext.layout.BorderLayout.SplitRegion levels.
 * @see PhpExt_Layout_BorderLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_BorderLayout extends PhpExt_Layout_ContainerLayout  {
    
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_BORDER;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_BORDER;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.AnchorLayout", null);	    	   

	    $validLayoutProps = array(
	    );
	    $this->addValidLayoutProperties($validLayoutProps);
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_BorderLayoutData");
	}
	
	
}

