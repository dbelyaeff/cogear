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
 * @see PhpExt_Form_Field
 */
include_once 'PhpExt/Form/Field.php';

/**
 * Provides a lightweight HTML Editor component.
 * <p><b>Note: The focus/blur and validation marking functionality inherited from Ext.form.Field is NOT supported by this editor.</b></p>
 * <p>An Editor is a sensitive component that can't be used in all spots standard fields can be used. Putting an Editor within any element that has display set to 'none' can cause problems in Safari and Firefox due to their default iframe reloading bugs.</p>
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_HtmlEditor extends PhpExt_Form_Field 
{	
    // CreateLinkText
    /**
     * The default text for the create link prompt
     * @param string $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setCreateLinkText($value) {
    	$this->setExtConfigProperty("createLinkText", $value);
    	return $this;
    }	
    /**
     * The default text for the create link prompt
     * @return string
     */
    public function getCreateLinkText() {
    	return $this->getExtConfigProperty("createLinkText");
    }
    
    // DefaultLinkValue
    /**
     * The default value for the create link prompt (defaults to http:/ /)
     * @param string $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setDefaultLinkValue($value) {
    	$this->setExtConfigProperty("defaultLinkValue", $value);
    	return $this;
    }	
    /**
     * The default value for the create link prompt (defaults to http:/ /)
     * @return string
     */
    public function getDefaultLinkValue() {
    	return $this->getExtConfigProperty("defaultLinkValue");
    }
    
    // EnableAlignments
    /**
     * Enable the left, center, right alignment buttons (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableAlignments($value) {
    	$this->setExtConfigProperty("enableAlignments", $value);
    	return $this;
    }	
    /**
     * Enable the left, center, right alignment buttons (defaults to true)
     * @return boolean
     */
    public function getEnableAlignments() {
    	return $this->getExtConfigProperty("enableAlignments");
    }
    
    // EnableColors
    /**
     * Enable the fore/highlight color buttons (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableColors($value) {
    	$this->setExtConfigProperty("enableColors", $value);
    	return $this;
    }	
    /**
     * Enable the fore/highlight color buttons (defaults to true)
     * @return boolean
     */
    public function getEnableColors() {
    	return $this->getExtConfigProperty("enableColors");
    }
    
    // EnableFont
    /**
     * Enable font selection. Not available in Safari. (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_Ht
     */
    public function setEnableFont($value) {
    	$this->setExtConfigProperty("enableFont", $value);
    	return $this;
    }	
    /**
     * Enable font selection. Not available in Safari. (defaults to true)
     * @return boolean
     */
    public function getEnableFont() {
    	return $this->getExtConfigProperty("enableFont");
    }
    
    // EnableFontSize
    /**
     * Enable the increase/decrease font size buttons (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableFontSize($value) {
    	$this->setExtConfigProperty("enableFontSize", $value);
    	return $this;
    }	
    /**
     * Enable the increase/decrease font size buttons (defaults to true)
     * @return boolean
     */
    public function getEnableFontSize() {
    	return $this->getExtConfigProperty("enableFontSize");
    }
    
    // EnableFormat
    /**
     * Enable the bold, italic and underline buttons (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableFormat($value) {
    	$this->setExtConfigProperty("enableFormat", $value);
    	return $this;
    }	
    /**
     * Enable the bold, italic and underline buttons (defaults to true)
     * @return boolean
     */
    public function getEnableFormat() {
    	return $this->getExtConfigProperty("enableFormat");
    }
    
    // EnableLinks
    /**
     * Enable the create link button. Not available in Safari. (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableLinks($value) {
    	$this->setExtConfigProperty("enableLinks", $value);
    	return $this;
    }	
    /**
     * Enable the create link button. Not available in Safari. (defaults to true)
     * @return boolean
     */
    public function getEnableLinks() {
    	return $this->getExtConfigProperty("enableLinks");
    }
    
    // EnableLists
    /**
     * Enable the bullet and numbered list buttons. Not available in Safari. (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableLists($value) {
    	$this->setExtConfigProperty("enableLists", $value);
    	return $this;
    }	
    /**
     * Enable the bullet and numbered list buttons. Not available in Safari. (defaults to true)
     * @return boolean
     */
    public function getEnableLists() {
    	return $this->getExtConfigProperty("enableLists");
    }
    
    // EnableSourceEdit
    /**
     * Enable the switch to source edit button. Not available in Safari. (defaults to true)
     * @param boolean $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setEnableSourceEdit($value) {
    	$this->setExtConfigProperty("enableSourceEdit", $value);
    	return $this;
    }	
    /**
     * Enable the switch to source edit button. Not available in Safari. (defaults to true)
     * @return boolean
     */
    public function getEnableSourceEdit() {
    	return $this->getExtConfigProperty("enableSourceEdit");
    }
    
    // FontFamilies
    /**
     * An array of available font families. i.e. array("Arial","Verdana")
     * @param array $value 
     * @return PhpExt_Form_HtmlEditor
     */
    public function setFontFamilies($value) {
    	$this->setExtConfigProperty("fontFamilies", $value);
    	return $this;
    }	
    /**
     * An array of available font families
     * @return array
     */
    public function getFontFamilies() {
    	return $this->getExtConfigProperty("fontFamilies");
    }
    	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.HtmlEditor","htmleditor");
		
		$validProps = array(
		    "createLinkText",
		    "defaultLinkValue",
		    "enableAlignments",
		    "enableColors",
		    "enableFont",
		    "enableFontSize",
		    "enableFormat",
		    "enableLinks",
		    "enableLists",
		    "enableSourceEdit",
		    "fontFamilies"
		);
		$this->addValidConfigProperties($validProps);
	}	 

    /**
	 * Helper function to create an HtmlEditor.  Useful for quick adding it to a ComponentCollection
	 *
	 * @param string $name The field's HTML name attribute.
	 * @param string $label The label text to display next to this field (defaults to '')
	 * @param string $id The unique id of this component (defaults to an auto-assigned id).
	 * @return PhpExt_Form_HtmlEditor
	 */
	public static function createHtmlEditor($name, $label = null, $id = null) {
	    $c = new PhpExt_Form_HtmlEditor();
	    $c->setName($name);
	    if ($label !== null)
	      $c->setFieldLabel($label);
	    if ($id !== null)
	      $c->setId($id);
        return $c;
	}
	
}

