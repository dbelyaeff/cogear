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
 * @see PhpExt_Form_Field
 */
include_once 'PhpExt/Form/Field.php';

/**
 * A basic hidden field for storing hidden values in forms that need to be passed in the form submit.
 * @package PhpExt
 * @subpackage Form
 */

class PhpExt_Form_Hidden extends PhpExt_Form_Field 
{	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.Hidden","hidden");
	}	 
	
    /**
	 * Helper function to create a Hidden field.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $value A value to initialize this field with.
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @return PhpExt_Form_Hidden
	 */
	public static function createHidden($name, $value = null, $id = null) {
	    $c = new PhpExt_Form_Hidden();
	    $c->setName($name);
	    if ($value !== null)
	      $c->setValue($value);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}
}

