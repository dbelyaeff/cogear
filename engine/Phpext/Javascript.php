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
 * @package PhpExt
 */
class PhpExt_Javascript {
	
	private function __construct() {}
	
	/**
	 * Returns a variable name
	 * @param string $functionName The name of the function to create
	 * @param string $functionBody A string with the javascript code for the body of the function
	 * @param array  $functionParams Optional list of parameter names for the function definition
	 * @return JavascriptStm
	 */
	static public function functionDef($functionName, $functionBody, $functionParams = array()) {
		$functionName = ($functionName === null)?"":" ".$functionName;
		if (PhpExt_Javascript::isJavascriptStm($functionBody))
		    $functionBody = $functionBody->output();
		$function = "function$functionName(".implode(",",$functionParams).") {
			$functionBody
		}";
		
		return PhpExt_Javascript::inlineStm($function);
	}	
	/**
	 * Returns a variable name
	 * @param string $varName The name of the variable to retrieve
	 * @return JavascriptStm
	 */
	static public function variable($varName) {
		return PhpExt_Javascript::inlineStm($varName);
	}
	/**
	 * Creates an assignment statement for an existing variable
	 * @param string $varName The name of the assigned variable
	 * @param string $statement Javascript statement code to asign
	 * @return JavascriptStm
	 */
	static public function assign($varName, $statement) {
		return PhpExt_Javascript::stm($varName."=".$statement);
	}
	/**
	 * Creates an assignment statement for an new variable (in the form 'var foo = 1;')
	 * @param string The name of the assigned variable
	 * @param string Javascript statement code to asign 
	 * @return JavascriptStm
	 */
	static public function assignNew($varName, $statement) {
		if (PhpExt_Javascript::isJavascriptStm($statement) 	)
			$stm = $statement->output();
		else
			$stm = $statement;
		return PhpExt_Javascript::stm("var ".$varName."=".$stm);
	}
	
	/**
	 * Creates a javascript statement with a semicolon at the end.
	 * @param string Javascript statement code 
	 * @return JavascriptStm
	 */
	static public function stm($statement) {
		if (PhpExt_Javascript::isJavascriptStm($statement))
			return PhpExt_Javascript::inlineStm($statement->output().";");
		return PhpExt_Javascript::inlineStm($statement.";");
	}
	/**
	 * Creates a javascript statement without a semicolon at the end.
	 * @param string Javascript statement code 
	 * @return JavascriptStm
	 */
	static public function inlineStm($statement) {		
		if (PhpExt_Javascript::isJavascriptStm($statement))
			return $statement;		
		return new PhpExt_JavascriptStm($statement);
	}
	/**
	 * 
	 * @param array Receives indefinite parameters. Each paramenters refers to a string or a <code>JavascriptStm</code>
	 * @return string
	 */
	static public function output() {		
		$statements = func_get_args();
		$evalStms = array();
		foreach($statements as $stm) {					
			if (PhpExt_Javascript::isJavascript($stm) ||
				PhpExt_Javascript::isJavascriptStm($stm)) {				
				$evalStms[] = $stm->output();
				}
			else
				$evalStms[] = $stm;
		}
		$js = implode("\n", $evalStms);
		return $js;
	}
	
	static public function valueToJavascript($value, $lazy = false) {
		$resolvedValue = $value;
		
		if (is_bool($value))
			$resolvedValue = ($value)?"true":"false";
		else if (is_null($value))
			$resolvedValue = null;
		else if (is_string($value))
			$resolvedValue = "'$value'";
		else if (is_array($value))
			$resolvedValue = PhpExt_Javascript::jsonEncode($value);			
		else if (PhpExt_Object::isExtObject($value))
			$resolvedValue = $value->getJavascript($lazy);
		else if (PhpExt_ObjectCollection::isExtObjectCollection($value)) {
			if ($value->getCount() > 0)							
				$resolvedValue = $value->getJavascript($lazy);
		}
		else if (PhpExt_Javascript::isJavascript($value) ||
				PhpExt_Javascript::isJavascriptStm($value)) 
			$resolvedValue = $value->output();
		else if (is_object($value))
			$resolvedValue = PhpExt_Javascript::jsonEncode($value);

		return $resolvedValue;
	}
	
	static public function jsonEncode($value) {		
		static $jsonEncoder;
		if (function_exists("json_encode"))			
			return json_encode($value);
		else {
			if ($jsonEncoder == null) {
			    $DS = DIRECTORY_SEPARATOR;
				include_once('.'.$DS.'Lib'.$DS.'json.php');
				$jsonEncoder = new Services_JSON();
			}			
			return $jsonEncoder->encode($value);		
		}
	}
	
	static public function isJavascript($value) {	
		if (is_object($value)) {
			return ($value instanceof PhpExt_Javascript);				
		}
		return false;
	}
	
	static public function isJavascriptStm($value) {
		if (is_object($value)) {
			return ($value instanceof PhpExt_JavascriptStm);
		}
		return false;
	}
	
	static public function sendContentType() {
		header("Content-type:text/javascript");
	}
}

class PhpExt_JavascriptStm {
	public $Statement = "";
	public function __construct($statement) {
		$this->Statement = $statement;
	}
	public function output() {
		return $this->Statement;
	}
}

