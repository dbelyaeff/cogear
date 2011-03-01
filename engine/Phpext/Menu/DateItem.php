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
 * @see PhpExt_Menu_Adapter
 */
include_once 'PhpExt/Menu/Adapter.php';

/**
 * A menu item that wraps the Ext.DatPicker component.
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_DateItem extends PhpExt_Menu_Adapter   
{	
    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.ColorItem",null);
		
	}
 		
}

