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
 * @see PhpExt_Observable
 */
include_once 'PhpExt/Observable.php';

/**
 * Represents a tree data structure and bubbles all the events for its nodes. The nodes in the tree have most standard DOM functionality.
 * 
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_Tree extends PhpExt_Observable 
{
	// PathSeparator
	/**
	 * The token used to separate paths in node ids (defaults to '/').
	 * @param string $value 
	 * @return PhpExt_Data_Tree
	 */
	public function setPathSeparator($value) {
	    $this->setExtConfigProperty("pathSeparator", $value);
	    return $this;
	}	
	/**
	 * The token used to separate paths in node ids (defaults to '/').
	 * @return string
	*/
	public function getPathSeparator() {
	    return $this->getExtConfigProperty("pathSeparator");
	}
	
    
	public function __construct() {
		parent::__construct();

		$this->setExtClassInfo("Ext.data.Node", null);
		
		$validProps = array(
		    "pathSeparator"
		);
		$this->addValidConfigProperties($validProps);
		
	}	

	
	
}

