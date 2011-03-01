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
 * @package PhpExt
 */
class PhpExt_Handler extends PhpExt_JavascriptStm {
	protected $_statements = array();
	protected $_rendered = false;
	public function __construct() {
		$this->_statements = func_get_args();		
	}
	
	public function output() {
		$stack = array();
		foreach($this->_statements as $line)
			$stack[] = PhpExt_Javascript::valueToJavascript($line);
		
		$js  = "function(){\n";		
		$js .= implode("\n", $stack);		
		$js .= "}";
		return $js;
	}
}

