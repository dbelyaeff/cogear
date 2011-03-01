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
 *  @see PhpExt_Javascript
 */
include_once 'PhpExt/Javascript.php';
/**
 *  @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';

/**
 * Every layout is composed of one or more Ext.Container elements internally, and ContainerLayout provides the basic foundation for all other layout classes in Ext. 
 * It is a non-visual class that simply provides the base logic required for a Container to function as a layout. This class is intended to be extended and should generally not need to be created directly via the new keyword.
 * @package PhpExt
 * @subpackage Layout
 */
class PhpExt_Layout_ContainerLayout extends PhpExt_Object  {
	
    const LAYOUT_DEFAULT = null;
    const LAYOUT_ABSOLUTE = 'absolute';
	const LAYOUT_ACCORDION = 'accordion';
	const LAYOUT_ANCHOR = 'anchor';
	const LAYOUT_BORDER = 'border';
	const LAYOUT_CARD = 'card';
	const LAYOUT_COLUMN = 'column';
	const LAYOUT_FIT = 'fit';
	const LAYOUT_FORM = 'form';
	const LAYOUT_TABLE = 'table';
	const LAYOUT_TAB = 'card';
    
    /**
     * An array containing the layout specific valid property names
     *
     * @var array
     */
    private $_layoutProperties = array();
    
    /**
     * Adds the layout specific valid properties
     * @param array $validProps An array containing the layout specific valid property names
     */
    protected function addValidLayoutProperties(array $validProps) {
        $this->_layoutProperties = array_merge($this->_layoutProperties, $validProps);
    }
    
    /**
     * Gets the layout specific valid properties
     * @return An array containing the layout specific valid property names
     */
    public function getValidLayoutProperties() {
        return $this->_layoutProperties;                
    }
        
    // ExtraCssClass
    /**
     * An optional extra CSS class that will be added to the container (defaults to ''). This can be useful for adding customized styles to the container or any of its children using standard CSS rules.
     * @param string $value 
     * @return PhpExt_Layout_ContainerLayout
     */
    public function setExtraCssClass($value) {
    	$this->setExtConfigProperty("extraCls", $value);
    	return $this;
    }	
    /**
     * An optional extra CSS class that will be added to the container (defaults to ''). This can be useful for adding customized styles to the container or any of its children using standard CSS rules.
     * @return string
     */
    public function getExtraCssClass() {
    	return $this->getExtConfigProperty("extraCls");
    }
    
    // RenderHidden
    /**
     * True to hide each contained item on render (defaults to false).
     * @param boolean $value 
     * @return PhpExt_Layout_ContainerLayout
     */
    public function setRenderHidden($value) {
    	$this->setExtConfigProperty("renderHidden", $value);
    	return $this;
    }	
    /**
     * True to hide each contained item on render (defaults to false).
     * @return boolean
     */
    public function getRenderHidden() {
    	return $this->getExtConfigProperty("renderHidden");
    }
    
        
    
    // Valid LayoutData ClassNames
    protected $_validLayoutDataClassNames = array();
    
    public function getValidLayoutDataClassNames() {
        return $this->_validLayoutDataClassNames;
    }
    
    protected function addValidLayoutDataClassName($className) {
        $this->_validLayoutDataClassNames[] = $className;
    }
    
    /**
     * Returns the internal config string for the layout.
     * 
     * @see PhpExt_Layout_ContainerLayout::LAYOUT_DEFAULT;
     * @return string 
     */
    public function getLayoutKey() {
        return PhpExt_Layout_ContainerLayout::LAYOUT_DEFAULT;
    }
    
	public function __construct() {
	    parent::__construct();
	    $this->setExtClassInfo("Ext.layout.ContainerLayout", null);
	    
	    $validProps = array(
	        "extraCls",
	        "renderHidden"
	    );
	    $this->addValidConfigProperties($validProps);

	    $this->addValidLayoutDataClassName("PhpExt_Layout_ContainerLayoutData");
	}
	
	
}

