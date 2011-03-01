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
 * @see PhpExt_Config_ConfigObject 
 */
include_once 'PhpExt/Config/ConfigObject.php';


/**
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_ContainerLayoutData 
{	
    protected $_layoutProperties = array();
            
    protected function addLayoutProperties(array $props) {
        $this->_layoutProperties = array_merge($this->_layoutProperties, $props);
    }
    
    protected function setLayoutProperty($name, $value) {
        $this->_layoutProperties[$name] = $value;
    }
    
    protected function getLayoutProperty($name) {
        return $this->_layoutProperties[$name];
    }
    
	public function __construct() {				
	}		
	
	/**
	 * 
	 *
	 * @return array
	 */
    public function getConfigParams() {		
		$params = array();
		
		foreach($this->_layoutProperties as $name=>&$value) {
			if (PhpExt_ObjectCollection::isExtObjectCollection($value)) {
				if ($value->getCount() > 0)
					$params[] = $this->paramToString($name, $value);
			} else if ($value != NULL) 
				$params[] = $this->paramToString($name, $value);
		}
			
		return $params;
	}
	
    protected function paramToString($name, $value) {
		$resolvedValue = PhpExt_Javascript::valueToJavascript($value);		

		if (strpos($name,"-") !== false)
			$name = "\"$name\"";		
		
		return "$name: $resolvedValue";
	}
 	
	
}

