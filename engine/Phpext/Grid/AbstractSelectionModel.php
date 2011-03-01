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
include_once'PhpExt/Observable.php';

/**
 * Abstract base class for grid SelectionModels. It provides the interface that should be implemented by descendant classes. This class should not be directly instantiated.
 * 
 * @package PhpExt
 * @subpackage Grid
 */
abstract class PhpExt_Grid_AbstractSelectionModel extends PhpExt_Observable  
{			
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.AbstractSelectionModel", null);
	
	}				
}



