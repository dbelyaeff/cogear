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
 * @see PhpExt_Form_TextField
 */
include_once 'PhpExt/Form/TextField.php';

/**
 * @see PhpExt_Config_ConfigObject
 */
include_once 'PhpExt/Config/ConfigObject.php';

/**
 * Password field with masked input
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_PasswordField extends PhpExt_Form_TextField 
{		
	
	public function __construct() {
		parent::__construct();		
		
		$this->setAutoCreate(new PhpExt_Config_ConfigObject(array(
		    'tag'=>'input',
		    'type'=>'password',
		    'size'=>'20',
		    'autocomplete'=>'off')));
		
	}	

    /**
	 * Helper function to create a PassworField.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @return PhpExt_Form_PassworField
	 */
	public static function createPasswordField($name, $label = null, $id = null) {
	    $c = new PhpExt_Form_PasswordField();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}
}

