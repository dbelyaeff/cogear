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
 *  @see PhpExt_Layout_TabLayout
 */
include_once 'PhpExt/Layout/TabLayout.php';

/**
 * @package PhpExt 
 */
class PhpExt_TabPanel extends PhpExt_Panel
{
	const TAB_POSITON_TOP = 'top';
	const TAB_POSITON_BOTTOM = 'bottom';

	// ActiveTab
	/**
	 * A string id or the numeric index of the tab that should be initially activated on render (defaults to none).
	 * @param string|integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setActiveTab($value) {
		$this->setExtConfigProperty("activeTab", $value);
		return $this;
	}	
	/**
	 * A string id or the numeric index of the tab that should be initially activated on render (defaults to none).
	 * @return string|integer
	 */
	public function getActiveTab() {
		return $this->getExtConfigProperty("activeTab");
	}
	
	// AnimScroll
	/**
	 * True to animate tab scrolling so that hidden tabs slide smoothly into view (defaults to true). Only applies when enableTabScroll = true.
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setAnimScroll($value) {
		$this->setExtConfigProperty("animScroll", $value);
		return $this;
	}	
	/**
	 * True to animate tab scrolling so that hidden tabs slide smoothly into view (defaults to true). Only applies when enableTabScroll = true.
	 * @return boolean
	 */
	public function getAnimScroll() {
		return $this->getExtConfigProperty("animScroll");
	}	
	
	// AutoTabSelector
	/**
	 * The CSS selector used to search for tabs in existing markup when autoTabs = true (defaults to 'div.x-tab'). This can be any valid selector supported by Ext.DomQuery.select. Note that the query will be executed within the scope of this tab panel only (so that multiple tab panels from markup can be supported on a page).
	 * @param string $value
	 * @return PhpExt_TabPanel
	 */
	public function setAutoTabSelector($value) {
		$this->setExtConfigProperty("autoTabSelector", $value);
		return $this;
	}	
	/**
	 * The CSS selector used to search for tabs in existing markup when autoTabs = true (defaults to 'div.x-tab'). This can be any valid selector supported by Ext.DomQuery.select. Note that the query will be executed within the scope of this tab panel only (so that multiple tab panels from markup can be supported on a page).
	 * @return string
	 */
	public function getAutoTabSelector() {
		return $this->getExtConfigProperty("autoTabSelector");
	}
	
	// AutoTabs
	/**
	 * True to query the DOM for any divs with a class of 'x-tab' to be automatically converted to tabs and added to this panel (defaults to false). Note that the query will be executed within the scope of the container element only (so that multiple tab panels from markup can be supported via this method).
	 * This method is only possible when the markup is structured correctly as a container with nested divs containing the class 'x-tab'. To create TabPanels without these limitations, or to pull tab content from other elements on the page, see the example at the top of the class for generating tabs from markup.
	 * There are a couple of things to note when using this method:
	 *   - When using the autoTabs config (as opposed to passing individual tab configs in the TabPanel's items collection), you must use applyTo to correctly use the specified id as the tab container. The autoTabs method replaces existing content with the TabPanel components.
     *   - Make sure that you set deferredRender to false so that the content elements for each tab will be rendered into the TabPanel immediately upon page load, otherwise they will not be transformed until each tab is activated and will be visible outside the TabPanel.	 
	 * <code>
	 * // This markup will be converted to a TabPanel from the code above
	 * <div id="my-tabs">
	 *   <div class="x-tab" title="Tab 1">A simple tab</div>
     *   <div class="x-tab" title="Tab 2">Another one</div>
     * </div>
	 * </code>
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setAutoTabs($value) {
		$this->setExtConfigProperty("autoTabs", $value);
		return $this;
	}	
	/**
	 * 
	 * @return boolean
	 */
	public function getAutoTabs() {
		return $this->getExtConfigProperty("autoTabs");
	}
	
	// BaseCssClass
	/**
	 * The base CSS class applied to the panel (defaults to 'x-tab-panel').
	 * @param string $value
	 * @return PhpExt_TabPanel
	 */
	public function setBaseCssClass($value) {
		return parent::setBaseCssClass($value);
	}	
	/**
	 * The base CSS class applied to the panel (defaults to 'x-tab-panel').
	 * @return string
	 */
	public function getBaseCssClass() {
		return parent::getBaseCssClass();
	}
	
