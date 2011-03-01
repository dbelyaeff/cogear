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
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_Node extends PhpExt_Observable 
{
	// Id
	/**
	 * The id for this node. If one is not specified, one is generated.
	 * @param string $value 
	 * @return PhpExt_Data_Node
	 */
	public function setId($value) {
	    $this->setExtConfigProperty("id", $value);
	    return $this;
	}	
	/**
	 * The id for this node. If one is not specified, one is generated.
	 * @return string
	*/
	public function getId() {
	    return $this->getExtConfigProperty("id");
	}
	
	// Leaf
	/**
	 * true if this node is a leaf and does not have children
	 * @param boolean $value 
	 * @return PhpExt_Data_Node
	 */
	public function setLeaf($value) {
	    $this->setExtConfigProperty("leaf", $value);
	    return $this;
	}	
	/**
	 * true if this node is a leaf and does not have children
	 * @return boolean
	*/
	public function getLeaf() {
	    return $this->getExtConfigProperty("leaf");
	}
    
	public function __construct() {
		parent::__construct();

		$this->setExtClassInfo("Ext.data.Node", null);
		
		$validProps = array(
		    "id",
		    "leaf"
		);
		$this->addValidConfigProperties($validProps);
		
	}	

	
}

