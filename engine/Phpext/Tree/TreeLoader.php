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
include_once'PhpExt/Observable.php';

/**
 * A TreeLoader provides for lazy loading of an {@link PhpExt_Tree_TreeNode}'s child nodes from a specified URL. The response must be a JavaScript Array definition whose elements are node definition objects. 
 * eg:
 * <code>
 * [{
 *      id: 1,
 *      text: 'A leaf Node',
 *      leaf: true
 *  },{
 *      id: 2,
 *      text: 'A folder Node',
 *      children: [{
 *          id: 3,
 *          text: 'A child Node',
 *          leaf: true
 *      }]
 * }]
 * </code>
 * 
 * A server request is sent, and child nodes are loaded only when a node is expanded. The loading node's id is passed to the server under the parameter name "node" to enable the server to produce the correct child nodes.
 *
 * To pass extra parameters, an event handler may be attached to the "beforeload" event, and the parameters specified in the TreeLoader's baseParams property:
 * <code> 
 * $loader->attachListener("beforeload", (
 *		    PhpExt_Javascript::functionDef(
 *		        null,
 *		        "treeLoader.baseParams.category = node.attributes.category;",
 *		        array("treeLoader","node") 
 *		    ) 
 *		));
 * </code>
 * This would pass an HTTP parameter called "category" to the server containing the value of the Node's "category" attribute.
 *  
 * @package PhpExt
 * @subpackage Tree
 */
class PhpExt_Tree_TreeLoader extends PhpExt_Observable  
{	
    const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
    
    // BaseAttrs
    /**
     * (optional) An object containing attributes to be added to all nodes created by this loader. If the attributes sent by the server have an attribute in this object, they take priority.
     * @param array $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setBaseAttrs($value) {
        $this->setExtConfigProperty("baseAttrs", $value);
        return $this;
    }	
    /**
     * (optional) An object containing attributes to be added to all nodes created by this loader. If the attributes sent by the server have an attribute in this object, they take priority.
     * @return array
    */
    public function getBaseAttrs() {
        return $this->getExtConfigProperty("baseAttrs");
    }
    
    // BaseParams
    /**
     * (optional) An object containing properties which specify HTTP parameters to be passed to each request for child nodes.
     * @param array $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setBaseParams($value) {
        $this->setExtConfigProperty("baseParams", $value);
        return $this;
    }	
    /**
     * (optional) An object containing properties which specify HTTP parameters to be passed to each request for child nodes.
     * @return array
    */
    public function getBaseParams() {
        return $this->getExtConfigProperty("baseParams");
    }
    
    // ClearOnLoad
    /**
     * (optional) Default to true. Remove previously existing child nodes before loading.
     * @param boolean $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setClearOnLoad($value) {
        $this->setExtConfigProperty("clearOnLoad", $value);
        return $this;
    }	
    /**
     * (optional) Default to true. Remove previously existing child nodes before loading.
     * @return boolean
    */
    public function getClearOnLoad() {
        return $this->getExtConfigProperty("clearOnLoad");
    }
    
    // DataUrl
    /**
     * The URL from which to request a Json string which specifies an array of node definition objects representing the child nodes to be loaded.
     * @param string $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setDataUrl($value) {
        $this->setExtConfigProperty("dataUrl", $value);
        return $this;
    }	
    /**
     * The URL from which to request a Json string which specifies an array of node definition objects representing the child nodes to be loaded.
     * @return string
    */
    public function getDataUrl() {
        return $this->getExtConfigProperty("dataUrl");
    }
    
    // PreloadChildren
    /**
     * If set to true, the loader recursively loads "children" attributes when doing the first load on nodes.
     * @param boolean $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setPreloadChildren($value) {
        $this->setExtConfigProperty("preloadChildren", $value);
        return $this;
    }	
    /**
     * If set to true, the loader recursively loads "children" attributes when doing the first load on nodes.
     * @return boolean
    */
    public function getPreloadChildren() {
        return $this->getExtConfigProperty("preloadChildren");
    }
    
    // RequestMethod
    /**
     * The HTTP request method for loading data (defaults to the value of Ext.Ajax.method).
     * 
     * @see PhpExt_Tree_TreeLoader::METHOD_POST
     * @see PhpExt_Tree_TreeLoader::METHOD_GET 
     * @param string $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setRequestMethod($value) {
        $this->setExtConfigProperty("requestMethod", $value);
        return $this;
    }	
    /**
     * The HTTP request method for loading data (defaults to the value of Ext.Ajax.method).
     * 
     * @see PhpExt_Tree_TreeLoader::METHOD_POST
     * @see PhpExt_Tree_TreeLoader::METHOD_GET
     * @return string
    */
    public function getRequestMethod() {
        return $this->getExtConfigProperty("requestMethod");
    }
    
    // UiProvider
    /**
     * (optional) An object containing properties which specify custom {@link PhpExt_Tree_TreeNodeUI} implementations. If the optional uiProvider attribute of a returned child node is a string rather than a reference to a TreeNodeUI implementation, then that string value is used as a property name in the uiProviders object.
     * @param PhpExt_Tree_TreeNodeUI $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setUiProvider($value) {
        $this->setExtConfigProperty("uiProvider", $value);
        return $this;
    }	
    /**
     * (optional) An object containing properties which specify custom {@link PhpExt_Tree_TreeNodeUI} implementations. If the optional uiProvider attribute of a returned child node is a string rather than a reference to a TreeNodeUI implementation, then that string value is used as a property name in the uiProviders object.
     * @return PhpExt_Tree_TreeNodeUI
    */
    public function getUiProvider() {
        return $this->getExtConfigProperty("uiProvider");
    }
    
    // Url
    /**
     * Equivalent to dataUrl.
     * @param string $value 
     * @return PhpExt_Tree_TreeLoader
     */
    public function setUrl($value) {
        $this->setExtConfigProperty("url", $value);
        return $this;
    }	
    /**
     * Equivalent to dataUrl.
     * @return string
    */
    public function getUrl() {
        return $this->getExtConfigProperty("url");
    }       
    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.tree.TreeLoader", null);
		
		$validProps = array(
		    "baseAttrs",
		    "baseParams",
		    "clearOnLoad",
		    "dataUrl",
		    "preloadChildren",
		    "requestMethod",
		    "uiProviders",
		    "url"
		);
		$this->addValidConfigProperties($validProps);
	}

	/**
	 * Load an {@link PhpExt_Tree_TreeNode} from the URL specified in the constructor. This is called automatically when a node is expanded, but may be used to reload a node (or append new children if the clearOnLoad option is false.)
	 * @param PhpExt_JavascriptStm $node Ext.tree.TreeNode reference
	 * @param Ext.tree.TreeNode $callback Callback function
	 */
	public function load(PhpExt_JavascriptStm $node, PhpExt_JavascriptStm $callback) {
		$args = func_get_args();
		$ms = $this->createMethodSignature("load", $args);
		return $this->getMethodInvokeStm($this->_varName, $ms);
	}
}



