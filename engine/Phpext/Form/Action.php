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
 * @see PhpExt_Object
 */
include_once 'PhpExt/Object.php';


/**
 * The subclasses of this class provide actions to perform upon Forms.
 * <p>Instances of this class are only created by a Form when the Form needs to perform an action such as submit or load. The Configuration options listed for this class are set through the Form's action methods: submit, load and doAction.</p>
 * <p>The instance of Action which performed the action is passed to the success and failure callbacks of the Form's action methods (submit, load and doAction), and to the actioncomplete and actionfailed event handlers.</p>
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_Action extends PhpExt_Object 
{	
	const FAILURE_TYPE_CLIENT_INVALID = 'Action.CLIENT_INVALID';
	const FAILURE_TYPE_CONNECT_FAILURE = 'Action.CONNECT_FAILURE';
	const FAILURE_TYPE_LOAD_FAILURE = 'Action.LOAD_FAILURE';
	const FAILURE_TYPE_SERVER_INVALID = 'Action.SERVER_INVALID';

	// FailureCallback
	/**
	 * The function to call when a failure packet was recieved, or when an error ocurred in the Ajax communication. The function is passed the following parameters:	 
     * <dl>
     *  <dt>form : Ext.form.BasicForm</dt>
     *     <dd>The form that requested the action</dd>
     *  <dt>action : Ext.form.Action</dt>
     *    <dd>The Action class. If an Ajax error ocurred, the failure type will be in failureType. The result property of this object may be examined to perform custom postprocessing.</dd>
	 * </dl>
	 * @param PhpExt_Handler $value 
	 * @return PhpExt_Form_Action
	 */
	public function setFailureCallback($value) {
		$this->setExtConfigProperty("failure", $value);
		return $this;
	}	
	/**
	 * 
	 * @return PhpExt_Handler
	 */
	public function getFailureCallback() {
		return $this->getExtConfigProperty("failure");
	}
	
	// Method
    /**
     * The HTTP method to use to access the requested URL. Defaults to the Ext.form.BasicForm's method, or if that is not specified, the underlying DOM form's method.
     * Posible values are:
     *  - PhpExt_Form_FormPanel::METHOD_GET
     *  - PhpExt_Form_FormPanel::METHOD_POST
     * @uses PhpExt_Form_FormPanel::METHOD_GET
     * @uses PhpExt_Form_FormPanel::METHOD_POST
     * @param string $value 
     * @return PhpExt_Form_Action
     */
    public function setMethod($value) {
    	$this->setExtConfigProperty("method", $value);
    	return $this;
    }	
    /**
     * The HTTP method to use to access the requested URL. Defaults to the Ext.form.BasicForm's method, or if that is not specified, the underlying DOM form's method.
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
    
    // Params
    /**
     * Extra parameter values to pass. These are added to the Form's Ext.form.BasicForm.baseParams and passed to the specified URL along with the Form's input fields.
     * @param array $value Format: array('param1'=>'value1','param2'=>'value2') 
     * @return PhpExt_Form_Action
     */
    public function setParams($value) {
    	$this->setExtConfigProperty("params", $value);
    	return $this;
    }	
    /**
     * Extra parameter values to pass. These are added to the Form's Ext.form.BasicForm.baseParams and passed to the specified URL along with the Form's input fields.
     * @return array Format: array('param1'=>'value1','param2'=>'value2')
     */
    public function getParams() {
    	return $this->getExtConfigProperty("params");
    }
    
    // Scope
    /**
     * The scope in which to call the callback functions (The this reference for the callback functions).
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_Form_Action
     */
    public function setScope($value) {
    	$this->setExtConfigProperty("scope", $value);
    	return $this;
    }	
    /**
     * The scope in which to call the callback functions (The this reference for the callback functions).
     * @return PhpExt_JavascriptStm
     */
    public function getScope() {
    	return $this->getExtConfigProperty("scope");
    }
    
    // SuccessCallback
    /**
     * The function to call when a valid success return packet is recieved. The function is passed the following parameters:
	 * <dl>
     * 	<dt>form : Ext.form.BasicForm</dt>
     * 		<dd>The form that requested the action</dd>
     * 	<dt>action : Ext.form.Action</dt>
     *		<dd>The Action class. The result property of this object may be examined to perform custom postprocessing.</dd>
     * </dl>
     * @param PhpExt_Handler $value 
     * @return PhpExt_Form_Action
     */
    public function setSuccessCallback($value) {
    	$this->setExtConfigProperty("success", $value);
    	return $this;
    }	
    /**
     * 
     * @return PhpExt_Handler
     */
    public function getSuccessCallback() {
    	return $this->getExtConfigProperty("success");
    }
    
    // Url
    /**
     * The URL that the Action is to invoke.
     * @param string $value 
     * @return PhpExt_Form_Action
     */
    public function setUrl($value) {
    	$this->setExtConfigProperty("url", $value);
    	return $this;
    }	
    /**
     * The URL that the Action is to invoke.
     * @return string
     */
    public function getUrl() {
    	return $this->getExtConfigProperty("url");
    }
    
    // WaitMessage
    /**
     * The message to be displayed by a call to {@link PhpExt_MessageBox::wait()} during the time the action is being processed.
     * @param string $value 
     * @return PhpExt_Form_Action
     */
    public function setWaitMessage($value) {
    	$this->setExtConfigProperty("waitMsg", $value);
    	return $this;
    }	
    /**
     * The message to be displayed by a call to {@link PhpExt_MessageBox::wait()} during the time the action is being processed.
     * @return string
     */
    public function getWaitMessage() {
    	return $this->getExtConfigProperty("waitMsg");
    }
    
    // WaitTitle
    /**
     * The title to be displayed by a call to {@link PhpExt_MessageBox::wait()} during the time the action is being processed.
     * @param string $value 
     * @return PhpExt_Form_Action
     */
    public function setWaitTitle($value) {
    	$this->setExtConfigProperty("waitTitle", $value);
    	return $this;
    }	
    /**
     * The title to be displayed by a call to {@link PhpExt_MessageBox::wait()} during the time the action is being processed.
     * @return string
     */
    public function getWaitTitle() {
    	return $this->getExtConfigProperty("waitTitle");
    }

    
    // 
     /**#@+
	 * Action Response properties:
	 * 
	 * When loading or submitting a form the response should be an Action object.  The following properties are intended
	 * to be used when responding to a form load or submit request
	 * 
	 */
    // FailureType
    /**
     * The type of failure detected. Possible values are
     *  - PhpExt_Form_Action::FAILURE_TYPE_CLIENT_INVALID
     *  - PhpExt_Form_Action::FAILURE_TYPE_CONNECT_FAILURE
     *  - PhpExt_Form_Action::FAILURE_TYPE_LOAD_FAILURE
     *  - PhpExt_Form_Action::FAILURE_TYPE_SERVER_INVALID
     * 
     * @uses PhpExt_Form_Action::FAILURE_TYPE_CLIENT_INVALID
     * @uses PhpExt_Form_Action::FAILURE_TYPE_CONNECT_FAILURE
     * @uses PhpExt_Form_Action::FAILURE_TYPE_LOAD_FAILURE
     * @uses PhpExt_Form_Action::FAILURE_TYPE_SERVER_INVALID
     * @param string $value 
     * @return PhpExt_Form_Action
     */
    public function setFailureType($value) {
    	$this->setExtConfigProperty("failureType", $value);
    	return $this;
    }	
    /**
     * The type of failure detected. Possible values are
     *  - PhpExt_Form_Action::FAILURE_TYPE_CLIENT_INVALID
     *  - PhpExt_Form_Action::FAILURE_TYPE_CONNECT_FAILURE
     *  - PhpExt_Form_Action::FAILURE_TYPE_LOAD_FAILURE
     *  - PhpExt_Form_Action::FAILURE_TYPE_SERVER_INVALID
     * 
     * @uses PhpExt_Form_Action::FAILURE_TYPE_CLIENT_INVALID
     * @uses PhpExt_Form_Action::FAILURE_TYPE_CONNECT_FAILURE
     * @uses PhpExt_Form_Action::FAILURE_TYPE_LOAD_FAILURE
     * @uses PhpExt_Form_Action::FAILURE_TYPE_SERVER_INVALID
     * @return string
     */
    public function getFailureType() {
    	return $this->getExtConfigProperty("failureType");
    }    
    
    // TODO: Implement Response readonly property

    // Result
    /**
     * The response config object containing a boolean success property and other, action-specific properties.
     * @param boolean $value 
     * @return PhpExt_Form_Action
     */
    public function setResult($value) {
    	$this->setExtConfigProperty("result", $value);
    	return $this;
    }	
    /**
     * The response config object containing a boolean success property and other, action-specific properties.
     * @return boolean
     */
    public function getResult() {
    	return $this->getExtConfigProperty("result");
    }
    
    // TODO: Implement Type readonly property
    /**#@-*/
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.Action");
		
		$validProps = array(
		    "failure",
		    "method",
		    "params",
		    "scope",
		    "success",
		    "url",
		    "waitMsg",
		    "waitTitle",
		    // Response properties
		    "failureType",
		    //"response",
		    "result",
		    //"type"
		);
		$this->addValidConfigProperties($validProps);
	}	 	
	

	
	
}

