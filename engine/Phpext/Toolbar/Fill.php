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
 * @see PhpExt_Toolbar_Spacer
 */
include_once 'PhpExt/Toolbar/Spacer.php';

/**
 * A simple element that adds a greedy (100% width) horizontal space to a toolbar.
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_Fill extends PhpExt_Toolbar_Spacer  
{		
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Toolbar.Fill", "tbfill");		
	}	

	public function getJavascript($lazy = false, $varName = null) {							
		if ($lazy)
			return "'->'";
		else {
			return parent::getJavascript($lazy, $varName);
		}
	}
}

