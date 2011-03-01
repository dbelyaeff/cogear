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
 * Used when using {@link PhpExt_Layout_AnchorLayout} as the container's layout.	 
 *  
 * @see PhpExt_Layout_AnchorLayout
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_AnchorLayoutData extends PhpExt_Layout_ContainerLayoutData 
{	
    // Anchor
    /**
     * This value is what tells the layout how the item should be anchored to the container.  The following types of anchor values are supported:
     *
     *   - <b>Percentage:</b> Any value between 1 and 100, expressed as a percentage. The first anchor is the percentage width that the item should take up within the container, and the second is the percentage height. Example: '100% 50%' would render an item the complete width of the container and 1/2 its height. If only one anchor value is supplied it is assumed to be the width value and the height will default to auto.
     *   - <b>Offsets:</b> Any positive or negative integer value. The first anchor is the offset from the right edge of the container, and the second is the offset from the bottom edge. Example: '-50 -100' would render an item the complete width of the container minus 50 pixels and the complete height minus 100 pixels. If only one anchor value is supplied it is assumed to be the right offset value and the bottom offset will default to 0.
     *   - <b>Sides:</b> Valid values are 'right' (or 'r') and 'bottom' (or 'b'). Either the container must have a fixed size or an anchorSize config value defined at render time in order for these to have any effect.
	 *
	 * Anchor values can also be mixed as needed. For example, '-50 75%' would render the width offset from the container right edge by 50 pixels and 75% of the container's height.
	 * @see PhpExt_Layout_AnchorLayout
     * @param string $value 
     * @return PhpExt_Container
     */
    public function setAnchor($value) {
    	$this->setLayoutProperty("anchor",$value);
    	return $this;
    }	
    /**
     * This value is what tells the layout how the item should be anchored to the container.  The following types of anchor values are supported:
     *
     *   - <b>Percentage:</b> Any value between 1 and 100, expressed as a percentage. The first anchor is the percentage width that the item should take up within the container, and the second is the percentage height. Example: '100% 50%' would render an item the complete width of the container and 1/2 its height. If only one anchor value is supplied it is assumed to be the width value and the height will default to auto.
     *   - <b>Offsets:</b> Any positive or negative integer value. The first anchor is the offset from the right edge of the container, and the second is the offset from the bottom edge. Example: '-50 -100' would render an item the complete width of the container minus 50 pixels and the complete height minus 100 pixels. If only one anchor value is supplied it is assumed to be the right offset value and the bottom offset will default to 0.
     *   - <b>Sides:</b> Valid values are 'right' (or 'r') and 'bottom' (or 'b'). Either the container must have a fixed size or an anchorSize config value defined at render time in order for these to have any effect.
	 *
	 * Anchor values can also be mixed as needed. For example, '-50 75%' would render the width offset from the container right edge by 50 pixels and 75% of the container's height.	 
     * @see PhpExt_Layout_AnchorLayout
     * @return string
     */
    public function getAnchor() {
    	return $this->getLayoutProperty("anchor");
    }
    
    // AnchorSize
    /**
     * If anchorSize is specifed, the layout will use it as a virtual container for the purposes of calculating anchor measurements based on it instead, allowing the container to be sized independently of the anchoring logic if necessary.
     * @see PhpExt_Layout_AnchorLayout
     * @param string $value 
     * @return PhpExt_Container
     */
    public function setAnchorSize($value) {
    	$this->setLayoutProperty("anchorSize",$value);
    	return $this;
    }	
    /**
     * If anchorSize is specifed, the layout will use it as a virtual container for the purposes of calculating anchor measurements based on it instead, allowing the container to be sized independently of the anchoring logic if necessary.
     * @see PhpExt_Layout_AnchorLayout
     * @return string
     */
    public function getAnchorSize() {
    	return $this->getLayoutProperty("anchorSize");
    }    
    
    
	public function __construct($anchor = null, $anchorSize = null) {
		parent::__construct();		
		
		$this->setLayoutProperty("anchor",$anchor);
		$this->setLayoutProperty("anchorSize",$anchorSize);
	}		
 	
	
}

