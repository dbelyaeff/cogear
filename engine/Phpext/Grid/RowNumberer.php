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
 * @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';

/**
 * @see PhpExt_Grid_IColumn
 */
include_once 'PhpExt/Grid/IColumn.php';

/**
 * This is a utility class that can be passed into a {@link PhpExt_Grid_ColumnModel} as a column config that provides an automatic row numbering column.
 * Usually it is used as the first column added to the collection 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_RowNumberer extends PhpExt_Object implements PhpExt_Grid_IColumn
{
    
	public function __construct() {
		parent::__construct();
	    $this->setExtClassInfo("Ext.grid.RowNumberer", null);				
	}	
	
    public function getJavascript($lazy = false, $varName = null) {
		return PhpExt_Object::getJavascript(false, $varName);
	}
}

