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
 * @see PhpExt_Layout_ContainerLayoutData 
 */
include_once 'PhpExt/Layout/ContainerLayoutData.php';


/**
 * Used when using {@link PhpExt_Layout_BorderLayout} as the container's layout.	 
 *  
 * @see PhpExt_Layout_BorderLayout
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_BorderLayoutData extends PhpExt_Layout_ContainerLayoutData 
{	
    const REGION_NORTH = 'north';
    const REGION_WEST = 'west';
    const REGION_CENTER = 'center';
    const REGION_EAST = 'east';
    const REGION_SOUTH = 'south'; 
    
    // AnimCollapse
    /**
     * When a collapsed region's bar is clicked, the region's panel will be displayed as a floated panel that will close again once the user mouses out of that panel (or clicks out if autoHide = false). Setting animFloat to false will prevent the open and close of these floated panels from being animated (defaults to true).
     * @param boolean $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setAnimCollapse($value) {
    	$this->setLayoutProperty("animCollapse", $value);
    	return $this;
    }	
    /**
     * When a collapsed region's bar is clicked, the region's panel will be displayed as a floated panel that will close again once the user mouses out of that panel (or clicks out if autoHide = false). Setting animFloat to false will prevent the open and close of these floated panels from being animated (defaults to true).
     * @return boolean
     */
    public function getAnimCollapse() {
    	return $this->getLayoutProperty("animCollapse");
    }	
    
    // AutoHide
    /**
     * When a collapsed region's bar is clicked, the region's panel will be displayed as a floated panel. If autoHide is true, the panel will automatically hide after the user mouses out of the panel. If autoHide is false, the panel will continue to display until the user clicks outside of the panel (defaults to true).
     * @param boolean $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setAutoHide($value) {
        $this->setLayoutProperty("autoHide", $value);
        return $this;
    }	
    /**
     * When a collapsed region's bar is clicked, the region's panel will be displayed as a floated panel. If autoHide is true, the panel will automatically hide after the user mouses out of the panel. If autoHide is false, the panel will continue to display until the user clicks outside of the panel (defaults to true).
     * @return boolean
    */
    public function getAutoHide() {
        return $this->getLayoutProperty("autoHide");
    }
    
    // CMargins
    /**
     * An object containing margins to apply to the region's collapsed element in the format {left: (left margin), top: (top margin), right: (right margin), bottom: (bottom margin)}
     * @param object $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setCMargins($value) {
        $this->setLayoutProperty("cmargins", $value);
        return $this;
    }	
    /**
     * An object containing margins to apply to the region's collapsed element in the format {left: (left margin), top: (top margin), right: (right margin), bottom: (bottom margin)}
     * @return object
    */
    public function getCMargins() {
        return $this->getLayoutProperty("cmargins");
    }
    
    // CollapseMode
    /**
     * By default, collapsible regions are collapsed by clicking the expand/collapse tool button that renders into the region's title bar. Optionally, when collapseMode is set to 'mini' the region's split bar will also display a small collapse button in the center of the bar. In 'mini' mode the region will collapse to a thinner bar than in normal mode. By default collapseMode is undefined, and the only two supported values are undefined and 'mini'. Note that if a collapsible region does not have a title bar, then collapseMode must be set to 'mini' in order for the region to be collapsible by the user as the tool button will not be rendered.
     * @param string $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setCollapseMode($value) {
        $this->setLayoutProperty("collapseMode", $value);
        return $this;
    }	
    /**
     * By default, collapsible regions are collapsed by clicking the expand/collapse tool button that renders into the region's title bar. Optionally, when collapseMode is set to 'mini' the region's split bar will also display a small collapse button in the center of the bar. In 'mini' mode the region will collapse to a thinner bar than in normal mode. By default collapseMode is undefined, and the only two supported values are undefined and 'mini'. Note that if a collapsible region does not have a title bar, then collapseMode must be set to 'mini' in order for the region to be collapsible by the user as the tool button will not be rendered.
     * @return string
    */
    public function getCollapseMode() {
        return $this->getLayoutProperty("collapseMode");
    }
    
	// Collapsible
	/**
	 * True to allow the user to collapse this region (defaults to false). If true, an expand/collapse tool button will automatically be rendered into the title bar of the region, otherwise the button will not be shown. Note that a title bar is required to display the toggle button -- if no region title is specified, the region will only be collapsible if collapseMode is set to 'mini'.
	 * @param boolean $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setCollapsible($value) {
	    $this->setLayoutProperty("collapsible", $value);
	    return $this;
	}	
	/**
	 * True to allow the user to collapse this region (defaults to false). If true, an expand/collapse tool button will automatically be rendered into the title bar of the region, otherwise the button will not be shown. Note that a title bar is required to display the toggle button -- if no region title is specified, the region will only be collapsible if collapseMode is set to 'mini'.
	 * @return boolean
	*/
	public function getCollapsible() {
	    return $this->getLayoutProperty("collapsible");
	}
	
	// Floatable
	/**
	 * True to allow clicking a collapsed region's bar to display the region's panel floated above the layout, false to force the user to fully expand a collapsed region by clicking the expand button to see it again (defaults to true).
	 * @param boolean $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setFloatable($value) {
	    $this->setLayoutProperty("flotable", $value);
	    return $this;
	}	
	/**
	 * True to allow clicking a collapsed region's bar to display the region's panel floated above the layout, false to force the user to fully expand a collapsed region by clicking the expand button to see it again (defaults to true).
	 * @return boolean
	*/
	public function getFloatable() {
	    return $this->getLayoutProperty("flotable");
	}
	
	// Margins
	/**
	 * An object containing margins to apply to the region in the format {left: (left margin), top: (top margin), right: (right margin), bottom: (bottom margin)} or a string with the margin values in the format "left top right bottom"
	 * @param mixed $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setMargins($value) {
	    $this->setLayoutProperty("margins", $value);
	    return $this;
	}	
	/**
	 * An object containing margins to apply to the region in the format {left: (left margin), top: (top margin), right: (right margin), bottom: (bottom margin)} or a string with the margin values in the format "left top right bottom"
	 * @return mixed
	*/
	public function getMargins() {
	    return $this->getLayoutProperty("margins");
	}
	
	// MinHeight
	/**
	 * The minimum allowable height in pixels for this region (defaults to 50)
	 * @param integer $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setMinHeight($value) {
	    $this->setLayoutProperty("minHeight", $value);
	    return $this;
	}	
	/**
	 * The minimum allowable height in pixels for this region (defaults to 50)
	 * @return integer
	*/
	public function getMinHeight() {
	    return $this->getLayoutProperty("minHeight");
	}
	
	// MinWidth
	/**
	 * The minimum allowable width in pixels for this region (defaults to 50)
	 * @param integer $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setMinWidth($value) {
	    $this->setLayoutProperty("minWidth", $value);
	    return $this;
	}	
	/**
	 * The minimum allowable width in pixels for this region (defaults to 50)
	 * @return integer
	*/
	public function getMinWidth() {
	    return $this->getLayoutProperty("minWidth");
	}
	
	// Region
	/**
	 * The region to render the related component. Posible values are:
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_NORTH}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_WEST}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_CENTER}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_EAST}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_SOUTH}</li>
	 * @param string $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setRegion($value) {
	    $this->setLayoutProperty("region", $value);
	    return $this;
	}	
	/**
	 * The region to render the related component. Posible values are:
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_NORTH}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_WEST}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_CENTER}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_EAST}</li>
	 * <li>{@link PhpExt_Layout_BorderLayoutData::REGION_SOUTH}</li>
	 * @return string
	*/
	public function getRegion() {
	    return $this->getLayoutProperty("region");
	}
	
	
	// Split
	/**
	 * True to display a Ext.SplitBar between this region and its neighbor, allowing the user to resize the regions dynamically (defaults to false). When split = true, it is common to specify a minSize and maxSize for the region.
	 * @param boolean $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setSplit($value) {
	    $this->setLayoutProperty("split", $value);
	    return $this;
	}	
	/**
	 * True to display a Ext.SplitBar between this region and its neighbor, allowing the user to resize the regions dynamically (defaults to false). When split = true, it is common to specify a minSize and maxSize for the region.
	 * @return boolean
	*/
	public function getSplit() {
	    return $this->getLayoutProperty("split");
	}
	
	// SplitTip
	/**
	 * The tooltip to display when the user hovers over a non-collapsible region's split bar (defaults to "Drag to resize."). Only applies if useSplitTips = true.
	 * @param string $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setSplitTip($value) {
	    $this->setLayoutProperty("splitTip", $value);
	    return $this;
	}	
	/**
	 * The tooltip to display when the user hovers over a non-collapsible region's split bar (defaults to "Drag to resize."). Only applies if useSplitTips = true.
	 * @return string
	*/
	public function getSplitTip() {
	    return $this->getLayoutProperty("splitTip");
	}
	
	// UseSplitTips
	/**
	 * True to display a tooltip when the user hovers over a region's split bar (defaults to false). The tooltip text will be the value of either splitTip or collapsibleSplitTip as appropriate.
	 * @param boolean $value 
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public function setUseSplitTips($value) {
	    $this->setLayoutProperty("useSplitTips", $value);
	    return $this;
	}	
	/**
	 * True to display a tooltip when the user hovers over a region's split bar (defaults to false). The tooltip text will be the value of either splitTip or collapsibleSplitTip as appropriate.
	 * @return boolean
	*/
	public function getUseSplitTips() {
	    return $this->getLayoutProperty("useSplitTips");
	}	
	
	/**#@+
	 * Inherited from SpliBar Config Options:
	 * 
	 * The border layout inherits the properties from the splitbar for the regions split element.
	 * 
	 */
    // MaxSize
    /**
     * The maximum size of the resizing element. (Defaults to 2000)
     * @param integer $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setMaxSize($value) {
        $this->setLayoutProperty("maxSize", $value);
        return $this;
    }	
    /**
     * The maximum size of the resizing element. (Defaults to 2000)
     * @return integer
    */
    public function getMaxSize() {
        return $this->getLayoutProperty("maxSize");
    }
    
    // MinSize
    /**
     * The minimum size of the resizing element. (Defaults to 0)
     * @param integer $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setMinSize($value) {
        $this->setLayoutProperty("minSize", $value);
        return $this;
    }	
    /**
     * The minimum size of the resizing element. (Defaults to 0)
     * @return integer
    */
    public function getMinSize() {
        return $this->getLayoutProperty("minSize");
    }
    
    // UseShim
    /**
     * Whether to create a transparent shim that overlays the page when dragging, enables dragging across iframes.
     * @param boolean $value 
     * @return PhpExt_Layout_BorderLayoutData
     */
    public function setUseShim($value) {
        $this->setLayoutProperty("useShim", $value);
        return $this;
    }	
    /**
     * Whether to create a transparent shim that overlays the page when dragging, enables dragging across iframes.
     * @return boolean
    */
    public function getUseShim() {
        return $this->getLayoutProperty("useShim");
    }       

	/**#@-*/
		
	
	public function __construct($region) {
		parent::__construct();		
		
		$this->setRegion($region);
	}

	/**
	 * Creates a region
	 *
	 * @return PhpExt_Layout_BorderLayoutData
	 */
	public static function createNorthRegion() {
	    return new PhpExt_Layout_BorderLayoutData(PhpExt_Layout_BorderLayoutData::REGION_NORTH);
	}
	/**
	 * Creates a region
	 *
	 * @return PhpExt_Layout_BorderLayoutData
	 */
    public static function createWestRegion() {
	    return new PhpExt_Layout_BorderLayoutData(PhpExt_Layout_BorderLayoutData::REGION_WEST);
	}
	/**
	 * Creates a region
	 *
	 * @return PhpExt_Layout_BorderLayoutData
	 */
    public static function createCenterRegion() {
	    return new PhpExt_Layout_BorderLayoutData(PhpExt_Layout_BorderLayoutData::REGION_CENTER);
	}
	/**
	 * Creates a region
	 *
	 * @return PhpExt_Layout_BorderLayoutData
	 */
    public static function createEastRegion() {
	    return new PhpExt_Layout_BorderLayoutData(PhpExt_Layout_BorderLayoutData::REGION_EAST);
	}
	/**
	 * Creates a region
	 *
	 * @return PhpExt_Layout_BorderLayoutData
	 */
    public static function createSouthRegion() {
	    return new PhpExt_Layout_BorderLayoutData(PhpExt_Layout_BorderLayoutData::REGION_SOUTH);
	}
 	
	
}

