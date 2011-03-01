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
 *  @see PhpExt_Layout_ContainerLayout
 */
include_once 'PhpExt/Layout/ContainerLayout.php';

/**
 * This layout allows you to easily render content into an HTML table. The total number of columns can be specified, and rowspan and colspan can be used to create complex layouts within the table. 
 * 
 * In the case of TableLayout, the only valid layout config property is columns. However, the items added to a TableLayout can supply table-specific config properties of rowspan and colspan with the {@link PhpExt_Layout_TableLayoutData}, when adding the component to the container with table layout.
 * 
 * The basic concept of building up a TableLayout is conceptually very similar to building up a standard HTML table. You simply add each panel (or "cell") that you want to include along with any span attributes specified as the special config properties of rowspan and colspan 
 * which work exactly like their HTML counterparts. Rather than explicitly creating and nesting rows and columns as you would in HTML, you simply specify the total column count in the TableLayout and start adding panels in their natural order from left to right, top to bottom. 
 * The layout will automatically figure out, based on the column count, rowspans and colspans, how to position each panel within the table. Just like with HTML tables, your rowspans and colspans must add up correctly in your overall layout or you'll end up with missing and/or extra cells!
 * 
 * @see PhpExt_Layout_TableLayoutData
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_TableLayout extends PhpExt_Layout_ContainerLayout  {
    
	// Columns
    /**
     * The total number of columns to create in the table for this layout. If not specified, all panels added to this layout will be rendered into a single row using a column per panel.
     * @param integer $value 
     * @return PhpExt_Layout_TableLayout
     */
    public function setColumns($value) {
    	$this->setExtConfigProperty("columns", $value);
    	return $this;
    }	
    /**
     * The total number of columns to create in the table for this layout. If not specified, all panels added to this layout will be rendered into a single row using a column per panel.
     * @return integer
     */
    public function getColumns() {
    	return $this->getExtConfigProperty("columns");
    }
    
	
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_TABLE;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_TABLE;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.TableLayout", null);	    	   

	    $validLayoutProps = array(
	        "columns"
	    );
	    $this->addValidConfigProperties($validLayoutProps);
	    
	    $this->addValidLayoutDataClassName("PhpExt_Layout_TableLayoutData");
	}
	
	
}

