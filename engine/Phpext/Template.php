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
 * Represents an HTML fragment template. Templates can be precompiled for greater performance. For a list of available format functions, see Ext.util.Format.
 * Usage:
 * <code>
 * $t = new PhpExt_Template(
 *  '<div name="{id}">',
 *      '<span class="{cls}">{name:trim} {value:ellipsis(10)}</span>',
 *  '</div>'
 * );
 * echo $t->getJavascript(false, 't');
 * echo $t->append('some-element', array('id'=>'myid', 'cls'=>'myclass', 'name'=>'foo', 'value'=>'bar'))->output();
 * </code>
 * 
 * For more information see this blog post with examples: @link http://php-ext.quimera-solutions.com/examples/?id=/core/templates
 * @package PhpExt
 */
class PhpExt_Template extends PhpExt_Object {
	
    // DisableFormats
    /**
     * True to disable format functions (defaults to false)
     * @param $value boolean
     * @return PhpExt_Template
     *
    public function setDisableFormats($value) {
    	$this->setExtConfigProperty("disableFormats", $value);
    	return $this;
    }	
    /**
     * True to disable format functions (defaults to false)
     * @return boolean
     *
    public function getDisableFormats() {
    	return $this->getExtConfigProperty("disableFormats");
    }
	
    // VariableRegExp
    /**
     * The regular expression used to match template variables
     * @param $value boolean
     * @return PhpExt_Template
     *
    public function setVariableRegExp($value) {
    	$this->setExtConfigProperty("re", $value);
    	return $this;
    }	
    /**
     * The regular expression used to match template variables
     * @return boolean
     *
    public function getVariableRegExp() {
    	return $this->getExtConfigProperty("re");
    }
	*/

	protected $_html = array();
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Template",null);
		
		$args = func_get_args();
		if (count($args) > 0 && is_array($args[0]))
			$this->_html = $args[0];
		else
			$this->_html = $args;		
	}

	public static function from($element, $config) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("from", $args, true);
		return $this->getMethodInvokeStm(null, $mc, true);
	}
	
	/**
	 * Applies the supplied values to the template and appends the new node(s) to el.
	 * @param string $element The context element
	 * @param array  $values The template values. Can be an array if your params are numeric (i.e. {0}) or an object (i.e. {'foo'=> 'bar'})
	 * @param boolean $returnElement (optional) true to return a Ext.Element (defaults to false)
	 */
	public function append($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("append", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Alias for applyTemplate
	 */
	public function apply() {
		$args = func_get_args();
		$mc = $this->createMethodSignature("apply");
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}	
	
	/**
	 * Returns an HTML fragment of this template with the specified values applied.
	 * @param array  $values The template values. Can be an array if your params are numeric (i.e. {0}) or an object (i.e. {'foo'=> 'bar'})
	 */
	public function applyTemplate($values) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("apply", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Compiles the template into an internal function, eliminating the RegEx overhead.
	 */
	public function compile() {
		$args = func_get_args();
		$mc = $this->createMethodSignature("compile");
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Applies the supplied values to the template and inserts the new node(s) after el.
	 * @param string $element The context element
	 * @param array  $values The template values. Can be an array if your params are numeric (i.e. {0}) or an object (i.e. {'foo'=> 'bar'})
	 * @param boolean $returnElement (optional) true to return a Ext.Element (defaults to false)
	 */
	public function insertAfter($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("insertAfter", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Applies the supplied values to the template and inserts the new node(s) before el.
	 * @param string $element The context element
	 * @param array  $values The template values. Can be an array if your params are numeric (i.e. {0}) or an object (i.e. {'foo'=> 'bar'})
	 * @param boolean $returnElement (optional) true to return a Ext.Element (defaults to false)
	 */
	public function insertBefore($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("insertBefore", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Applies the supplied values to the template and inserts the new node(s) as the first child of el.
	 * @param string $element The context element
	 * @param array  $values The template values. Can be an array if your params are numeric (i.e. {0}) or an object (i.e. {'foo'=> 'bar'})
	 * @param boolean $returnElement (optional) true to return a Ext.Element (defaults to false)
	 */
	public function insertFirst($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("insertFirst", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Applies the supplied values to the template and overwrites the content of el with the new node(s).
	 * @param string $element The context element
	 * @param array  $values The template values. Can be an array if your params are numeric (i.e. {0}) or an object (i.e. {'foo'=> 'bar'})
	 * @param boolean $returnElement (optional) true to return a Ext.Element (defaults to false)
	 */
	public function overwrite($element, $values, $returnElement = false) {
		$args = func_get_args();
		$mc = $this->createMethodSignature("overwrite", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	/**
	 * Sets the HTML used as the template and optionally compiles it.
	 * @param string  $html    The HTML template
	 * @param boolean $compile (optional) True to compile the template (defaults to false)
	 */
	public function set($html, $compile = false) {
		$args = func_get_args();
		$mc = $this->addMethodCall("set", $args);
		return $this->getMethodInvokeStm($this->_varName, $mc, true);
	}
	
	public function getJavascript($lazy = false, $varName = null) {
		if ($this->_varName == null) {		
			$html = array();
			foreach($this->_html as $line)
				$html[] = "'$line'";
						
			$js  = "new ".$this->_extClassName."(";
			$js .= implode(",", $html);
			$js .= ")";
			
			if ($varName != null) {
				$this->_varName = $varName;
				$js = "var ".$this->_varName." = $js;";
			}			
			return $js;
		}
		else {
			return $this->_varName;
		}		
	}
		
}

