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
 * @see PhpExt_Tree_AbstractSelectionModel
 */
include_once'PhpExt/Tree/AbstractSelectionModel.php';

/**
 * The default single selection for a TreePanel.
 * 
 * @package PhpExt
 * @subpackage Tree
 */
class PhpExt_Tree_DefaultSelectionModel extends PhpExt_Tree_AbstractSelectionModel  
{			
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.tree.DefaultSelectionModel", null);	
	}				
}



