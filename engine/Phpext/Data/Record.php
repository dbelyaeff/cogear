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
 * @subpackage Data
 */
class PhpExt_Data_Record extends PhpExt_Object
{
	/** 
	 * @var PhpExt_Data_FieldConfigObjectCollection 
	 */
	public $Fields = null;
	
	public function __construct() {
		parent::__construct();

		$this->setExtClassInfo("Ext.data.Record", null);

		$this->Fields = new PhpExt_ObjectCollection();		
	}	
	
	protected function getConfigParams($lazy = false) {
		$params = parent::getConfigParams();

		if ($this->Fields != null)
			$params[] = $this->paramToString("fields",$this->Fields);
			
		return $params;
	}
	
	public static function create(PhpExt_Data_FieldConfigObjectCollection $fields) {	    
		$mc = PhpExt_Object::createMethodSignature("create", array($fields), true);
		return PhpExt_Object::getMethodInvokeStm('Ext.data.Record', $mc, true);
	}
 	
	
}