	// DeferredRender
	/**
	 * Internally, the TabPanel uses a Ext.layout.CardLayout to manage its tabs. This property will be passed on to the layout as its Ext.layout.CardLayout.deferredRender config value, determining whether or not each tab is rendered only when first accessed (defaults to true).
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setDeferredRender($value) {
		$this->setExtConfigProperty("deferredRender", $value);
		return $this;
	}	
	/**
	 * Internally, the TabPanel uses a Ext.layout.CardLayout to manage its tabs. This property will be passed on to the layout as its Ext.layout.CardLayout.deferredRender config value, determining whether or not each tab is rendered only when first accessed (defaults to true). 
	 * @return boolean
	 */
	public function getDeferredRender() {
		return $this->getExtConfigProperty("deferredRender");
	}
	
	// EnableTabScroll
	/**
	 * True to enable scrolling to tabs that may be invisible due to overflowing the overall TabPanel width. Only available with tabs on top. (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setEnableTabScroll($value) {
		$this->setExtConfigProperty("enableTabScroll", $value);
		return $this;
	}	
	/**
	 * True to enable scrolling to tabs that may be invisible due to overflowing the overall TabPanel width. Only available with tabs on top. (defaults to false). 
	 * @return boolean
	 */
	public function getEnableTabScroll() {
		return $this->getExtConfigProperty("enableTabScroll");
	}
	
	// LayoutOnTabChange
	/**
	 * Set to true to do a layout of tab items as tabs are changed.
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setLayoutOnTabChange($value) {
		$this->setExtConfigProperty("layoutOnTabChange", $value);
		return $this;
	}	
	/**
	 * Set to true to do a layout of tab items as tabs are changed.
	 * @return boolean
	 */
	public function getLayoutOnTabChange() {
		return $this->getExtConfigProperty("layoutOnTabChange");
	}
	
	// MinTabWidth
	/**
	 * The minimum width in pixels for each tab when resizeTabs = true (defaults to 30).
	 * @param integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setMinTabWidth($value) {
		$this->setExtConfigProperty("minTabWidth", $value);
		return $this;
	}	
	/**
	 * The minimum width in pixels for each tab when resizeTabs = true (defaults to 30).
	 * @return integer
	 */
	public function getMinTabWidth() {
		return $this->getExtConfigProperty("minTabWidth");
	}
	
	// MonitorResize
	/**
	 * True to automatically monitor window resize events and rerender the layout on browser resize (defaults to true).
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setMonitorResize($value) {
		return parent::setMonitorResize($value);
	}	
	/**
	 * True to automatically monitor window resize events and rerender the layout on browser resize (defaults to true).
	 * @return boolean
	 */
	public function getMonitorResize() {
		return parent::getMonitorResize();
	}
	
	// Plain
	/**
	 * True to render the tab strip without a background container image (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setPlain($value) {
		$this->setExtConfigProperty("plain", $value);
		return $this;
	}	
	/**
	 * True to render the tab strip without a background container image (defaults to false).
	 * @return boolean
	 */
	public function getPlain() {
		return $this->getExtConfigProperty("plain");
	}
	
	// ResizeTabs
	/**
	 * True to automatically resize each tab so that the tabs will completely fill the tab strip (defaults to false). Setting this to true may cause specific widths that might be set per tab to be overridden in order to fit them all into view (although minTabWidth will always be honored).
	 * @param boolean $value
	 * @return PhpExt_TabPanel
	 */
	public function setResizeTabs($value) {
		$this->setExtConfigProperty("resizeTabs", $value);
		return $this;
	}	
	/**
	 * True to automatically resize each tab so that the tabs will completely fill the tab strip (defaults to false). Setting this to true may cause specific widths that might be set per tab to be overridden in order to fit them all into view (although minTabWidth will always be honored).
	 * @return boolean
	 */
	public function getResizeTabs() {
		return $this->getExtConfigProperty("resizeTabs");
	}
	
	// ScrollDuration
	/**
	 * The number of milliseconds that each scroll animation should last (defaults to .35). Only applies when animScroll = true.
	 * @param float $value
	 * @return PhpExt_TabPanel
	 */
	public function setScrollDuration($value) {
		$this->setExtConfigProperty("scrollDuration", $value);
		return $this;
	}	
	/**
	 * The number of milliseconds that each scroll animation should last (defaults to .35). Only applies when animScroll = true.
	 * @return float
	 */
	public function getScrollDuration() {
		return $this->getExtConfigProperty("scrollDuration");
	}	
	
