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
 * @see PhpExt_Grid_GridPanel
 */
include_once 'PhpExt/Grid/GridPanel.php';


/**
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_EditorGridPanel extends PhpExt_Grid_GridPanel 
{
	// ClicksToEdit
	/**
	 * The number of clicks on a cell required to display the cell's editor (defaults to 2)
	 * @param integer $value 
	 * @return PhpExt_Grid_EditorGridPanel
	 */
	public function setClicksToEdit($value) {
		$this->setExtConfigProperty("clicksToEdit", $value);
		return $this;
	}	
	/**
	 * The number of clicks on a cell required to display the cell's editor (defaults to 2)
	 * @return integer
	 */
	public function getClicksToEdit() {
		return $this->getExtConfigProperty("clicksToEdit");
	}
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.EditorGridPanel", "editorgrid");
	
		$validProps = array(
		    "clicksToEdit"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
	
 	
	
}

