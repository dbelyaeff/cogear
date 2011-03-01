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
 * @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';


/**
 * @package PhpExt
 * @subpackage Config
 */
class PhpExt_Config_ConfigObject extends PhpExt_Object
{	
	var $_options = array();
	
	public function __construct($options = array()) {
		parent::__construct();

		$this->setExtClassInfo("",null);
		
		if (count($options) > 0) {
			$this->addValidConfigProperties(array_keys($options));
			foreach($options as $name=>$value) {
			    $this->setExtConfigProperty($name, $value);
			}
	    }
		
	}	
	
	/*protected function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);				
		foreach($this->_options as $option=>$value) {			
			if ($value !== null)
				$params[] = $this->paramToString($option, $value);
		}		
		
		return $params;
	}*/
	
	public function getJavascript($lazy = false, $varName = null) {
		return parent::getJavascript(true, null);
	}	 		
}

