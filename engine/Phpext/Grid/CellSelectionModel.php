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
 * @see PhpExt_Grid_AbstractSelectionModel
 */
include_once'PhpExt/Grid/AbstractSelectionModel.php';

/**
 * This class provides the basic implementation for single cell selection in a grid. The object stored as the selection and returned by getSelectedCell contains the following properties:
 * <dl>
 *   <dt><b>record</b> : Ext.data.record</dt>
 *   	<dd>The Record which provides the data for the row containing the selection</dd>
 *   <dt><b>cell</b> : Ext.data.record</dt>
 *   	<dd>An object containing the following properties:
 * 			<dl>
 *         		<dt><b>rowIndex</b> : Number</dt>
 *					<dd>The index of the selected row</dd>
 *        		<dt><b>cellIndex</b> : Number</dt>
 *					<dd>The index of the selected cell<br>
 * 			            <b>Note that due to possible column reordering, the cellIndex should not be used as an index into the Record's data. Instead, the name of the selected field should be determined in order to retrieve the data value from the record by name:</b>
 * <code>
 *    			var fieldName = grid.getColumnModel().getDataIndex(cellIndex);
 *              var data = record.get(fieldName);
 * </code>
 * 					</dd>
 *			</dl>
 * 	   </dd>
 * </dl>
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_CellSelectionModel extends PhpExt_Grid_AbstractSelectionModel  
{	

	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.CellSelectionModel", null);
	
	}				

}



