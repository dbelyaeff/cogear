<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ex JS: http://extjs.com
 * 
 */

/**
 * @see PhpExt_Toolbar_Item
 */
include_once 'PhpExt/Toolbar/Item.php';

/**
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_TextItem extends PhpExt_Toolbar_Item    
{		
    // Text
    protected $_text;
    /**
     * 
     * @param boolean $value 
     * @return PhpExt_Toolbar_TextItem
     */
    public function setText($value) {
    	$this->_text = $value;
    	return $this;
    }	
    /**
     * 
     * @return boolean
     */
    public function getText() {
    	return $this->_text;
    }	
	
	public function __construct($text) {
		parent::__construct();
		$this->setExtClassInfo("Ext.Toolbar.TextItem", "tbtext");

		$this->_text = $text;
	}	
	
	public function getJavascript($lazy = false, $varName = null) {
	    if ($this->_varName == null) {					
			$className = $this->_extClassName;		
			$configObj = "";		
			if ($lazy)
				return "'".$this->_text."'";
			else {
				$js = "new $className('".$this->_text."')";
				if ($varName != null) {
					$this->_varName = $varName;
					$js = "var $varName = $js;";
				}		
				return $js;
		    }
	    } else {
	        return $this->_varName;
	    }
	    
	}
 		
}

