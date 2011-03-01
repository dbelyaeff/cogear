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
 * @see PhpExt_Form_Checkbox
 */
include_once 'PhpExt/Form/Checkbox.php';

/**
 * Single radio field. Same as {@link PhpExt_Form_Checkbox}, but provided as a convenience for automatically setting the input type. Radio grouping is handled automatically by the browser if you give each radio in a group the same name.
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_Radio extends PhpExt_Form_Checkbox 
{	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.Radio","radio");
	}	 

    /**
	 * Helper function to create a Radio field.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @return PhpExt_Form_Radio
	 */
	public static function createRadio($name, $label = null, $id = null, $inputValue = null) {
	    $c = new PhpExt_Form_Radio();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
	    if ($inputValue !== null)
	      $c->setInputValue($inputValue);
        return $c;
	}
}

