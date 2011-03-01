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
 * @see PhpExt_Layout_CardLayoutData 
 */
include_once 'PhpExt/Layout/CardLayoutData.php';


/**
 * Used when using {@link PhpExt_Layout_CardLayout} as the container's layout.	 
 *  
 * @see PhpExt_Layout_CardLayout
 * @see PhpExt_Container::setLayout()
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_TabLayoutData extends PhpExt_Layout_CardLayoutData 
{	
    // Closable
    /**
     * True to allow the tab to be closed
     * @param boolean $value 
     * @return PhpExt_Layout_TabLayoutData
     */
    public function setClosable($value) {
        $this->setLayoutProperty("closable", $value);
        return $this;
    }	
    /**
     * True to allow the tab to be closed
     * @return boolean
    */
    public function getClosable() {
        return $this->getLayoutProperty("closable");
    } 
    
	public function __construct($closable) {
		parent::__construct();	

		$this->setClosable($closable);		
		
	}		
 	
	
}

