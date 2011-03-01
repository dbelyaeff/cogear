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
 * Used when using {@link PhpExt_Layout_ColumnLayoutData} as the container's layout.	 
 *  
 * @see PhpExt_Layout_ColumnLayoutData
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_ColumnLayoutData extends PhpExt_Layout_ContainerLayoutData 
{	
    // ColumnWidth
    /**
     * The layout will use the width (if pixels) or columnWidth (if percent) of each panel during layout to determine how to size each panel. If width or columnWidth is not specified for a given panel, its width will default to the panel's width (or auto).
	 *
	 * The width property is always evaluated as pixels, and must be a number greater than or equal to 1. The columnWidth property is always evaluated as a percentage, and must be a decimal value greater than 0 and less than 1 (e.g., .25).
	 * @see PhpExt_Layout_ColumnLayoutData
     * @param float $value 
     * @return PhpExt_Container
     */
    public function setColumnWidth($value) {
    	$this->setLayoutProperty("columnWidth", $value);
    	return $this;
    }	
    /**
     * The layout will use the width (if pixels) or columnWidth (if percent) of each panel during layout to determine how to size each panel. If width or columnWidth is not specified for a given panel, its width will default to the panel's width (or auto).
	 *
	 * The width property is always evaluated as pixels, and must be a number greater than or equal to 1. The columnWidth property is always evaluated as a percentage, and must be a decimal value greater than 0 and less than 1 (e.g., .25).
	 * @see PhpExt_Layout_ColumnLayoutData
     * @return float
     */
    public function getColumnWidth() {
    	return $this->getLayoutProperty("columnWidth");
    }
    
    /**
     * The layout will use the width (if pixels) or columnWidth (if percent) of each panel during layout to determine how to size each panel. If width or columnWidth is not specified for a given panel, its width will default to the panel's width (or auto).
	 *
	 * The width property is always evaluated as pixels, and must be a number greater than or equal to 1. The columnWidth property is always evaluated as a percentage, and must be a decimal value greater than 0 and less than 1 (e.g., .25).
	 * @param float|integer $columnWidth float for percentage and int for absolute
     */ 
	public function __construct($columnWidth) {
		parent::__construct();		
		
		$this->setLayoutProperty("columnWidth",$columnWidth);		
		
	}		
 	
	
}

