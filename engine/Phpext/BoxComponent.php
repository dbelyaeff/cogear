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
 * @see PhpExt_Component
 */
include_once 'PhpExt/Component.php';

/**
 * Base class for any visual PhpExt_Component that uses a box container. 
 * BoxComponent provides automatic box model adjustments for sizing and positioning and will work correctly 
 * within the Component rendering model. All container classes should subclass BoxComponent so that they will 
 * work consistently when nested within other Ext layout containers.
 * @see PhpExt_Component
 * @package PhpExt
 * 
 */
class PhpExt_BoxComponent extends PhpExt_Component 
{
	// AutoHeight
	/**
	 * True to use height:'auto', false to use fixed height (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_BoxComponent
	 */
	public function setAutoHeight($value) {
		$this->setExtConfigProperty("autoHeight", $value);
		return $this;
	}	
	/**
	 * True to use height:'auto', false to use fixed height (defaults to false).
	 * @return boolean
	 */
	public function getAutoHeight() {
		return $this->getExtConfigProperty("autoHeight");
	}
	
	// AutoWidth
	/**
	 * True to use width:'auto', false to use fixed width (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_BoxComponent
	 */
	public function setAutoWidth($value) {
		$this->setExtConfigProperty("autoWidth", $value);
		return $this;
	}	
	/**
	 * True to use width:'auto', false to use fixed width (defaults to false).
	 * @return boolean
	 */
	public function getAutoWidth() {
		return $this->getExtConfigProperty("autoWidth");
	}
	
	// Height
	/**
	 * The height of this component in pixels (defaults to auto).
	 * @param integer $value
	 * @return PhpExt_BoxComponent
	 */
	public function setHeight($value) {
		$this->setExtConfigProperty("height", $value);
		return $this;
	}	
	/**
	 * The height of this component in pixels (defaults to auto).
	 * @return integer
	 */
	public function getHeight() {
		return $this->getExtConfigProperty("height");
	}
	
	// Width
	/**
	 * The width of this component in pixels (defaults to auto).
	 * @param integer $value
	 * @return PhpExt_BoxComponent
	 */
	public function setWidth($value) {
		$this->setExtConfigProperty("width", $value);
		return $this;
	}	
	/**
	 * The width of this component in pixels (defaults to auto).
	 * @return integer
	 */
	public function getWidth() {
		return $this->getExtConfigProperty("width");
	}	
	
	public function __construct() {
		parent::__construct();

		$this->setExtClassInfo("Ext.BoxComponent","box");
		
		$validProps = array(
		    "autoHeight",
		    "autoWidth",
		    "height",
		    "width"
		);
		$this->addValidConfigProperties($validProps);
	}	
		
}

