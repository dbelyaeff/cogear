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
 * @see PhpExt_Data_Node
 */
include_once'PhpExt/Data/Node.php';

/**
 *  
 * @package PhpExt
 * @subpackage Tree
 */
class PhpExt_Tree_TreeNode extends PhpExt_Data_Node  
{	
    // AllowChildren
    /**
     * False to not allow this node to have child nodes (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setAllowChildren($value) {
        $this->setExtConfigProperty("allowChildren", $value);
        return $this;
    }	
    /**
     * False to not allow this node to have child nodes (defaults to true)
     * @return boolean
    */
    public function getAllowChildren() {
        return $this->getExtConfigProperty("allowChildren");
    }
    
    // AllowDrag
    /**
     * False to make this node undraggable if draggable = true (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setAllowDrag($value) {
        $this->setExtConfigProperty("allowDrag", $value);
        return $this;
    }	
    /**
     * False to make this node undraggable if draggable = true (defaults to true)
     * @return boolean
    */
    public function getAllowDrag() {
        return $this->getExtConfigProperty("allowDrag");
    }
    
    // AllowDrop
    /**
     * False if this node cannot have child nodes dropped on it (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setAllowDrop($value) {
        $this->setExtConfigProperty("allowDrop", $value);
        return $this;
    }	
    /**
     * False if this node cannot have child nodes dropped on it (defaults to true)
     * @return boolean
    */
    public function getAllowDrop() {
        return $this->getExtConfigProperty("allowDrop");
    }
    
    // Checked
    /**
     * True to render a checked checkbox for this node, false to render an unchecked checkbox (defaults to undefined with no checkbox rendered)
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setChecked($value) {
        $this->setExtConfigProperty("checked", $value);
        return $this;
    }	
    /**
     * True to render a checked checkbox for this node, false to render an unchecked checkbox (defaults to undefined with no checkbox rendered)
     * @return boolean
    */
    public function getChecked() {
        return $this->getExtConfigProperty("checked");
    }
    
    // CssClass
    /**
     * A css class to be added to the node
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setCssClass($value) {
        $this->setExtConfigProperty("cls", $value);
        return $this;
    }	
    /**
     * A css class to be added to the node
     * @return string
    */
    public function getCssClass() {
        return $this->getExtConfigProperty("cls");
    }
    
    // Disabled
    /**
     * true to start the node disabled
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setDisabled($value) {
        $this->setExtConfigProperty("disabled", $value);
        return $this;
    }	
    /**
     * true to start the node disabled
     * @return boolean
    */
    public function getDisabled() {
        return $this->getExtConfigProperty("disabled");
    }
    
    // Draggable
    /**
     * True to make this node draggable (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setDraggable($value) {
        $this->setExtConfigProperty("draggable", $value);
        return $this;
    }	
    /**
     * True to make this node draggable (defaults to false)
     * @return boolean
    */
    public function getDraggable() {
        return $this->getExtConfigProperty("draggable");
    }
    
    // Expandable
    /**
     * If set to true, the node will always show a plus/minus icon, even when empty
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setExpandable($value) {
        $this->setExtConfigProperty("expandable", $value);
        return $this;
    }	
    /**
     * If set to true, the node will always show a plus/minus icon, even when empty
     * @return boolean
    */
    public function getExpandable() {
        return $this->getExtConfigProperty("expandable");
    }
    
    // Expanded
    /**
     * true to start the node expanded
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setExpanded($value) {
        $this->setExtConfigProperty("expanded", $value);
        return $this;
    }	
    /**
     * true to start the node expanded
     * @return boolean
    */
    public function getExpanded() {
        return $this->getExtConfigProperty("expanded");
    }
    
    // Href
    /**
     * URL of the link used for the node (defaults to #)
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setHref($value) {
        $this->setExtConfigProperty("href", $value);
        return $this;
    }	
    /**
     * URL of the link used for the node (defaults to #)
     * @return string
    */
    public function getHref() {
        return $this->getExtConfigProperty("href");
    }
    
    // HrefTarget
    /**
     * target frame for the link
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setHrefTarget($value) {
        $this->setExtConfigProperty("hrefTarget", $value);
        return $this;
    }	
    /**
     * target frame for the link
     * @return string
    */
    public function getHrefTarget() {
        return $this->getExtConfigProperty("hrefTarget");
    }
    
    // Icon
    /**
     * The path to an icon for the node. The preferred way to do this is to use the cls or iconCls attributes and add the icon via a CSS background image.
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setIcon($value) {
        $this->setExtConfigProperty("icon", $value);
        return $this;
    }	
    /**
     * The path to an icon for the node. The preferred way to do this is to use the cls or iconCls attributes and add the icon via a CSS background image.
     * @return string
    */
    public function getIcon() {
        return $this->getExtConfigProperty("icon");
    }
    
    // IconCssClass
    /**
     * A css class to be added to the nodes icon element for applying css background images
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setIconCssClass($value) {
        $this->setExtConfigProperty("iconCls", $value);
        return $this;
    }	
    /**
     * A css class to be added to the nodes icon element for applying css background images
     * @return string
    */
    public function getIconCssClass() {
        return $this->getExtConfigProperty("iconCls");
    }
    
