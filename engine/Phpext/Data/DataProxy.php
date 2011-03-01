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
 * @see PhpExt_Observable
 */
include_once 'PhpExt/Observable.php';

/**
 * This class is an abstract base class for implementations which provide retrieval of unformatted data objects.
 * 
 * DataProxy implementations are usually used in conjunction with an implementation of PhpExt_Data_DataReader (of the appropriate type which knows how to parse the data object) to provide a block of PhpExt_Data_Records to an PhpExt_Data_Store.
 * 
 * Custom implementations must implement the load method as described in PhpExt_Data_HttpProxy.load. 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_DataProxy extends PhpExt_Observable
{		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.DataProxy", null);	
	}	
	
}

