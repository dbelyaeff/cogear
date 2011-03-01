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
 * A base editor field that handles displaying/hiding on demand and has some built-in sizing and event handling logic.
 * 
 * @package PhpExt
 */
class PhpExt_Editor extends PhpExt_Component 
{
    // Alignment
    /**
     * The position to align to (see Ext.Element.alignTo for more details, defaults to "c-c?").
     * @param string $value 
     * @return PhpExt_Editor
     */
    public function setAlignment($value) {
        $this->setExtConfigProperty("alignment", $value);
        return $this;
    }	
    /**
     * The position to align to (see Ext.Element.alignTo for more details, defaults to "c-c?").
     * @return string
    */
    public function getAlignment() {
        return $this->getExtConfigProperty("alignment");
    }
    
    // AutoSize
    /**
     * True for the editor to automatically adopt the size of the underlying field, "width" to adopt the width only, or "height" to adopt the height only (defaults to false)
     * @param string|boolean $value 
     * @return PhpExt_Editor
     */
    public function setAutoSize($value) {
        $this->setExtConfigProperty("autoSize", $value);
        return $this;
    }	
    /**
     * True for the editor to automatically adopt the size of the underlying field, "width" to adopt the width only, or "height" to adopt the height only (defaults to false)
     * @return string|boolean
    */
    public function getAutoSize() {
        return $this->getExtConfigProperty("autoSize");
    }
    
    // CancelOnEsc
    /**
     * True to cancel the edit when the escape key is pressed (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setCancelOnEsc($value) {
        $this->setExtConfigProperty("cancelOnEsc", $value);
        return $this;
    }	
    /**
     * True to cancel the edit when the escape key is pressed (defaults to false)
     * @return boolean
    */
    public function getCancelOnEsc() {
        return $this->getExtConfigProperty("cancelOnEsc");
    }
    
    // CompleteOnEnter
    /**
     * True to complete the edit when the enter key is pressed (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setCompleteOnEnter($value) {
        $this->setExtConfigProperty("completeOnEnter", $value);
        return $this;
    }	
    /**
     * True to complete the edit when the enter key is pressed (defaults to false)
     * @return boolean
    */
    public function getCompleteOnEnter() {
        return $this->getExtConfigProperty("completeOnEnter");
    }
    
    // Contrain
    /**
     * True to constrain the editor to the viewport
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setContrain($value) {
        $this->setExtConfigProperty("contrain", $value);
        return $this;
    }	
    /**
     * True to constrain the editor to the viewport
     * @return boolean
    */
    public function getContrain() {
        return $this->getExtConfigProperty("contrain");
    }
    
    // HideElement
    /**
     * False to keep the bound element visible while the editor is displayed (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setHideElement($value) {
        $this->setExtConfigProperty("hideEl", $value);
        return $this;
    }	
    /**
     * False to keep the bound element visible while the editor is displayed (defaults to true)
     * @return boolean
    */
    public function getHideElement() {
        return $this->getExtConfigProperty("hideEl");
    }
    
    // IgnoreNoChange
    /**
     * True to skip the the edit completion process (no save, no events fired) if the user completes an edit and the value has not changed (defaults to false). Applies only to string values - edits for other data types will never be ignored.
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setIgnoreNoChange($value) {
        $this->setExtConfigProperty("ignoreNoChange", $value);
        return $this;
    }	
    /**
     * True to skip the the edit completion process (no save, no events fired) if the user completes an edit and the value has not changed (defaults to false). Applies only to string values - edits for other data types will never be ignored.
     * @return boolean
    */
    public function getIgnoreNoChange() {
        return $this->getExtConfigProperty("ignoreNoChange");
    }
    
    // RevertInvalid
    /**
     * True to automatically revert the field value and cancel the edit when the user completes an edit and the field validation fails (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setRevertInvalid($value) {
        $this->setExtConfigProperty("revertInvalid", $value);
        return $this;
    }	
    /**
     * True to automatically revert the field value and cancel the edit when the user completes an edit and the field validation fails (defaults to true)
     * @return boolean
    */
    public function getRevertInvalid() {
        return $this->getExtConfigProperty("revertInvalid");
    }
    
