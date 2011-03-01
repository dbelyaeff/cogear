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
 * @see PhpExt_Toolbar_Item
 */
include_once 'PhpExt/Toolbar/Item.php';

/**
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_Separator extends PhpExt_Toolbar_Item    
{		
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Toolbar.Separator", "tbseparator");		
	}	
	
	public function getJavascript($lazy = false, $varName = null) {					
		$className = $this->_extClassName;		
		$configObj = "";
		
		if ($lazy)
			return "'-'";
		else {
			$js = "new $className($configObj)";
			if ($varName != null) {
				$this->VarName = $varName;
				$js = "var $varName = $js;";
			}		
			return $js;
		}
	}
 		
}

