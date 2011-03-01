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
 * @see PhpExt_Data_XmlReader
 */
include_once 'PhpExt/Data/XmlReader.php';

/**
 * @package PhpExtUx
 * @subpackage Form
 */
class PhpExtUx_Form_XmlErrorReader extends PhpExt_Data_XmlReader 
{    	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.XmlErrorReader", null);				
	}	

}

?>