	// ScrollIncrement
	/**
	 * The number of pixels to scroll each time a tab scroll button is pressed (defaults to 100, or if resizeTabs = true, the calculated tab width). Only applies when enableTabScroll = true.
	 * @param integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setScrollIncrement($value) {
		$this->setExtConfigProperty("scrollIncrement", $value);
		return $this;
	}	
	/**
	 * The number of pixels to scroll each time a tab scroll button is pressed (defaults to 100, or if resizeTabs = true, the calculated tab width). Only applies when enableTabScroll = true.
	 * @return integer
	 */
	public function getScrollIncrement() {
		return $this->getExtConfigProperty("scrollIncrement");
	}
	
	// ScrollRepeatInterval
	/**
	 * Number of milliseconds between each scroll while a tab scroll button is continuously pressed (defaults to 400).
	 * @param integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setScrollRepeatInterval($value) {
		$this->setExtConfigProperty("scrollRepeatInterval", $value);
		return $this;
	}	
	/**
	 * Number of milliseconds between each scroll while a tab scroll button is continuously pressed (defaults to 400).
	 * @return integer
	 */
	public function getScrollRepeatInterval() {
		return $this->getExtConfigProperty("scrollRepeatInterval");
	}
	
	// TabMargin
	/**
	 * The number of pixels of space to calculate into the sizing and scrolling of tabs. If you change the margin in CSS, you will need to update this value so calculations are correct with either resizeTabs or scrolling tabs. (defaults to 2)
	 * @param integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setTabMargin($value) {
		$this->setExtConfigProperty("tabMargin", $value);
		return $this;
	}	
	/**
	 * The number of pixels of space to calculate into the sizing and scrolling of tabs. If you change the margin in CSS, you will need to update this value so calculations are correct with either resizeTabs or scrolling tabs. (defaults to 2)
	 * @return integer
	 */
	public function getTabMargin() {
		return $this->getExtConfigProperty("tabMargin");
	}
	
	// TabPosition
	/**
	 * The position where the tab strip should be rendered (defaults to PhpExt_TabPanel::TAB_POSITION_TOP). The only other supported value is PhpExt_TabPanel::TAB_POSITION_BOTTOM. Note that tab scrolling is only supported for position PhpExt_TabPanel::TAB_POSITION_TOP.
	 * @param string $value
	 * @return PhpExt_TabPanel
	 */
	public function setTabPosition($value) {
		$this->setExtConfigProperty("tabPosition", $value);
		return $this;
	}	
	/**
	 * The position where the tab strip should be rendered (defaults to PhpExt_TabPanel::TAB_POSITION_TOP). The only other supported value is PhpExt_TabPanel::TAB_POSITION_BOTTOM. Note that tab scrolling is only supported for position PhpExt_TabPanel::TAB_POSITION_TOP
	 * @return string
	 */
	public function getTabPosition() {
		return $this->getExtConfigProperty("tabPosition");
	}
	
	// TabWidth
	/**
	 * The initial width in pixels of each new tab (defaults to 120).
	 * 
	 * @param integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setTabWidth($value) {
		$this->setExtConfigProperty("tabWidth", $value);
		return $this;
	}	
	/**
	 * The initial width in pixels of each new tab (defaults to 120).
	 * @return integer
	 */
	public function getTabWidth() {
		return $this->getExtConfigProperty("tabWidth");
	}
	
	// WheelIncrement
	/**
	 * For scrolling tabs, the number of pixels to increment on mouse wheel scrolling (defaults to 20).
	 * @param integer $value
	 * @return PhpExt_TabPanel
	 */
	public function setWheelIncrement($value) {
		$this->setExtConfigProperty("wheelIncrement", $value);
		return $this;
	}	
	/**
	 * For scrolling tabs, the number of pixels to increment on mouse wheel scrolling (defaults to 20).
	 * @return integer
	 */
	public function getWheelIncrement() {
		return $this->getExtConfigProperty("wheelIncrement");
	}
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.TabPanel","tabpanel");
		
		$validProps = array(
		    "activeTab",
		    "animScroll",
		    "autoTabSelector",
		    "autoTabs",
		    "baseCls",
		    "deferredRender",
		    "enableTabScroll",
		    "layoutOnTabChange",
		    "minTabWidth",
		    "monitorResize",
		    "plain",
		    "resizeTabs",
		    "scrollDuration",
		    "scrollIncrement",
		    "tabMargin",
		    "tabPosition",
		    "tabWidth",
		    "wheelIncrement"
		);
		$this->addValidConfigProperties($validProps);
		
	    $this->_defaultLayout = new PhpExt_Layout_TabLayout();
		$this->setLayout($this->_defaultLayout);
	}	
		
}

