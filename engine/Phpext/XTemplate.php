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
 * @see PhpExt_Template
 */
include_once 'PhpExt/Template.php';
/**
 * A template class that supports advanced functionality like autofilling arrays, conditional processing with basic comparison operators, sub-templates, basic math function support, special built-in template variables, inline code execution and more. XTemplate also provides the templating mechanism built into Ext.DataView.
 * 
 * XTemplate supports many special tags and built-in operators that aren't defined as part of the API, but are supported in the templates that can be created.
 * 
 * @package PhpExt
 */
class PhpExt_XTemplate extends PhpExt_Template {
			
	public function __construct() {
		$args = func_get_args();
		parent::__construct($args);
		$this->setExtClassInfo("Ext.XTemplate",null);	
	}
	
		
}

