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
 *  @see PhpExt_Javascript
 */
include_once 'PhpExt/Javascript.php';
/**
 *  @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';

/**
 * Simple class that can provide a shadow effect for any element. Note that the element MUST be absolutely positioned, and the shadow does not provide any shimming. This should be used only in simple cases -- for more advanced functionality that can also provide the same shadow effect, see the Ext.Layer class.
 * @package PhpExt
 */
class PhpExt_Shadow extends PhpExt_Object  {
	
    const MODE_SIDES = 'sides';
    const MODE_FRAME = 'frame';
    const MODE_DROP = 'drop';
    
    // Mode
    /**
     * The shadow display mode. Supports the following options:
     * PhpExt_Shadow::MODE_SIDES: Shadow displays on both sides and bottom only
     * PhpExt_Shadow::MODE_FRAME: Shadow displays equally on all four sides
     * PhpExt_Shadow::MODE_DROP: Traditional bottom-right drop shadow (default)
     * @param string $value
     * @return PhpExt_Shadow
     */
    public function setMode($value) {
    	$this->setExtConfigProperty("mode", $value);
    	return $this;
    }	
    /**
     * The shadow display mode. Supports the following options:
     * PhpExt_Shadow::MODE_SIDES: Shadow displays on both sides and bottom only
     * PhpExt_Shadow::MODE_FRAME: Shadow displays equally on all four sides
     * PhpExt_Shadow::MODE_DROP: Traditional bottom-right drop shadow (default)
     * @return string
     */
    public function getMode() {
    	return $this->getExtConfigProperty("mode");
    }
    
    // Offset
    /**
     * The number of pixels to offset the shadow from the element (defaults to 4)
     * @param integer $value
     * @return PhpExt_Shadow
     */
    public function setOffset($value) {
    	$this->setExtConfigProperty("offset", $value);
    	return $this;
    }	
    /**
     * The number of pixels to offset the shadow from the element (defaults to 4)
     * @return integer
     */
    public function getOffset() {
    	return $this->getExtConfigProperty("offset");
    }
    
	public function __construct() {
	    parent::__construct();

	    $this->setExtClassInfo("Ext.Shadow");
	}
	
	
}

