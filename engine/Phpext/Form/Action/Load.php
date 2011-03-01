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
 * A class which handles loading of data from a server into the Fields of an Ext.form.BasicForm.
 * <p>Instances of this class are only created by a Form when submitting.</p>
 * <p>A response packet must contain a boolean success property, and a data property. The data property contains the values of Fields to load. The individual value object for each Field is passed to the Field's setValue method.</p>
 * <p>By default, response packets are assumed to be JSON, so a typical response packet may look like this:
 * <code>
 * {
 *   success: true,
 *   data: {
 *       clientName: "Fred. Olsen Lines",
 *       portOfLoading: "FXT",
 *       portOfDischarge: "OSL"
 *   }
 * }
 * </code>
 * <p>Other data may be placed into the response for processing the the Form's callback or event handler methods. The object decoded from this JSON is available in the result property.</p>
 * 
 * @package PhpExt
 * @subpackage Form
 */
class PhpExt_Form_Action_Load extends PhpExt_Form_Action 
{			
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.form.Action.Load");
				
	}	 	
	

	
	
}

