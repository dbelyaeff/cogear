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
 * @see PhpExt_Javascript
 */
include_once 'PhpExt/Javascript.php';

/**
 * @package PhpExt
 */
abstract class PhpExt_Object {
	
	// Ext JS class name	
	protected $_extClassName = "";
	
	protected $_validExtConfigProperties = array();
	protected $_extConfigProperties = array();
	
	protected $_varName = null;			
	
	protected function __construct() {					
	}
	
	protected function setExtClassInfo($extClassName, $xtype) {
		$this->_extClassName = $extClassName;		
	}
	
	protected function addValidConfigProperties($validProperties) {
		$this->_validExtConfigProperties = array_merge($this->_validExtConfigProperties, $validProperties);
	}
	
	protected function setExtConfigProperty($propName, $propValue) {	    
		if (!in_array($propName, $this->_validExtConfigProperties)) {		    
		    //var_export($this->_validExtConfigProperties);
            //var_export($propValue);            
			trigger_error("Property '$propName' is not defined for this object.", E_USER_ERROR);			
		}
		$this->_extConfigProperties[$propName] = $propValue;
	}
	
	public function __set($propName, $propValue) {
		if (!in_array($propName, $this->_validExtConfigProperties))
			trigger_error("Property '$propName' is not explicitly supported by this object.", E_USER_WARNING);
		$this->_extConfigProperties[$propName] = $propValue;
	}
	
	protected function getExtConfigProperty($propName) {
		if (array_key_exists($propName, $this->_extConfigProperties)) {
			return $this->_extConfigProperties[$propName];
		} else {
		    return null;			
		}		
	}
	
	public function __get($propName) {
		if (array_key_exists($propName, $this->_extConfigProperties)) {
			return $this->_extConfigProperties[$propName];
		} else {		    
			trigger_error("Getter not explicitly defined for property '$propName'.", E_USER_WARNING);
			if (array_search($propName, $this->_validExtConfigProperties) !== NULL) {
				return NULL;
			} else {
				trigger_error("Property '$propName' is not a valid property for this object.", E_USER_ERROR);
				return NULL;				
			}
		}
		
	}
	
	public function getJavascript($lazy = false, $varName = null) {
		if ($this->_varName == null) {
			$configParams = $this->getConfigParams($lazy);

			$className = $this->_extClassName;		
			$configObj = "{".implode(",",$configParams)."}";
			
			if ($lazy)
				return $configObj;
			else {
				$js = "new $className($configObj)";
				if ($varName != null) {
					$this->_varName = $varName;
					$js = "var $varName = $js;";
				}					
				return $js;
			}
		}
		else {
			return $this->_varName;
		}
	}	
	
	protected function getConfigParams($lazy = false) {		
		$params = array();
		
		foreach($this->_extConfigProperties as $name=>&$value) {
			if (PhpExt_ObjectCollection::isExtObjectCollection($value)) {
				if ($value->getCount() > 0)
					$params[] = $this->paramToString($name, $value);
			} else if ($value !== NULL) 
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
	
	static public function createMethodSignature($methodName, $params = null, $static = false) {
		$methodSig = array("methodName"=>$methodName, "params"=>$params, "static"=>$static);				
		return $methodSig;
	}	
	
	/**
	 * @return JavascriptStm
	 */
	static public function getMethodInvokeStm($instanceVarName, $methodSignature, $inline = false) {
		$params = array();
		foreach($methodSignature['params'] as $key=>$value)
			$params[$key] = PhpExt_Javascript::valueToJavascript($value);
		if ($methodSignature['static'])
			$js = (isset($this) && isset($this->_extClassName) && $this->_extClassName != null)?$this->_extClassName:$instanceVarName;
		else
			$js = $instanceVarName;				
		$js .= ".".$methodSignature['methodName']."(".implode(",",$params).")";
		return ($inline) ? PhpExt_Javascript::inlineStm($js) : PhpExt_Javascript::stm($js);
	} 
	
	static public function isExtObject($value) {
		if (is_object($value)) {
			return ($value instanceof PhpExt_Object);
		}
		return false;
	}
		
		
}

