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
 * @see PhpExt_Data_DataProxy
 */
include_once 'PhpExt/Data/DataProxy.php';

/**
 * @see PhpExt_Data_Connection
 */
include_once 'PhpExt/Data/Connection.php';

/**
 * An implementation of Ext.data.DataProxy that reads a data object from a Connection object configured to reference a certain URL.
 * 
 * <b>Note that this class cannot be used to retrieve data from a domain other than the domain from which the running page was served.</b>
 * 
 * <b>For cross-domain access to remote data, use a PhpExt_Data_ScriptTagProxy.</b>
 * 
 * Be aware that to enable the browser to parse an XML document, the server must set the Content-Type header in the HTTP response to "text/xml". 
 * 
 * @see PhpExt_Data_ScriptTagProxy
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_HttpProxy extends PhpExt_Data_DataProxy  
{	
    // Connection
    /**
     * @var PhpExt_Data_Connection
     */
    protected $conn = null;
    /**
     * The Connection object (Or options parameter to Ext.Ajax.request) which this HttpProxy uses to make requests to the server. Properties of this object may be changed dynamically to change the way data is requested. 
     * @param PhpExt_Data_Connection $value 
     * @return PhpExt_Data_HttpProxy
     */
    public function setConnection($value) {
        $this->conn = $value;
        return $this;
    }	
    /**
     * The Connection object (Or options parameter to Ext.Ajax.request) which this HttpProxy uses to make requests to the server. Properties of this object may be changed dynamically to change the way data is requested. 
     * @return PhpExt_Data_Connection
    */
    public function getConnection() {
        return $this->conn;
    }
    
    /**
     * @param PhpExt_Data_Connection $conn an {@link PhpExt_Data_Connection} object, or options parameter to Ext.Ajax.request. If an options parameter is passed, the singleton Ext.Ajax object will be used to make the request.
     *
     */
	public function __construct($conn) {
		parent::__construct();
		$this->setExtClassInfo("Ext.data.HttpProxy", null);

		$this->conn = $conn;
		
	}	
	
    public function getJavascript($lazy = false, $varName = null) {
		if ($this->_varName == null) {		
			$html = array();
			$connJs = $this->conn->getJavascript(false);
						
			$js  = "new ".$this->_extClassName."(";
			$js .= $connJs;
			$js .= ")";
			
			if ($varName != null) {
				$this->_varName = $varName;
				$js = "var ".$this->_varName." = $js;";
			}			
			return $js;
		}
		else {
			return $this->_varName;
		}		
	}
	
	
}

