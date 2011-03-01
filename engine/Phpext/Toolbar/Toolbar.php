<?php
/**
 * PHP-Ext Library
 * http://php-ext.googlecode.com
 * @author Sergei Walter <sergeiw[at]gmail[dot]com>
 * @copyright 2008 Sergei Walter
 * @license http://www.gnu.org/licenses/lgpl.html
 * @link http://php-ext.googlecode.com
 * 
 * Reference for Ex JS: http://extjs.com
 * 
 */

/**
 * @see PhpExt_BoxComponent
 */
include_once 'PhpExt/BoxComponent.php';
/**
 * @see PhpExt_Toolbar_IToolbarItemCollection
 */
include_once 'PhpExt/Toolbar/IToolbarItemCollection.php';


/**
 * Basic Toolbar class.
 * @package PhpExt
 * @subpackage Toolbar
 */
class PhpExt_Toolbar_Toolbar extends PhpExt_BoxComponent  
{
	/**
	 * Object Collection
	 *
	 * @var PhpExt_Toolbar_IToolbarItemCollection
	 */
	protected $_items = null;
	// Items

	/**
	 * 
	 * @return PhpExt_Toolbar_IToolbarItemCollection
	 */
	public function getItems() {
		return $this->getExtConfigProperty("items");
	}
	
	
		
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Toolbar", "toolbar");
	
		$validProps = array(
		    "items"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->_items = new PhpExt_Toolbar_IToolbarItemCollection();
		$this->_items->setForceArray(true);
		$this->setExtConfigProperty("items", $this->_items);
	}
	
	/**
	 * Helper function to quick add a separator
	 *
	 * @param string $key
	 * @return PhpExt_Toolbar_Toolbar
	 */
	public function addSeparator($key) {
		include_once 'PhpExt/Toolbar/Separator.php';
		$this->_items->add(new PhpExt_Toolbar_Separator(), $key);
		return $this->_items->getByName($key);
	}
	
	/**
	 * Helper function to quick add a spacer
	 *
	 * @param string $key
	 * @return PhpExt_Toolbar_Spacer
	 */
	public function addSpacer($key) {
		include_once 'PhpExt/Toolbar/Spacer.php';
		$this->_items->add(new PhpExt_Toolbar_Spacer(), $key);
		return $this->_items->getByName($key);
	}
	
	/**
	 * Helper function to quick add a fill
	 *
	 * @param string $key
	 * @return PhpExt_Toolbar_Fill
	 */
	public function addFill($key) {
		include_once 'PhpExt/Toolbar/Fill.php';
		$this->_items->add(new PhpExt_Toolbar_Fill(), $key);
		return $this->_items->getByName($key);
	}
	
	/**
	 * Helper function to quick add a textitem
	 *
	 * @param string $key
	 * @param string $text The text to show in the item
	 * @return PhpExt_Toolbar_TextItem
	 */
	public function addTextItem($key, $text) {
		include_once 'PhpExt/Toolbar/TextItem.php';
		$this->_items->add(new PhpExt_Toolbar_TextItem($text), $key);;
		return $this->_items->getByName($key);
	}
	
	/**
	 * Helper function to quick add a button
	 *
	 * @param string $key
	 * @param string $text The text to show in the button
	 * @param string $iconUrl The URL of and image to show as button's icon
	 * @return PhpExt_Toolbar_Button
	 */
	public function addButton($key, $text, $iconUrl = null, $handler = null) {
		include_once 'PhpExt/Toolbar/Button.php';
		$this->_items->add(PhpExt_Toolbar_Button::createButton($text, $iconUrl, $handler), $key);
		return $this->_items->getByName($key);
	}
	
	/**
	 * Helper function to quick add a item
	 *
	 * @param string $key
	 * @param string $item
	 * @return PhpExt_Toolbar_Item
	 */
	public function addItem($key, &$item) {
		$this->_items->add($item, $key);
		return $item;
	}
	
	var $_mustRender = false;
	/**
	 * True to render the toolbar even if it does not have items.
	 *
	 * @return boolean
	 */
	public function getMustRender() {
	    return $this->_mustRender;
	}
	
	/**
	 * True to render the toolbar even if it does not have items
	 *
	 * @param boolean $mustRender
	 */
	public function setMustRender($mustRender) {
	    $this->_mustRender = $mustRender;
	}
	
	
	public function removeItem($key) {
		$this->_items->removeObject($key);
	}
	
	public function &getItem($key) {
		return $this->_items->getByName($key);
	}

	/*protected function getConfigParams($lazy = false) {
		$params = parent::getConfigParams($lazy);
		
		// Items
		if ($this->_items->getCount() > 0) {
			$this->_items->ForceArray = true;
			$params[] = $this->paramToString("items", $this->Items);			
		}		
							
		return $params;
	}*/
 		
}

