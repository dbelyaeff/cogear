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
 * @see PhpExt_Form_Action
 */
include_once 'PhpExt/Form/Action.php';


/**
 * An action response object for
 * <p>Load response example:</p>
 * <code>
 * 	$response = new PhpExt_Form_Action_Response();
 *  $response->setSuccess(true)
 *           ->setData(array(
 * 				'clientName'=>'Fred. Olsen Lines',
 * 				'portOfLoading'=>'FXT',
 * 				'portOfDischarge'=>'OSL')
 * 	);
 *  echo $response->getJavascript();
 * </code>
 * 
 * <p>Submit response example:</p>
 * <code>
 * 	$response = new PhpExt_Form_Action_Response();
 *  $response->setSuccess(false)
 *           ->setErrors(array(
 * 				'clientCode'=>'Client not found',
 * 				'portOfLoading'=>'FXT')
 * 	);
 *  echo $response->getJavascript();
 * </code> 
 * <p>Other data may be placed into the response for processing the the Form's callback or event handler methods. The object decoded from this JSON is available in the result property.</p>
 * 
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_Action_Response extends PhpExt_Form_Action 
{			
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo(null);			
	}	 	
	
	public function getJavascript($lazy = false, $varName = null) {
	    return parent::getJavascript(true);   
	}
	
	

	
	
}

