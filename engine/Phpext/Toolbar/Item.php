<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ex JS: http://extjs.com
 * 
 */

/**
 * @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';
/**
 * @see PhpExt_Toolbar_IToolbarItem
 */
include_once 'PhpExt/Toolbar/IToolbarItem.php';

/**
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_Item extends PhpExt_Object implements PhpExt_Toolbar_IToolbarItem  
{		
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Toolbar.Item", "tbitem");	
		
	}	
 		
}

