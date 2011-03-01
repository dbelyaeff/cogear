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
 * @see PhpExt_Menu_Menu
 */
include_once 'PhpExt/Menu/Menu.php';


/**
 * A menu containing a Ext.menu.ColorItem component (which provides a basic color picker).
 * 
 * @package PhpExt
 * @subpackage Menu
 */
class PhpExt_Menu_ColorMenu extends PhpExt_Menu_Menu 
{	
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.menu.ColorMenu");
	
	}
		
}

