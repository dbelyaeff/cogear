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
 * @see PhpExt_Layout_AnchorLayoutData 
 */
include_once 'PhpExt/Layout/AnchorLayoutData.php';


/**
 * Used when using {@link PhpExt_Layour_AbsoluteLayout} as the container's layout.	 
 *  
 * @see PhpExt_Layour_AbsoluteLayout
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_AbsoluteLayoutData extends PhpExt_Layout_AnchorLayoutData 
{	
    // X
    /**
     * Horizontal absolute position in pixels.
	 * @see PhpExt_Layout_AbsoluteLayout
     * @param integer $value 
     * @return PhpExt_Container
     */
    public function setX($value) {
    	$this->setLayoutProperty("x",$value);
    	return $this;
    }	
    /**
     * Horizontal absolute position in pixels.
     * @see PhpExt_Layout_AbsoluteLayout 
     * @return integer
     */
    public function getX() {
    	return $this->getLayoutProperty("x");
    }
    
    // Y
    /**
     * Vertical absolute position in pixels.
     * @see PhpExt_Layout_AbsoluteLayout
     * @param integer $value 
     * @return PhpExt_Container
     */
    public function setY($value) {
    	$this->setLayoutProperty("y",$value);
    	return $this;
    }	
    /**
     * Vertical absolute position in pixels.
     * @see PhpExt_Layout_AbsoluteLayout
     * @return integer
     */
    public function getY() {
    	return $this->getLayoutProperty("y");
    }    
    
    
	public function __construct($x, $y) {
		parent::__construct();		
		
		$this->setLayoutProperty("x",$anchor);
		$this->setLayoutProperty("y",$anchorSize);
	}		
 	
	
}

