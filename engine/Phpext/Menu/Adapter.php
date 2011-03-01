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
 * @see PhpExt_Menu_BaseItem
 */
include_once 'PhpExt/Menu/BaseItem.php';

/**
 * A base utility class that adapts a non-menu component so that it can be wrapped by a menu item and added to a menu. It provides basic rendering, activation management and enable/disable logic required to work in menus.
 * 
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_Adapter extends PhpExt_Menu_BaseItem  
{	    
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.Adapter",null);		
		
	}
 		
}

