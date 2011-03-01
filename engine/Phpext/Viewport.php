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
 * @see PhpExt_Container
 */
include_once 'PhpExt/Container.php';

/**
 * A specialized container representing the viewable application area (the browser viewport).
 * 
 * The Viewport renders itself to the document body, and automatically sizes itself to the size of the browser viewport and manages window resizing. There may only be one Viewport created in a page. Inner layouts are available by virtue of the fact that all Panels added to the Viewport, either through its items, or through the items, or the add method of any of its child Panels may themselves have a layout.
 * 
 * The Viewport does not provide scrolling, so child Panels within the Viewport should provide for scrolling if needed using the autoScroll config.
 * 
 * @package PhpExt 
 */
class PhpExt_Viewport extends PhpExt_Container
{
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Viewport","viewport");
		
		$validProps = array(		    
		);
		$this->addValidConfigProperties($validProps);
	}	
		
}

