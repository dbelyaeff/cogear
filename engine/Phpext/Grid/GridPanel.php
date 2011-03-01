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
 * @see PhpExt_Panel
 */
include_once 'PhpExt/Panel.php';
/**
 * @see PhpExt_Grid_ColumnModel
 */
include_once 'PhpExt/Grid/ColumnModel.php';
/**
 * @see PhpExt_Grid_AbstractSelectionModell
 */
include_once 'PhpExt/Grid/AbstractSelectionModel.php';
/**
 * @see PhpExt_Data_Store
 */
include_once 'PhpExt/Data/Store.php';
/**
 * @see PhpExt_Grid_GridView
 */
include_once 'PhpExt/Grid/GridView.php';


/**
 * This class represents the primary interface of a component based grid control.
 * 
 * Usage:
 * <code>
 *	var grid = new Ext.grid.GridPanel({
 *	    store: new Ext.data.Store({
 *	        reader: reader,
 *	        data: xg.dummyData
 *	    }),
 *	    columns: [
 *	        {id:'company', header: "Company", width: 200, sortable: true, dataIndex: 'company'},
 *	        {header: "Price", width: 120, sortable: true, renderer: Ext.util.Format.usMoney, dataIndex: 'price'},
 *	        {header: "Change", width: 120, sortable: true, dataIndex: 'change'},
 *	        {header: "% Change", width: 120, sortable: true, dataIndex: 'pctChange'},
 *	        {header: "Last Updated", width: 135, sortable: true, renderer: Ext.util.Format.dateRenderer('m/d/Y'), dataIndex: 'lastChange'}
 *	    ],
 *	    viewConfig: {
 *	        forceFit: true
 *	    },
 *	    sm: new Ext.grid.RowSelectionModel({singleSelect:true}),
 *	    width:600,
 *	    height:300,
 *	    frame:true,
 *	    title:'Framed with Checkbox Selection and Horizontal Scrolling',
 *	    iconCls:'icon-grid'
 *	});
 *	</code>
 *	Note: Although this class inherits many configuration options from base classes, some of them (such as autoScroll, layout, items, etc) won't function as they do with the base Panel class.
 *	
 *	To access the data in a Grid, it is necessary to use the data model encapsulated by the Store. 
 *
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_GridPanel extends PhpExt_Panel 
{
    // AutoExpandColumn
    /**
     * The id of a column in this grid that should expand to fill unused space. This id can not be 0.
     * @param string $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setAutoExpandColumn($value) {
    	$this->setExtConfigProperty("autoExpandColumn", $value);
    	return $this;
    }	
    /**
     * The id of a column in this grid that should expand to fill unused space. This id can not be 0.
     * @return string
     */
    public function getAutoExpandColumn() {
    	return $this->getExtConfigProperty("autoExpandColumn");
    }
    
    // AutoExpandMax
    /**
     * The maximum width the autoExpandColumn can have (if enabled). Defaults to 1000.
     * @param integer $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setAutoExpandMax($value) {
    	$this->setExtConfigProperty("autoExpandMax", $value);
    	return $this;
    }	
    /**
     * The maximum width the autoExpandColumn can have (if enabled). Defaults to 1000.
     * @return integer
     */
    public function getAutoExpandMax() {
    	return $this->getExtConfigProperty("autoExpandMax");
    }
    
    // AutoExpandMin
    /**
     * The minimum width the autoExpandColumn can have (if enabled). defaults to 50.
     * @param integer $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setAutoExpandMin($value) {
    	$this->setExtConfigProperty("autoExpandMin", $value);
    	return $this;
    }	
    /**
     * The minimum width the autoExpandColumn can have (if enabled). defaults to 50.
     * @return integer
     */
    public function getAutoExpandMin() {
    	return $this->getExtConfigProperty("autoExpandMin");
    }
    
    // ColumnModel
    /**
	 * @var PhpExt_Grid_ColumnModel
	 */
	public $_columnModel = null;
    /**
     * The {@link PhpExt_Grid_ColumnModel} to use when rendering the grid (required).
     * @param PhpExt_Grid_ColumnModel $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setColumnModel(PhpExt_Grid_ColumnModel $value) {
        $this->_columnModel = $value;
    	$this->setExtConfigProperty("colModel", $value);
    	return $this;
    }	
    /**
     * The {@link PhpExt_Grid_ColumnModel} to use when rendering the grid (required).
     * @return PhpExt_Grid_ColumnModel
     */
    public function getColumnModel() {
    	return $this->getExtConfigProperty("colModel");
    }
    
    // DisableSelection
    /**
     * True to disable selections in the grid (defaults to false). - ignored a SelectionModel is specified
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setDisableSelection($value) {
    	$this->setExtConfigProperty("disableSelection", $value);
    	return $this;
    }	
    /**
     * True to disable selections in the grid (defaults to false). - ignored a SelectionModel is specified
     * @return boolean
     */
    public function getDisableSelection() {
    	return $this->getExtConfigProperty("disableSelection");
    }
    
    // EnableColumnHide
    /**
     * True to enable hiding of columns with the header context menu.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setEnableColumnHide($value) {
    	$this->setExtConfigProperty("enableColumnHide", $value);
    	return $this;
    }	
    /**
     * True to enable hiding of columns with the header context menu.
     * @return boolean
     */
    public function getEnableColumnHide() {
    	return $this->getExtConfigProperty("enableColumnHide");
    }
    
    // EnableColumnMove
    /**
     * True to enable drag and drop reorder of columns.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setEnableColumnMove($value) {
    	$this->setExtConfigProperty("enableColumnMove", $value);
    	return $this;
    }	
    /**
     * True to enable drag and drop reorder of columns.
     * @return boolean
     */
    public function getEnableColumnMove() {
    	return $this->getExtConfigProperty("enableColumnMove");
    }
    
    // EnableColumnResize
    /**
     * False to turn off column resizing for the whole grid (defaults to true).
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setEnableColumnResize($value) {
    	$this->setExtConfigProperty("enableColumnResize", $value);
    	return $this;
    }	
    /**
     * False to turn off column resizing for the whole grid (defaults to true).
     * @return boolean
     */
    public function getEnableColumnResize() {
    	return $this->getExtConfigProperty("enableColumnResize");
    }
    
    // EnableDragDrop
    /**
     * True to enable drag and drop of rows.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setEnableDragDrop($value) {
    	$this->setExtConfigProperty("enableDragDrop", $value);
    	return $this;
    }	
    /**
     * True to enable drag and drop of rows.
     * @return boolean
     */
    public function getEnableDragDrop() {
    	return $this->getExtConfigProperty("enableDragDrop");
    }
    
    // EnableHeaderMenu
    /**
     * True to enable the drop down button for menu in the headers.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setEnableHeaderMenu($value) {
    	$this->setExtConfigProperty("enableHdMenu", $value);
    	return $this;
    }	
    /**
     * True to enable the drop down button for menu in the headers.
     * @return boolean
     */
    public function getEnableHeaderMenu() {
    	return $this->getExtConfigProperty("enableHdMenu");
    }
    
    // EnableRowHeightSync
    /**
     * True to manually sync row heights across locked and not locked rows.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setEnableRowHeightSync($value) {
    	$this->setExtConfigProperty("enableRowHeightSync", $value);
    	return $this;
    }	
    /**
     * True to manually sync row heights across locked and not locked rows.
     * @return boolean
     */
    public function getEnableRowHeightSync() {
    	return $this->getExtConfigProperty("enableRowHeightSync");
    }
    
    // LoadMask
    /**
     * An {@link PhpExt_LoadMask} object or true to mask the grid while loading (defaults to false).
     * @param PhpExt_LoadMask|boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setLoadMask($value) {
    	$this->setExtConfigProperty("loadMask", $value);
    	return $this;
    }	
    /**
     * An {@link PhpExt_LoadMask} object or true to mask the grid while loading (defaults to false).
     * @return PhpExt_LoadMask|boolean
     */
    public function getLoadMask() {
    	return $this->getExtConfigProperty("loadMask");
    }
    
    // MaxHeight
    /**
     * Sets the maximum height of the grid - ignored if autoHeight is not on.
     * @param integer $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setMaxHeight($value) {
    	$this->setExtConfigProperty("maxHeight", $value);
    	return $this;
    }	
    /**
     * Sets the maximum height of the grid - ignored if autoHeight is not on.
     * @return integer
     */
    public function getMaxHeight() {
    	return $this->getExtConfigProperty("maxHeight");
    }
    
    // MinColumnWidth
    /**
     * The minimum width a column can be resized to. Defaults to 25.
     * @param integer $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setMinColumnWidth($value) {
    	$this->setExtConfigProperty("minColumnWidth", $value);
    	return $this;
    }	
    /**
     * The minimum width a column can be resized to. Defaults to 25.
     * @return integer
     */
    public function getMinColumnWidth() {
    	return $this->getExtConfigProperty("minColumnWidth");
    }
    
    // MonitorWindowResize
    /**
     * True to autoSize the grid when the window resizes. Defaults to true.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setMonitorWindowResize($value) {
    	$this->setExtConfigProperty("monitorWindowResize", $value);
    	return $this;
    }	
    /**
     * True to autoSize the grid when the window resizes. Defaults to true.
     * @return boolean
     */
    public function getMonitorWindowResize() {
    	return $this->getExtConfigProperty("monitorWindowResize");
    }
    
    // SelectionModel
    /**
     * Any subclass of {@link PhpExt_Grid_AbstractSelectionModel} that will provide the selection model for the grid (defaults to {@link PhpExt_Grid_RowSelectionModel} if not specified).
     * 
     * @param PhpExt_Grid_AbstractSelectionModel $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setSelectionModel(PhpExt_Grid_AbstractSelectionModel $value) {
    	$this->setExtConfigProperty("selModel", $value);
    	return $this;
    }	
    /**
     * Any subclass of {@link PhpExt_Grid_AbstractSelectionModel} that will provide the selection model for the grid (defaults to {@link PhpExt_Grid_RowSelectionModel} if not specified).
     * 
     * @return PhpExt_Grid_AbstractSelectionModel
     */
    public function getSelectionModel() {
    	return $this->getExtConfigProperty("selModel");
    }
    
    // Store
    /**
     * The {@link PhpExt_Data_Store} the grid should use as its data source (required).
     * @param PhpExt_Data_Store $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setStore(PhpExt_Data_Store $value) {
    	$this->setExtConfigProperty("store", $value);
    	return $this;
    }	
    /**
     * The {@link PhpExt_Data_Store} the grid should use as its data source (required).
     * @return PhpExt_Data_Store
     */
    public function getStore() {
    	return $this->getExtConfigProperty("store");
    }
    
    // StripeRows
    /**
     * True to stripe the rows. Default is false.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setStripeRows($value) {
    	$this->setExtConfigProperty("stripeRows", $value);
    	return $this;
    }	
    /**
     * True to stripe the rows. Default is false.
     * @return boolean
     */
    public function getStripeRows() {
    	return $this->getExtConfigProperty("stripeRows");
    }
    
    // TrackMouseOver
    /**
     * True to highlight rows when the mouse is over. Default is true.
     * @param boolean $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setTrackMouseOver($value) {
    	$this->setExtConfigProperty("trackMouseOver", $value);
    	return $this;
    }	
    /**
     * True to highlight rows when the mouse is over. Default is true.
     * @return boolean
     */
    public function getTrackMouseOver() {
    	return $this->getExtConfigProperty("trackMouseOver");
    }
    
    // View
    /**
     * The {@link PhpExt_Grid_GridView} used by the grid. This can be set before a call to render().
     * @see PhpExt_Grid_GridView
     * @see PhpExt_Grid_GroupingView
     * @param PhpExt_Grid_GridView $value 
     * @return PhpExt_Grid_GridPanel
     */
    public function setView($value) {
    	$this->setExtConfigProperty("view", $value);
    	return $this;
    }	
    /**
     * The {@link PhpExt_Grid_GridView} used by the grid. This can be set before a call to render().
     * @see PhpExt_Grid_GridView
     * @see PhpExt_Grid_GroupingView 
     * @return PhpExt_Grid_GridView
     */
    public function getView() {
    	return $this->getExtConfigProperty("view");
    }    
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.GridPanel", "grid");
		
		$validProps = array(
		    "autoExpandColumn",
		    "autoExpandMax",
		    "autoExpandMin",
		    "colModel",
		    "disableSelection",
		    "enableColumnHide",
		    "enableColumnMove",
		    "enableColumnResize",
		    "enableDragDrop",
		    "enableHdMenu",
		    "enableRowHeightSync",
		    "loadMask",
		    "maxHeight",
		    "minColumnWidth",
		    "monitorWindowResize",
		    "selModel",
		    "store",
		    "stripeRows",
		    "trackMouseOver",
		    "view"
		);
		$this->addValidConfigProperties($validProps);
	
	}		
 	
	
}