    // IsTarget
    /**
     * False to not allow this node to act as a drop target (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setIsTarget($value) {
        $this->setExtConfigProperty("isTarget", $value);
        return $this;
    }	
    /**
     * False to not allow this node to act as a drop target (defaults to true)
     * @return boolean
    */
    public function getIsTarget() {
        return $this->getExtConfigProperty("isTarget");
    }
    
    // QTip
    /**
     * An Ext QuickTip for the node
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setQTip($value) {
        $this->setExtConfigProperty("qtip", $value);
        return $this;
    }	
    /**
     * An Ext QuickTip for the node
     * @return string
    */
    public function getQTip() {
        return $this->getExtConfigProperty("qtip");
    }
    
    // QuickTipConfig
    /**
     * An Ext QuickTip config for the node (used instead of qtip)
     * @param PhpExt_QuickTip $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setQuickTipConfig($value) {
        $this->setExtConfigProperty("qtipCfg", $value);
        return $this;
    }	
    /**
     * An Ext QuickTip config for the node (used instead of qtip)
     * @return PhpExt_QuickTip
    */
    public function getQuickTipConfig() {
        return $this->getExtConfigProperty("qtipCfg");
    }
    
    // SingleClickExpand
    /**
     * True for single click expand on this node
     * @param boolean $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setSingleClickExpand($value) {
        $this->setExtConfigProperty("singleClickExpand", $value);
        return $this;
    }	
    /**
     * True for single click expand on this node
     * @return boolean
    */
    public function getSingleClickExpand() {
        return $this->getExtConfigProperty("singleClickExpand");
    }
    
    // Text
    /**
     * The text for this node
     * @param string $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setText($value) {
        $this->setExtConfigProperty("text", $value);
        return $this;
    }	
    /**
     * The text for this node
     * @return string
    */
    public function getText() {
        return $this->getExtConfigProperty("text");
    }
    
    // UiProvider
    /**
     * A UI class to use for this node (defaults to Ext.tree.TreeNodeUI)
     * @param PhpExt_Tree_TreeNodeUI $value 
     * @return PhpExt_Tree_TreeNode
     */
    public function setUiProvider($value) {
        $this->setExtConfigProperty("uiProvider", $value);
        return $this;
    }	
    /**
     * A UI class to use for this node (defaults to Ext.tree.TreeNodeUI)
     * @return PhpExt_Tree_TreeNodeUI
    */
    public function getUiProvider() {
        return $this->getExtConfigProperty("uiProvider");
    }    
    
    
    
	public function __construct() {	    
		parent::__construct();
		$this->setExtClassInfo("Ext.tree.TreeNode", null);

		$validProps = array(
		    "allowChildren",
		    "allowDrag",
		    "allowDrop",
		    "checked",
		    "cls",
		    "disabled",
		    "draggable",
		    "expandable",
		    "expanded",
		    "href",
		    "hrefTarget",
		    "icon",
		    "iconCls",
		    "isTarget",
		    "qtip",
		    "qtipCfg",
		    "singleClickExpand",
		    "text",
		    "uiProvider"

		);
		$this->addValidConfigProperties($validProps);
	}		

	/************ METHODS ***************/

    /**
	 * Collapse this node.
	 * @param boolean $deep (optional) True to collapse all children as well
	 * @param boolean $anim (optional) false to cancel the default animation
	 */
    public function collapse($deep = false, $anim = true) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("collapse", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Collapse all child nodes
	 * @param boolean $deep (optional) true if the child nodes should also collapse their child nodes
	 */
    public function collapseChildNodes($deep = false) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("collapseChildNodes", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Disables this node
	 */
    public function disable() {		
		$ms = $this->createMethodSignature("disable");
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Enables this node
	 */
    public function enable() {		
		$ms = $this->createMethodSignature("enable");
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Ensures all parent nodes are expanded, and if necessary, scrolls the node into view.
	 */
    public function ensureVisible() {		
		$ms = $this->createMethodSignature("ensureVisible");
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Expand this node.
	 * @param boolean $deep (optional) True to expand all children as well
	 * @param boolean $anim (optional) false to cancel the default animation
	 * @param PhpExt_Javascript $callback (optional) A callback to be called when expanding this node completes (does not wait for deep expand to complete). Called with 1 parameter, this node.
	 */
    public function expand($deep = false, $anim = true, $callback = null) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("expand", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Expand all child nodes
	 * @param boolean $deep (optional) true if the child nodes should also expand their child nodes
	 */
    public function expandChildNodes($deep = false) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("expandChildNodes", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Triggers selection of this node
	 */
    public function select() {		
		$ms = $this->createMethodSignature("select");
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Toggles expanded/collapsed state of the node
	 */
    public function toggle() {		
		$ms = $this->createMethodSignature("toggle");
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
    /**
	 * Triggers deselection of this node
	 */
    public function unselect() {		
		$ms = $this->createMethodSignature("unselect");
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
}