    // Shadow
    /**
     * {@link PhpExt_Shadow::MODE_SIDES} for sides/bottom only, {@link PhpExt_Shadow::MODE_FRAME} for 4-way shadow, and {@link PhpExt_Shadow::MODE_DROP} for bottom-right shadow (defaults to {@link PhpExt_Shadow::MODE_FRAME})
     * @param string $value 
     * @return PhpExt_Editor
     */
    public function setShadow($value) {
        $this->setExtConfigProperty("shadow", $value);
        return $this;
    }	
    /**
     * {@link PhpExt_Shadow::MODE_SIDES} for sides/bottom only, {@link PhpExt_Shadow::MODE_FRAME} for 4-way shadow, and {@link PhpExt_Shadow::MODE_DROP} for bottom-right shadow (defaults to {@link PhpExt_Shadow::MODE_FRAME})
     * @return string
    */
    public function getShadow() {
        return $this->getExtConfigProperty("shadow");
    }
    
    // SwallowKeys
    /**
     * Handle the keydown/keypress events so they don't propagate (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setSwallowKeys($value) {
        $this->setExtConfigProperty("swallowKeys", $value);
        return $this;
    }	
    /**
     * Handle the keydown/keypress events so they don't propagate (defaults to true)
     * @return boolean
    */
    public function getSwallowKeys() {
        return $this->getExtConfigProperty("swallowKeys");
    }
    
    // UpdateElement
    /**
     * True to update the innerHTML of the bound element when the update completes (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Editor
     */
    public function setUpdateElement($value) {
        $this->setExtConfigProperty("updateEl", $value);
        return $this;
    }	
    /**
     * True to update the innerHTML of the bound element when the update completes (defaults to false)
     * @return boolean
    */
    public function getUpdateElement() {
        return $this->getExtConfigProperty("updateEl");
    }
    
    // Value
    /**
     * The data value of the underlying field (defaults to "")
     * @param mixed $value 
     * @return PhpExt_Editor
     */
    public function setValue($value) {
        $this->setExtConfigProperty("value", $value);
        return $this;
    }	
    /**
     * The data value of the underlying field (defaults to "")
     * @return mixed
    */
    public function getValue() {
        return $this->getExtConfigProperty("value");
    }
        
    // Field
    /**
     * @var PhpExt_Form_Field
     */
    protected $_field = null;	
    /**
     * A {@link PhpExt_Form_Field} object (or descendant) to use as editor
     * @return PhpExt_Form_Field
    */
    public function getField() {
        return $this->_field;
    }

    /**
     * @param PhpExt_Form_Field $field A {@link PhpExt_Form_Field} object (or descendant) to use as editor
     */
	public function __construct($field) {
		parent::__construct();
		$this->setExtClassInfo("Ext.Editor","editor");

		$validProps = array(
		    "alignment",
		    "autoSize",
		    "cancelOnEsc",
		    "completeOnEnter",
		    "contrain",
		    "hideEl",
		    "ignoreNoChange",
		    "revertInvalid",
		    "shadow",
		    "swallowKeys",
		    "updateEl",
		    "value"
		);
		$this->addValidConfigProperties($validProps);

		$this->_field = $field;
	}
	
    public function getJavascript($lazy = false, $varName = null) {
	    if ($this->_varName == null) {
			$configParams = $this->getConfigParams($lazy);
					
			$className = $this->_extClassName;		
			$configObj = "{".implode(",",$configParams)."}";
			$field = $this->_field->getJavascript(false);
					
			if ($lazy)
				return $configObj;
			else {
				$js = "new $className($field,$configObj)";
				if ($varName != null) {
					$this->_varName = $varName;
					$js = "var $varName = $js;";
				}
					
				return $js;
		    }
	    } else {
	        return $this->_varName;
	    }
	}
		
}

