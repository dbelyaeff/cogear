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
 * @see PhpExt_Ext
 */
include_once 'PhpExt/Ext.php';
/**
 * @see PhpExt_Grid_ColumnConfigObject
 */
include_once 'PhpExt/Grid/ColumnConfigObject.php';

/**
 * @package PhpExtUx
 * @subpackage Grid
 */
class PhpExtUx_Grid_CheckColumn extends PhpExt_Grid_ColumnConfigObject  
{    
	public function __construct($header) {
		parent::__construct($header);
		$this->setExtClassInfo("Ext.grid.CheckColumn", null);
	}	
	
    public function getJavascript($lazy = false, $varName = null) {
		return PhpExt_Object::getJavascript(false, $varName);
	}

	
}

?>