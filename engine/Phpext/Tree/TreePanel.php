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
 * @see PhpExt_Panel
 */
include_once 'PhpExt/Panel.php';


/**
 *   
 * The TreePanel provides tree-structured UI representation of tree-structured data.
 *
 * TreeNodes added to the TreePanel may each contain metadata used by your application in their attributes property.
 *
 * <b>A TreePanel must have a root node before it is rendered.</b> This may either be specified using the root config option, or using the setRootNode method. 
 *
 * @package PhpExt
 * @subpackage Tree
 */
class PhpExt_Tree_TreePanel extends PhpExt_Panel 
{
    // Animate
    /**
     * true to enable animated expand/collapse (defaults to the value of Ext.enableFx)
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setAnimate($value) {
        $this->setExtConfigProperty("animate", $value);
        return $this;
    }	
    /**
     * true to enable animated expand/collapse (defaults to the value of Ext.enableFx)
     * @return boolean
    */
    public function getAnimate() {
        return $this->getExtConfigProperty("animate");
    }
    
    // ContainerScroll
    /**
     * true to register this container with ScrollManager
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setContainerScroll($value) {
        $this->setExtConfigProperty("containerScroll", $value);
        return $this;
    }	
    /**
     * true to register this container with ScrollManager
     * @return boolean
    */
    public function getContainerScroll() {
        return $this->getExtConfigProperty("containerScroll");
    }
    
    // DdAppendOnly
    /**
     * True if the tree should only allow append drops (use for trees which are sorted)
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setDdAppendOnly($value) {
        $this->setExtConfigProperty("ddAppendOnly", $value);
        return $this;
    }	
    /**
     * True if the tree should only allow append drops (use for trees which are sorted)
     * @return boolean
    */
    public function getDdAppendOnly() {
        return $this->getExtConfigProperty("ddAppendOnly");
    }
    
    // DdGroup
    /**
     * The DD group this TreePanel belongs to
     * @param string $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setDdGroup($value) {
        $this->setExtConfigProperty("ddGroup", $value);
        return $this;
    }	
    /**
     * The DD group this TreePanel belongs to
     * @return string
    */
    public function getDdGroup() {
        return $this->getExtConfigProperty("ddGroup");
    }
    
    // DdScroll
    /**
     * true to enable body scrolling
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setDdScroll($value) {
        $this->setExtConfigProperty("ddScroll", $value);
        return $this;
    }	
    /**
     * true to enable body scrolling
     * @return boolean
    */
    public function getDdScroll() {
        return $this->getExtConfigProperty("ddScroll");
    }
    
    // TODO: DragConfig
    // TODO: DropConfig

    // EnableDd
    /**
     * true to enable drag and drop
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setEnableDd($value) {
        $this->setExtConfigProperty("enableDD", $value);
        return $this;
    }	
    /**
     * true to enable drag and drop
     * @return boolean
    */
    public function getEnableDd() {
        return $this->getExtConfigProperty("enableDD");
    }
    
    // EnableDrag
    /**
     * true to enable just drag
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setEnableDrag($value) {
        $this->setExtConfigProperty("enableDrag", $value);
        return $this;
    }	
    /**
     * true to enable just drag
     * @return boolean
    */
    public function getEnableDrag() {
        return $this->getExtConfigProperty("enableDrag");
    }
    
    // EnableDrop
    /**
     * true to enable just drop
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setEnableDrop($value) {
        $this->setExtConfigProperty("enableDrop", $value);
        return $this;
    }	
    /**
     * true to enable just drop
     * @return boolean
    */
    public function getEnableDrop() {
        return $this->getExtConfigProperty("enableDrop");
    }
    
    // HighlightColor
    /**
     * The color of the node highlight (defaults to C3DAF9)
     * @param string $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setHighlightColor($value) {
        $this->setExtConfigProperty("hlColor", $value);
        return $this;
    }	
    /**
     * The color of the node highlight (defaults to C3DAF9)
     * @return string
    */
    public function getHighlightColor() {
        return $this->getExtConfigProperty("hlColor");
    }
    
    // HighlightDrop
    /**
     * false to disable node highlight on drop (defaults to the value of Ext.enableFx)
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setHighlightDrop($value) {
        $this->setLayoutProperty("hlDrop", $value);
        return $this;
    }	
    /**
     * false to disable node highlight on drop (defaults to the value of Ext.enableFx)
     * @return boolean
    */
    public function getHighlightDrop() {
        return $this->getLayoutProperty("hlDrop");
    }
    
    // Lines
    /**
     * false to disable tree lines (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setLines($value) {
        $this->setLayoutProperty("lines", $value);
        return $this;
    }	
    /**
     * false to disable tree lines (defaults to true)
     * @return boolean
    */
    public function getLines() {
        return $this->getLayoutProperty("lines");
    }
    
