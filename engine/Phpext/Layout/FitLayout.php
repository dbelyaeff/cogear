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
 * This is a base class for layouts that contain a single item that automatically expands to fill the layout's container. 
 *
 * FitLayout does not have any direct config options (other than inherited ones). To fit a panel to a container using FitLayout, simply set layout:'fit' on the container and add a single panel to it. If the container has multiple panels, only the first one will be displayed.
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_FitLayout extends PhpExt_Layout_ContainerLayout  {
    
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_FIT;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_FIT;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.FitLayout", null);	    	   

	    $this->addValidLayoutDataClassName("PhpExt_Layout_FitLayoutData");
	}
	
	
}

