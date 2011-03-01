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
 * @see PhpExt_Editor
 */
include_once 'PhpExt/Editor.php';

/**
 * A base editor field that handles displaying/hiding on demand and has some built-in sizing and event handling logic.
 * 
 * @package PhpExt
 */
class PhpExt_GridEditor extends PhpExt_Editor 
{
    /**
     * 
     *
     * @param PhpExt_Form_Field $field A {@link PhpExt_Form_Field} object (or descendant) to use as editor
     */
	public function __construct($field) {
		parent::__construct($field);
		$this->setExtClassInfo("Ext.grid.GridEditor",null);				
	}
		
}

