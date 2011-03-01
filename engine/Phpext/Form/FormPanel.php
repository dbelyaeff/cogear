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
 * @see PhpExt_Layout_FormLayout
 */
include_once 'PhpExt/Layout/FormLayout.php';

/**
 * Standard form container.
 * <p><b>Although they are not listed, this class also accepts all the config options required to configure its internal Ext.form.BasicForm</b></p>
 * <p>FormPanel uses a Ext.layout.FormLayout internally, and that is required for fields and labels to work correctly within the FormPanel's layout. To nest additional layout styles within a FormPanel, you should nest additional Panels or other containers that can provide additional layout functionality. You should not override FormPanel's layout.</p>
 * <p>By default, Ext Forms are submitted through Ajax, using Ext.form.Action. To enable normal browser submission of the Ext Form contained in this FormPanel, use the StandardSubmit property.
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_FormPanel extends PhpExt_Panel 
{	
    /**
     * Display a quick tip when the user hovers over the field
     *
     */
	const MSG_TARGET_QTIP = 'qtip';
	/**
	 * Display a default browser title attribute popup
	 *
	 */
	const MSG_TARGET_TITLE = 'title';
	/**
	 * Add a block div beneath the field containing the error text
	 */
	const MSG_TARGET_UNDER = 'under';
	/**
	 * Add an error icon to the right of the field with a popup on hover
	 */
	const MSG_TARGET_SIDE = 'side';

	const LABEL_ALIGN_LEFT = 'left';
	const LABEL_ALIGN_TOP = 'top';
	const LABEL_ALIGN_RIGHT = 'right';

	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';

	const VTYPE_ALPHAMASK = 'alpha';
	const VTYPE_ALPHANUM = 'alphanum';
	const VTYPE_EMAIL = 'email';
	const VTYPE_URL = 'url';


	
	// ButtonAlign
	/**
	 * The alignment of any buttons added to this panel. Valid values are:
	 * - PhpExt_Ext::EXT_HALIGN_LEFT	  
	 * - PhpExt_Ext::EXT_HALIGN_RIGHT
	 * - PhpExt_Ext::EXT_HALIGN_CENTER
	 * Defaults to PhpExt_Ext::EXT_HALIGN_CENTER
	 * 
	 * @uses PhpExt_Ext::EXT_HALIGN_LEFT	  
	 * @uses PhpExt_Ext::EXT_HALIGN_RIGHT
	 * @uses PhpExt_Ext::EXT_HALIGN_CENTER
	 * @param string $value
	 * @return PhpExt_Form_FormPanel
	 */
	public function setButtonAlign($value) {
		return parent::setButtonAlign($value);
	}	
	/**
	 * 
	 * @return string
	 */
	public function getButtonAlign() {
		return parent::getButtonAlign();
	}
	
	// ItemCssClass
	/**
	 * A css class to apply to the x-form-item of fields. This property cascades to child containers.
	 * @param string $value 
	 * @return PhpExt_Form_FormPanel
	 */
	public function setItemCssClass($value) {
		$this->setExtConfigProperty("itemCls", $value);
		return $this;
	}	
	/**
	 * A css class to apply to the x-form-item of fields. This property cascades to child containers.
	 * @return string
	 */
	public function getItemCssClass() {
		return $this->getExtConfigProperty("itemCls");
	}
	
	// LabelAlign
	/**
	 * The alignment for the child controls' labels. Valid values are:
	 * - PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT	  
	 * - PhpExt_Form_FormPanel::LABEL_ALIGN_TOP
	 * - PhpExt_Form_FormPanel::LABEL_ALIGN_RIGHT
	 * Defaults to PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT.
	 * This property cascades to child containers if not set.
	 *  
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_LEFT	  
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_TOP
	 * @uses PhpExt_Form_FormPanel::LABEL_ALIGN_RIGHT	 
	 * @param string $value 
	 * @return PhpExt_Form_FormPanel
	 */
	public function setLabelAlign($value) {
		$this->setExtConfigProperty("labelAlign", $value);
		return $this;
	}	
	/**
	 * 
	 * @return string
	 */
	public function getLabelAlign() {
		return $this->getExtConfigProperty("labelAlign");
	}
	
    // LabelWidth
    /**
     * The width of labels. This property cascades to child containers.
     * @param integer $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setLabelWidth($value) {
    	$this->setExtConfigProperty("labelWidth", $value);
    	return $this;
    }	
    /**
     * The width of labels. This property cascades to child containers.
     * @return integer
     */
    public function getLabelWidth() {
    	return $this->getExtConfigProperty("labelWidth");
    }
	
    // MinButtonWidth
    /**
     * Minimum width of all buttons in pixels (defaults to 75)
     * @param integer $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setMinButtonWidth($value) {
    	$this->setExtConfigProperty("minButtonWidth", $value);
    	return $this;
    }	
    /**
     * Minimum width of all buttons in pixels (defaults to 75)
     * @return integer
     */
    public function getMinButtonWidth() {
    	return $this->getExtConfigProperty("minButtonWidth");
    }
    
    // MonitorPoll
    /**
     * The milliseconds to poll valid state, ignored if monitorValid is not true (defaults to 200)
     * @param integer $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setMonitorPoll($value) {
    	$this->setExtConfigProperty("monitorPoll", $value);
    	return $this;
    }	
    /**
     * The milliseconds to poll valid state, ignored if monitorValid is not true (defaults to 200)
     * @return integer
     */
    public function getMonitorPoll() {
    	return $this->getExtConfigProperty("monitorPoll");
    }
    
    // MonitorValid
    /**
     * If true the form monitors its valid state <b>client-side</b> and fires a looping event with that state. This is required to bind buttons to the valid state using the config value formBind:true on the button.
     * @param boolean $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setMonitorValid($value) {
    	$this->setExtConfigProperty("monitorValid", $value);
    	return $this;
    }	
    /**
     * If true the form monitors its valid state <b>client-side</b> and fires a looping event with that state. This is required to bind buttons to the valid state using the config value formBind:true on the button.
     * @return boolean
     */
    public function getMonitorValid() {
    	return $this->getExtConfigProperty("monitorValid");
    }

    /**#@+
	 * Internal BasicForm config properties:
	 * 
	 * The FormPanel uses a {@link PhpExt_Form_BasicForm} to handle actions like load, sumbit or reset.  
	 * BasicForm options may be included in the FormPanel Configuration for customization
	 * 
	 */

    // BaseParams
    /**
     * Parameters to pass with all requests. e.g. array('id'=>123, 'foo'=>'bar').
     * @param array $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setBaseParams($value) {
    	$this->setExtConfigProperty("baseParams", $value);
    	return $this;
    }	
    /**
     * Parameters to pass with all requests. e.g. array('id'=>123, 'foo'=>'bar').
     * @return array
     */
    public function getBaseParams() {
    	return $this->getExtConfigProperty("baseParams");
    }
    
    // ErrorReader
    /**
     * An {@link PhpExt_Data_DataReader} (e.g. {@link PhpExt_Data_XmlReader}) to be used to read data when reading validation errors on "submit" actions. This is completely optional as there is built-in support for processing JSON.
     * @uses PhpExt_Data_DataReader
     * @param PhpExt_Data_DataReader $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setErrorReader($value) {
    	$this->setExtConfigProperty("errorReader", $value);
    	return $this;
    }	
    /**
     * 
     * @return PhpExt_Data_DataReader
     */
    public function getErrorReader() {
    	return $this->getExtConfigProperty("errorReader");
    }
    
    // FileUpload
    /**
     * Set to true if this form is a file upload.
     * @param boolean $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setFileUpload($value) {
    	$this->setExtConfigProperty("fileUpload", $value);
    	return $this;
    }	
    /**
     * Set to true if this form is a file upload.
     * @return boolean
     */
    public function getFileUpload() {
    	return $this->getExtConfigProperty("fileUpload");
    }
    
    // Method
    /**
     * The request method to use (GET or POST) for form actions if one isn't supplied in the action options.
     * Posible values are:
     *  - PhpExt_Form_FormPanel::METHOD_GET
     *  - PhpExt_Form_FormPanel::METHOD_POST
     * @uses PhpExt_Form_FormPanel::METHOD_GET
     * @uses PhpExt_Form_FormPanel::METHOD_POST
     * @param string $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setMethod($value) {
    	$this->setExtConfigProperty("method", $value);
    	return $this;
    }	
    /**
     * The request method to use (GET or POST) for form actions if one isn't supplied in the action options.
     * Posible values are:
     *  - PhpExt_Form_FormPanel::METHOD_GET
     *  - PhpExt_Form_FormPanel::METHOD_POST
     * @uses PhpExt_Form_FormPanel::METHOD_GET
     * @uses PhpExt_Form_FormPanel::METHOD_POST
     * @return string
     */
    public function getMethod() {
    	return $this->getExtConfigProperty("method");
    }
    
    // Reader
    /**
     * An {@link PhpExt_Data_DataReader} (e.g. {@link PhpExt_Data_XmlReader}) to be used to read data when executing "load" actions. This is optional as there is built-in support for processing JSON.
     * @uses PhpExt_Data_DataReader
     * @param PhpExt_Data_DataReader $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setReader($value) {
    	$this->setExtConfigProperty("reader", $value);
    	return $this;
    }	
    /**
     * An {@link PhpExt_Data_DataReader} (e.g. {@link PhpExt_Data_XmlReader}) to be used to read data when executing "load" actions. This is optional as there is built-in support for processing JSON.
     * @return PhpExt_Data_DataReader
     */
    public function getReader() {
    	return $this->getExtConfigProperty("reader");
    }
    
    // StandardSubmit
    /**
     * If set to true, standard HTML form submits are used instead of XHR (Ajax) style form submissions. (defaults to false)
     * @param boolean $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setStandardSubmit($value) {
    	$this->setExtConfigProperty("standardSubmit", $value);
    	return $this;
    }	
    /**
     * If set to true, standard HTML form submits are used instead of XHR (Ajax) style form submissions. (defaults to false)
     * @return boolean
     */
    public function getStandardSubmit() {
    	return $this->getExtConfigProperty("standardSubmit");
    }
    
    // Timeout
    /**
     * Timeout for form actions in seconds (default is 30 seconds).
     * @param integer $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setTimeout($value) {
    	$this->setExtConfigProperty("timeout", $value);
    	return $this;
    }	
    /**
     * Timeout for form actions in seconds (default is 30 seconds).
     * @return integer
     */
    public function getTimeout() {
    	return $this->getExtConfigProperty("timeout");
    }
    
    // TrackResetOnLoad
    /**
     * If set to true, form.reset() resets to the last loaded or setValues() data instead of when the form was first created.
     * @param boolean $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setTrackResetOnload($value) {
    	$this->setExtConfigProperty("trackResetOnLoad", $value);
    	return $this;
    }	
    /**
     * If set to true, form.reset() resets to the last loaded or setValues() data instead of when the form was first created.
     * @return boolean
     */
    public function getTrackResetOnLoad() {
    	return $this->getExtConfigProperty("trackResetOnLoad");
    }
    
    // Url
    /**
     * The URL to use for form actions if one isn't supplied in the action options.
     * @param string $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setUrl($value) {
    	$this->setExtConfigProperty("url", $value);
    	return $this;
    }	
    /**
     * The URL to use for form actions if one isn't supplied in the action options.
     * @return string
     */
    public function getUrl() {
    	return $this->getExtConfigProperty("url");
    }
    
    // WaitMsgTarget
    /**
     * The id of the DOM Element to use as the wait message target
     * @param string $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setWaitMsgTarget($value) {        
    	$this->setExtConfigProperty("waitMsgTarget", $value);
    	return $this;
    }	
    /**
     * The id of the DOM Element to use as the wait message target
     * @return string
     */
    public function getWaitMsgTarget() {
    	return $this->getExtConfigProperty("waitMsgTarget");
    }
    
	/**#@-*/

    // OnSubmit
    /**
     * Override for the onSubmit event. Use PhpExt_Javascript::stm("Ext.emptyFn") to avoid the default handler.
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_Form_FormPanel
     */
    public function setOnSubmit($value) {        
    	$this->setExtConfigProperty("onSubmit", $value);
    	return $this;
    }	
    /**
     * Override for the onSubmit event. Use PhpExt_Javascript::stm("Ext.emptyFn") to avoid the default handler
     * @return PhpExt_JavascriptStm
     */
    public function getOnSubmit() {
    	return $this->getExtConfigProperty("onSubmit");
    }
	
	public $FieldsLazyRender = true;
	
	public function __construct($id = null, $url = null) {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.FormPanel","form");

		$validProps = array(
		    "buttonAlign",
		    "itemCls",
		    "labelAlign",
		    "labelWidth",
		    "minButtonWidth",
		    "monitorPoll",
		    "monitorValid",
		    // BasicForm Properties
            "baseParams",
            "errorReader",
            "fileUpload",
            "method",
            "reader",
			"standardSubmit",
            "timeout",
            "trackResetOnLoad",
            "url",
            "waitMsgTarget",
            "onSubmit"
		);
		$this->addValidConfigProperties($validProps);

		if ($id !== null)
		    $this->setId($id);
		if ($url !== null)
		    $this->setUrl($url);

		$this->_defaultLayout = new PhpExt_Layout_FormLayout();
		$this->setLayout($this->_defaultLayout);
		
	}
		
		
}

