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
 * @see PhpExt_Grid_GridView
 */
include_once 'PhpExt/Grid/GridView.php';


/**
 * Adds the ability for single level grouping to the grid.
 * 
 * Example:
 * <code>
 * // A groupingStore is required for a GroupingView
 * $grpStore = new PhpExt_Data_GroupingStore();
 * $grpStore->setReader($reader)
 * 			->setData($dummyData)
 * 			->setGroupField('industry');
 *  
 * $grpView = new PhpExt_Grid_GroupingView();
 * // custom grouping text template to display the number of items per group
 * $grpView->setForceFit(true)
 *         ->setGroupTextTemplate('{text} ({[values.rs.length]} {[values.rs.length > 1 ? "Items" : "Item"]})');
 * 
 * // Set grouping required properties
 * $grid = new PhpExt_Grid_GridPanel();
 * $grid->setStore($grpStore);
 * 		->setView($grpView);
 * </code>
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_GroupingView extends PhpExt_Grid_GridView  
{
    // EmptyGroupText
    /**
     * The text to display when there is an empty group value
     * @param string $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setEmptyGroupText($value) {
    	$this->setExtConfigProperty("emptyGroupText", $value);
    	return $this;
    }	
    /**
     * The text to display when there is an empty group value
     * @return string
     */
    public function getEmptyGroupText() {
    	return $this->getExtConfigProperty("emptyGroupText");
    }
    
    // EnableGrouping
    /**
     * False to disable grouping functionality (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setEnableGrouping($value) {
    	$this->setExtConfigProperty("enableGrouping", $value);
    	return $this;
    }	
    /**
     * False to disable grouping functionality (defaults to true)
     * @return boolean
     */
    public function getEnableGrouping() {
    	return $this->getExtConfigProperty("enableGrouping");
    }
    
    // EnableGroupingMenu
    /**
     * True to enable the grouping control in the column menu
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setEnableGroupingMenu($value) {
    	$this->setExtConfigProperty("enableGroupingMenu", $value);
    	return $this;
    }	
    /**
     * True to enable the grouping control in the column menu
     * @return boolean
     */
    public function getEnableGroupingMenu() {
    	return $this->getExtConfigProperty("enableGroupingMenu");
    }
    
    // EnableNoGroups
    /**
     * True to allow the user to turn off grouping
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setEnableNoGroups($value) {
    	$this->setExtConfigProperty("enableNoGroups", $value);
    	return $this;
    }	
    /**
     * True to allow the user to turn off grouping
     * @return boolean
     */
    public function getEnableNoGroups() {
    	return $this->getExtConfigProperty("enableNoGroups");
    }
    
    // GroupByText
    /**
     * Text displayed in the grid header menu for grouping by a column (defaults to 'Group By This Field').
     * @param string $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setGroupByText($value) {
    	$this->setExtConfigProperty("groupByText", $value);
    	return $this;
    }	
    /**
     * Text displayed in the grid header menu for grouping by a column (defaults to 'Group By This Field').
     * @return string
     */
    public function getGroupByText() {
    	return $this->getExtConfigProperty("groupByText");
    }
    
    // GroupTextTemplate
    /**
     * The template used to render the group text
     * @param string $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setGroupTextTemplate($value) {
    	$this->setExtConfigProperty("groupTextTpl", $value);
    	return $this;
    }	
    /**
     * The template used to render the group text
     * @return string
     */
    public function getGroupTextTemplate() {
    	return $this->getExtConfigProperty("groupTextTpl");
    }
    
    // HideGroupedColumn
    /**
     * True to hide the column that is currently grouped
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setHideGroupedColumn($value) {
    	$this->setExtConfigProperty("hideGroupedColumn", $value);
    	return $this;
    }	
    /**
     * True to hide the column that is currently grouped
     * @return boolean
     */
    public function getHideGroupedColumn() {
    	return $this->getExtConfigProperty("hideGroupedColumn");
    }
    
    // IgnoreAdd
    /**
     * True to skip refreshing the view when new rows are added (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setIgnoreAdd($value) {
    	$this->setExtConfigProperty("ignoreAdd", $value);
    	return $this;
    }	
    /**
     * True to skip refreshing the view when new rows are added (defaults to false)
     * @return boolean
     */
    public function getIgnoreAdd() {
    	return $this->getExtConfigProperty("ignoreAdd");
    }
    
    // ShowGroupName
    /**
     * True to display the name for each set of grouped rows (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setShowGroupName($value) {
    	$this->setExtConfigProperty("showGroupName", $value);
    	return $this;
    }	
    /**
     * True to display the name for each set of grouped rows (defaults to false)
     * @return boolean
     */
    public function getShowGroupName() {
    	return $this->getExtConfigProperty("showGroupName");
    }
    
    // ShowGroupsText
    /**
     * Text displayed in the grid header for enabling/disabling grouping (defaults to 'Show in Groups').
     * @param string $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setShowGroupsText($value) {
    	$this->setExtConfigProperty("showGroupsText", $value);
    	return $this;
    }	
    /**
     * Text displayed in the grid header for enabling/disabling grouping (defaults to 'Show in Groups').
     * @return string
     */
    public function getShowGroupsText() {
    	return $this->getExtConfigProperty("showGroupsText");
    }
    
    // StartCollapsed
    /**
     * True to start all groups collapsed
     * @param boolean $value 
     * @return PhpExt_Grid_GroupingView
     */
    public function setStartCollapsed($value) {
    	$this->setExtConfigProperty("startCollapsed", $value);
    	return $this;
    }	
    /**
     * True to start all groups collapsed
     * @return boolean
     */
    public function getStartCollapsed() {
    	return $this->getExtConfigProperty("startCollapsed");
    }
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.GroupingView", null);

		$validProps = array(
		    "emptyGroupText",
		    "enableGrouping",
		    "enableGroupingMenu",
		    "enableNoGroups",
		    "groupByText",
		    "groupTextTpl",
		    "hideGroupedColumn",
		    "ignoreAdd",
		    "showGroupName",
		    "showGroupsText",
		    "startCollapsed"
		);
		$this->addValidConfigProperties($validProps);
		
	}	
		
}