    // Loader
    /**
     * A {@link PhpExt_Tree_TreeLoader} for use with this TreePanel
     * @param PhpExt_Tree_TreeLoader $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setLoader($value) {
        $this->setExtConfigProperty("loader", $value);
        return $this;
    }	
    /**
     * A {@link PhpExt_Tree_TreeLoader} for use with this TreePanel
     * @return PhpExt_Tree_TreeLoader
    */
    public function getLoader() {
        return $this->getExtConfigProperty("loader");
    }
    
    // PathSeparator
    /**
     * The token used to separate sub-paths in path strings (defaults to '/')
     * @param string $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setPathSeparator($value) {
        $this->setExtConfigProperty("pathSeparator", $value);
        return $this;
    }	
    /**
     * The token used to separate sub-paths in path strings (defaults to '/')
     * @return string
    */
    public function getPathSeparator() {
        return $this->getExtConfigProperty("pathSeparator");
    }
    
    // Root
    /**
     * The root node for the tree.
     * @param PhpExt_Tree_TreeNode $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setRoot($value) {
        $this->setExtConfigProperty("root", $value);
        return $this;
    }	
    /**
     * The root node for the tree.
     * @return PhpExt_Tree_TreeNode
    */
    public function getRoot() {
        return $this->getExtConfigProperty("root");
    }
    
    // RootVisible
    /**
     * false to hide the root node (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setRootVisible($value) {
        $this->setExtConfigProperty("rootVisible", $value);
        return $this;
    }	
    /**
     * false to hide the root node (defaults to true)
     * @return boolean
    */
    public function getRootVisible() {
        return $this->getExtConfigProperty("rootVisible");
    }
    
    // SelectionModel
    /**
     * A tree selection model to use with this TreePanel (defaults to a {@link PhpExt_Tree_DefaultSelectionModel})
     * @param PhpExt_Tree_AbstractSelectionModel $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setSelectionModel($value) {
        $this->setExtConfigProperty("selModel", $value);
        return $this;
    }	
    /**
     * A tree selection model to use with this TreePanel (defaults to a {@link PhpExt_Tree_DefaultSelectionModel})
     * @return PhpExt_Tree_AbstractSelectionModel
    */
    public function getSelectionModel() {
        return $this->getExtConfigProperty("selModel");
    }
    
    // SingleExpand
    /**
     * true if only 1 node per branch may be expanded
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setSingleExpand($value) {
        $this->setExtConfigProperty("singleExpand", $value);
        return $this;
    }	
    /**
     * true if only 1 node per branch may be expanded
     * @return boolean
    */
    public function getSingleExpand() {
        return $this->getExtConfigProperty("singleExpand");
    }
    
    // TrackMouseOver
    /**
     * False to disable mouse over highlighting
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setTrackMouseOver($value) {
        $this->setExtConfigProperty("trackMouseOver", $value);
        return $this;
    }	
    /**
     * False to disable mouse over highlighting
     * @return boolean
    */
    public function getTrackMouseOver() {
        return $this->getExtConfigProperty("trackMouseOver");
    }
    
    // UseArrows
    /**
     * True to use Vista-style arrows in the tree (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Tree_TreePanel
     */
    public function setUseArrows($value) {
        $this->setExtConfigProperty("useArrows", $value);
        return $this;
    }	
    /**
     * True to use Vista-style arrows in the tree (defaults to false)
     * @return boolean
    */
    public function getUseArrows() {
        return $this->getExtConfigProperty("useArrows");
    }

    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.tree.TreePanel", "treepanel");
		
		$validProps = array(
		    "animate",
		    "containerScroll",
		    "ddAppendOnly",
		    "ddGroup",
		    "ddScroll",
		    //"dragConfig",
		    //"dropConfig",
            "enableDD",
            "enableDrag",
            "enableDrop",
            "hlColor",
            "hlDrop",
            "lines",
            "loader",
            "pathSeparator",
            "root",
            "selModel",
            "singleExpand",
            "trackMouseOver",
            "useArrows"
		);
		$this->addValidConfigProperties($validProps);
	
	}		
 	
	/*********** METHODS ****************/

	/**
	 * Collapse all nodes
	 */
    public function collapseAll() {
		$args = func_get_args();
		$ms = $this->createMethodSignature("collapseAll", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
	/**
	 * Expand all nodes
	 */
    public function expandAll() {
		$args = func_get_args();
		$ms = $this->createMethodSignature("expandAll", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
	
	/**
	 * Sets the root node for this tree during initialization.
	 * @param PhpExt_Data_Node|PhpExt_Tree_TreeNode|PhpExt_JavascriptStm Node variable reference
	 */
    public function setRootNode($node) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("setRootNode", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
}

