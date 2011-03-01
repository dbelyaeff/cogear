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
 * @see PhpExt_Data_DataProxy
 */
include_once 'PhpExt/Data/DataProxy.php';

/**
 * An implementation of Ext.data.DataProxy that simply passes the data specified in its constructor to the Reader when its load method is called.
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_MemoryProxy extends PhpExt_Data_DataProxy  
{	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.MemoryProxy", null);	
	}	
	

 	
	
}

