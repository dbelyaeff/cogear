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
 * Provides attractive and customizable tooltips for any element. The QuickTips singleton is used to configure and manage tooltips globally for multiple elements in a generic manner. To create individual tooltips with maximum customizability, you should consider either Ext.Tip or Ext.ToolTip.
 * <p>Quicktips can be configured via tag attributes directly in markup, or by registering quick tips programmatically via the register method.</p>
 * <p>The singleton's instance of Ext.QuickTip is available via getQuickTip, and supports all the methods, and all the all the configuration properties of Ext.QuickTip. These settings will apply to all tooltips shown by the singleton.<p>
 * @package PhpExt
 */
class PhpExt_QuickTips extends PhpExt_Object {
	
	protected function __construct() {
		parent::__construct();	

		$this->setExtClassInfo("Ext.QuickTips");
	}		
	
	static public function disable() {		
		$mc = PhpExt_Object::createMethodSignature("disable", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}
		
	static public function enable() {		
		$mc = PhpExt_Object::createMethodSignature("enable", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	static public function getQuickTip() {		
		$mc = PhpExt_Object::createMethodSignature("getQuickTip", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	static public function init() {		
		$mc = PhpExt_Object::createMethodSignature("init", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	static public function isEnabled() {		
		$mc = PhpExt_Object::createMethodSignature("isEnabled", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	static public function register() {		
		$mc = PhpExt_Object::createMethodSignature("register", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}	
	
	static public function tips() {		
		$mc = PhpExt_Object::createMethodSignature("tips", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

	static public function unregister() {		
		$mc = PhpExt_Object::createMethodSignature("unregister", array(), true);
		return PhpExt_Object::getMethodInvokeStm("Ext.QuickTips", $mc, true);
	}

}
