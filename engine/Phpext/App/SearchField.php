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
 * @see PhpExt_Ext
 */
include_once 'PhpExt/Ext.php';
/**
 * @see PhpExt_Form_TriggerField
 */
include_once 'PhpExt/Form/TriggerField.php';
/**
 * @see PhpExt_Toolbar_IToolbarItem
 */
include_once 'PhpExt/Toolbar/IToolbarItem.php';

/**
 * @package PhpExtUx
 * @subpackage App
 */
class PhpExtUx_App_SearchField extends PhpExt_Form_TriggerField implements PhpExt_Toolbar_IToolbarItem
{	
    // Store
    /**
     * The {@link PhpExt_Data_Store} or any of its children to bind this field.
     * @param PhpExt_Data_Store $value 
     * @return PhpExtUx_App_SearchField
     */
    public function setStore(PhpExt_Data_Store $value) {
    	$this->setExtConfigProperty("store", $value);
    	return $this;
    }	
    /**
     * The {@link PhpExt_Data_Store} or any of its children to bind this field.
     * @return PhpExt_Data_Store
     */
    public function getStore() {
    	return $this->getExtConfigProperty("store");
    }
   
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.app.SearchField",null);

		$validProps = array(
		    "store"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
	public function getJavascript($lazy = false, $varName = null) {		
		return parent::getJavascript(false, $varName);
	}
	


}

?>