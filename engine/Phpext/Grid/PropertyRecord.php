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
 * @package PhpExt
 * @subpackage Grid
 */
class PhpExt_Grid_PropertyRecord extends PhpExt_Object
{
    // Name
    protected $_name = null;
    /**
     * The name of the field's record
     * @param string $value 
     * @return PhpExt_Data_Record
     */
    public function setName($value) {
        $this->_name = $value;
        return $this;
    }	
    /**
     * The name of the field's record
     * @return string
    */
    public function getName() {
        return $this->_name;
    }
    
    // Value
    protected $_value = null;
    /**
     * The value for the field's record
     * @param mixed $value 
     * @return PhpExt_Data_Record
     */
    public function setValue($value) {
        $this->_value = $value;
        return $this;
    }	
    /**
     * The value for the field's record
     * @return mixed
    */
    public function getValue() {
        return $this->_value;
    }    
	
	public function __construct($name, $value) {
		parent::__construct();
		$this->setExtClassInfo("Ext.grid.PropertyRecord", null);
		
		$this->_name = $name;
		$this->_value = $value;		
	}
	
	protected function getConfigParams($lazy = false) {
		
	    $params[] = $this->paramToString("name",$this->_name);
	    $params[] = $this->paramToString("value",$this->_value);
			
		return $params;
	}
	

 	
	
}

