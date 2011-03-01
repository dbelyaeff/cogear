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
 * @see PhpExt_Config_ConfigObject
 */
include_once 'PhpExt/Config/ConfigObject.php';

/**
 * @see PhpExt_Grid_IColumn
 */
include_once 'PhpExt/Grid/IColumn.php';

/**
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_ColumnConfigObject extends PhpExt_Config_ConfigObject implements PhpExt_Grid_IColumn
{
    // Align
    /**
     * (optional) Set the CSS text-align property of the column. Defaults to undefined.
     * @param string $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setAlign($value) {
    	$this->setExtConfigProperty("align", $value);
    	return $this;
    }	
    /**
     * (optional) Set the CSS text-align property of the column. Defaults to undefined.
     * @return string
     */
    public function getAlign() {
    	return $this->getExtConfigProperty("align");
    }
    
    // DataIndex
    /**
     * (optional) The name of the field in the grid's Ext.data.Store's Ext.data.Record definition from which to draw the column's value. If not specified, the column's index is used as an index into the Record's data Array.
     * @param string $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setDataIndex($value) {
    	$this->setExtConfigProperty("dataIndex", $value);
    	return $this;
    }	
    /**
     * (optional) The name of the field in the grid's Ext.data.Store's Ext.data.Record definition from which to draw the column's value. If not specified, the column's index is used as an index into the Record's data Array.
     * @return string
     */
    public function getDataIndex() {
    	return $this->getExtConfigProperty("dataIndex");
    }
    
    // Editor
    /**
     * (optional) The Ext.form.Field to use when editing values in this column if editing is supported by the grid.
     * @param PhpExt_Form_Field $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setEditor($value) {
    	$this->setExtConfigProperty("editor", $value);
    	return $this;
    }	
    /**
     * (optional) The Ext.form.Field to use when editing values in this column if editing is supported by the grid.
     * @return PhpExt_Form_Field
     */
    public function getEditor() {
    	return $this->getExtConfigProperty("editor");
    }
    
    // Fixed
    /**
     * (optional) True if the column width cannot be changed. Defaults to false. 
     * @param boolean $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setFixed($value) {
    	$this->setExtConfigProperty("fixed", $value);
    	return $this;
    }	
    /**
     * (optional) True if the column width cannot be changed. Defaults to false. 
     * @return boolean
     */
    public function getFixed() {
    	return $this->getExtConfigProperty("fixed");
    }
    
    // Header
    /**
     * The header text to display in the Grid view.
     * @param string $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setHeader($value) {
    	$this->setExtConfigProperty("header", $value);
    	return $this;
    }	
    /**
     * The header text to display in the Grid view.
     * @return string
     */
    public function getHeader() {
    	return $this->getExtConfigProperty("header");
    }
    
    // Hidden
    /**
     * (optional) True to hide the column. Defaults to false.
     * @param boolean $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setHidden($value) {
    	$this->setExtConfigProperty("hidden", $value);
    	return $this;
    }	
    /**
     * (optional) True to hide the column. Defaults to false.
     * @return boolean
     */
    public function getHidden() {
    	return $this->getExtConfigProperty("hidden");
    }
    
    // Hideable
    /**
     * (optional) Specify as false to prevent the user from hiding this column. Defaults to true.
     * @param boolean $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setHideable($value) {
    	$this->setExtConfigProperty("hideable", $value);
    	return $this;
    }	
    /**
     * (optional) Specify as false to prevent the user from hiding this column. Defaults to true.
     * @return boolean
     */
    public function getHideable() {
    	return $this->getExtConfigProperty("hideable");
    }
    
    // Id
    /**
     * (optional) Defaults to the column's initial ordinal position. A name which identifies this column. The id is used to create a CSS class name which is applied to all table cells (including headers) in that column. 
     * The class name takes the form of: 'x-grid3-td-id'
	 *
	 * Header cells will also recieve this class name, but will also have the class x-grid3-hd, so to target header cells, 
	 * use CSS selectors such as: '.x-grid3-hd.x-grid3-td-id'
     *
     * The Ext.grid.Grid.autoExpandColumn grid config option references the column via this identifier.
     * @param string $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setId($value) {
    	$this->setExtConfigProperty("id", $value);
    	return $this;
    }	
    /**
     * 
     * @return string
     */
    public function getId() {
    	return $this->getExtConfigProperty("id");
    }
    
    // Renderer
    /**
     * (optional) A function used to generate HTML markup for a cell given the cell's data value. If not specified, the default renderer uses the raw data value.
     * 
     * The render function is called with the following parameters:
     * <dl>
     * 	<dt><b>value</b> : Object</dt>
     * 		<dd>The data value for the cell.</dd>
     * 	<dt><b>metadata</b> : Object
     * 		<dd>An object in which you may set the following attributes:
	 *      <dl>
	 *        <dt><b>css</b> : String</dt>
	 *  	  	<dd>A CSS class name to add to the cell's TD element.</dd>
	 *        <dt><b>attr</b> : String</dt>
	 *          <dd>An HTML attribute definition string to apply to the data container element within the table cell (e.g. 'style="color:red;"').</dd>
     * 	</dd>
     * 	<dt><b>record</b> : Ext.data.record</dt>
     * 		<dd>The Ext.data.Record from which the data was extracted.</dd>
     * 	<dt><b>rowIndex</b> : Number</dt>
     * 		<dd>Row index</dd>
     * 	<dt><b>colIndex</b> : Number</dt>
     * 		<dd>Column index</dd>
     * 	<dt><b>store</b> : Ext.data.Store</dt>
     * 		<dd>The Ext.data.Store object from which the Record was extracted.</dd>
	 * </dl>
     * @param PhpExt_JavascriptStm|PhpExt_Object $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setRenderer($value) {
    	$this->setExtConfigProperty("renderer", $value);
    	return $this;
    }	
    /**
     * 
     * @return PhpExt_JavascriptStm|PhpExt_Object
     */
    public function getRenderer() {
    	return $this->getExtConfigProperty("renderer");
    }
    
    // Resizable
    /**
     * (optional) False to disable column resizing. Defaults to true.
     * @param boolean $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setResizable($value) {
    	$this->setExtConfigProperty("resizable", $value);
    	return $this;
    }	
    /**
     * (optional) False to disable column resizing. Defaults to true.
     * @return boolean
     */
    public function getResizable() {
    	return $this->getExtConfigProperty("resizable");
    }
    
    // Sortable
    /**
     * (optional) True if sorting is to be allowed on this column. Defaults to the value of the defaultSortable property. Whether local/remote sorting is used is specified in Ext.data.Store.remoteSort.
     * @param boolean $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setSortable($value) {
    	$this->setExtConfigProperty("sortable", $value);
    	return $this;
    }	
    /**
     * (optional) True if sorting is to be allowed on this column. Defaults to the value of the defaultSortable property. Whether local/remote sorting is used is specified in Ext.data.Store.remoteSort.
     * @return boolean
     */
    public function getSortable() {
    	return $this->getExtConfigProperty("sortable");
    }
    
    // Width
    /**
     * (optional) The initial width in pixels of the column. Using this instead of Ext.grid.Grid.autoSizeColumns is more efficient.
     * @param integer $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setWidth($value) {
    	$this->setExtConfigProperty("width", $value);
    	return $this;
    }	
    /**
     * (optional) The initial width in pixels of the column. Using this instead of Ext.grid.Grid.autoSizeColumns is more efficient.
     * @return integer
     */
    public function getWidth() {
    	return $this->getExtConfigProperty("width");
    }
    
    // Locked
    /**
     * False if the column's position can be changed by the user
     * @param boolean $value 
     * @return PhpExt_Grid_ColumnConfigObject
     */
    public function setLocked($value) {
    	$this->setExtConfigProperty("locked", $value);
    	return $this;
    }	
    /**
     * False if the column's position can be changed by the user
     * @return boolean
     */
    public function getLocked() {
    	return $this->getExtConfigProperty("locked");
    }	
	
	public function __construct($header) {
		parent::__construct();
		
		$validProps = array(
		    "align",
		    "dataIndex",
		    "editor",
		    "fixed",
		    "header",
		    "hidden",
		    "hideable",
		    "id",
		    "renderer",
		    "resizable",
		    "sortable",
		    "width",
		    "locked"
		);
		$this->addValidConfigProperties($validProps);
				
		$this->setHeader($header);		
	}	
	
	/**
	 * Helper function to create a ColumnConfigObject
	 *
	 * @param string $header
	 * @param string|integer $dataIndex
	 * @param string $id
	 * @param integer $width
	 * @param string $align
	 * @param PhpExt_JavascriptStm $renderer
	 * @param boolean $sortable
	 * @return PhpExt_Data_ColumnConfigObject
	 */
	public static function createColumn($header, $dataIndex = null, $id = null, 
	    $width = null, $align = null, $renderer = null, $sortable = null, $locked = null) {
	    $c = new PhpExt_Grid_ColumnConfigObject($header);

	    $c->setHeader($header);
	    if ($dataIndex !== null)
	        $c->setDataIndex($dataIndex);
	    if ($id !== null)
	        $c->setId($id);
	    if ($width !== null)
	        $c->setWidth($width);
	    if ($align !== null)
	        $c->setAlign($align);
	    if ($renderer !== null)
	        $c->setRenderer($renderer);
	    if ($sortable !== null)
	        $c->setSortable($sortable);
	    if ($locked !== null)
	        $c->setLocked($locked);
	        
	    return $c;
	}
}

