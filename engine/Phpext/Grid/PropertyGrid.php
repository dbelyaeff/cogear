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
 * @see PhpExt_Grid_EditorGridPanel
 */
include_once 'PhpExt/Grid/EditorGridPanel.php';

/**
 * @see PhpExt_Grid_GridEditorCollection
 */
include_once 'PhpExt/Grid/GridEditorCollection.php';

/**
 * A specialized grid implementation intended to mimic the traditional property grid as typically seen in development IDEs. Each row in the grid represents a property of some object, and the data is stored as a set of name/value pairs in {@link PhpExt_Grid _PropertyRecord}.
 * 
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_PropertyGrid extends PhpExt_Grid_EditorGridPanel 
{
    // CustomEditors
    /**
     * @var PhpExt_Grid_GridEditorCollection
     */
    protected $_customEditors = null;	
    /**
     * An object containing name/value pairs of custom editor type definitions that allow the grid to support additional types of editable fields. By default, the grid supports strongly-typed editing of strings, dates, numbers and booleans using built-in form editors, but any custom type can be supported and associated with a custom input control by specifying a custom editor. The name of the editor type should correspond with the name of the property that will use the editor.
     * @return PhpExt_Grid_GridEditorCollection
    */
    public function getCustomEditors() {
        return $this->_customEditors;
    }
    
    // Source
    /**
     * A data object to use as the data source of the grid (see setSource for details). Example:
     * <code>
     * $propgrid->setSource(array("name"=>"Textbox1","value=>"Value1"));
     * or
     * $propgrid->setSource(PhpExt_Javascript::variable("myObj"));
     * </code>
     * @param array $value 
     * @return PhpExt_Grid_PropertyGrid
     */
    public function setSource($value) {
        $this->setExtConfigProperty("source", $value);
        return $this;
    }	
    /**
     * A data object to use as the data source of the grid (see setSource for details). Example:
     * <code>
     * $propgrid->setSource(array("name"=>"Textbox1","value=>"Value1"));
     * or
     * $propgrid->setSource(PhpExt_Javascript::variable("myObj"));
     * </code>
     * @return array
    */
    public function getSource() {
        return $this->getExtConfigProperty("source");
    }    
        
    
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.PropertyGrid", "propertygrid");
	
		$validProps = array(
		    "customEditors",
		    "source"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->_customEditors = new PhpExt_Grid_GridEditorCollection();
				
	}

    protected function getConfigParams($lazy = false) {        
		if ($this->_customEditors->getCount() > 0)
		    $this->setExtConfigProperty("customEditors", $this->_customEditors);
		
		return parent::getConfigParams($lazy);
	}
	
	public function getJavascript($lazy = false, $varName = null) {
	    return parent::getJavascript(false, $varName);
	}
	
	
 	
	
}

