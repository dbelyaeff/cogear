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
class PhpExt_TreeEditor extends PhpExt_Editor 
{
    /**
     * @var PhpExt_Tree_TreePanel
     */
    protected $_tree;
    
    /**
     * 
     * @param PhpExt_Tree_TreePanel $tree The TreePanel to edit.
     * @param PhpExt_Form_Field $field A {@link PhpExt_Form_Field} object (or descendant) to use as editor
     */
	public function __construct($tree, $field = null) {
		parent::__construct($field);
		$this->setExtClassInfo("Ext.tree.TreeEditor",null);

		$this->_tree = $tree;
	}
	
    public function getJavascript($lazy = false, $varName = null) {
	    if ($this->_varName == null) {
			$configParams = $this->getConfigParams($lazy);
					
			$className = $this->_extClassName;		
			$configObj = "{".implode(",",$configParams)."}";
			$tree = $this->_tree->getJavascript(false);
			if ($this->_field !== null)
			    $field = ",".$this->_field->getJavascript(false);
			else
			    $field = "";
					
			if ($lazy)
				return $configObj;
			else {
				$js = "new $className($tree $field, $configObj)";
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

