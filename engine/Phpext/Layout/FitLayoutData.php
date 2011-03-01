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
 * Used when using {@link PhpExt_Layout_FitLayout} as the container's layout.	 
 *  
 * @see PhpExt_Layout_FitLayout
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_FitLayoutData extends PhpExt_Layout_ContainerLayoutData 
{	
    
	public function __construct() {
		parent::__construct();		
		
		
	}		
 	
	
}

