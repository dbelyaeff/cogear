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
 * Inherits the anchoring of Ext.layout.AnchorLayout and adds the ability for x/y positioning using the standard x and y component config options.
 * 
 * @see PhpExt_Layout_AbsoluteLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_AbsoluteLayout extends PhpExt_Layout_AnchorLayout  {

    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_ABSOLUTE;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_ABSOLUTE;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.AbsoluteLayout", null);
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_AbsoluteLayoutData");
	}
	
	
}

