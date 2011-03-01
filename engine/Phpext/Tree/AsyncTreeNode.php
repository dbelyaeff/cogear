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
 * @see PhpExt_Tree_TreeNode
 */
include_once'PhpExt/Tree/TreeNode.php';

/**
 * 
 * @package PhpExt
 * @subpackage Tree
 */
class PhpExt_Tree_AsyncTreeNode extends PhpExt_Tree_TreeNode  
{	
    // Loader
    /**
     * A TreeLoader to be used by this node (defaults to the loader defined on the tree)
     * @param PhpExt_Tree_TreeLoader $value 
     * @return PhpExt_Tree_AsyncTreeNode
     */
    public function setLoader($value) {
        $this->setExtConfigProperty("loader", $value);
        return $this;
    }	
    /**
     * A TreeLoader to be used by this node (defaults to the loader defined on the tree)
     * @return PhpExt_Tree_TreeLoader
    */
    public function getLoader() {
        return $this->getExtConfigProperty("loader");
    }
    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.tree.AsyncTreeNode", null);

		$validProps = array(
		    "loader"
		);
		$this->addValidConfigProperties($validProps);
	}				
}



