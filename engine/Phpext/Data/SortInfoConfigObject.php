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
 * @see PhpExt_Config_ConfigObject
 */
include_once 'PhpExt/Config/ConfigObject.php';


/**
 * Sort Info Config Object for SortInfo property in {@link PhpExt_Data_Store}
 * @see PhpExt_Data_Store
 * @package PhpExt
 * @subpackage Data
 */
class PhpExt_Data_SortInfoConfigObject extends PhpExt_Config_ConfigObject
{
    const SORT_DIR_ASC = 'ASC';
    const SORT_DIR_DESC = 'DESC';
    
    // Field
    /**
     * The field name to which this sorting applies.
     * @param string $value
     * @return PhpExt_Data_SortInfoConfigObject
     */
    public function setField($value) {
    	$this->setExtConfigProperty("field", $value);
    	return $this;
    }	
    /**
     * The field name to which this sorting applies.
     * @return string
     */
    public function getField() {
    	return $this->getExtConfigProperty("field");
    }
    
    // Direction
    /**
     * Sort direction. it can be either PhpExt_Data_SortInfoConfigObject::ASC or PhpExt_Data_SortInfoConfigObject::DESC
     * @see PhpExt_Data_SortInfoConfigObject::SORT_DIR_ASC
     * @see PhpExt_Data_SortInfoConfigObject::SORT_DIR_DESC
     * @param string $value
     * @return PhpExt_Data_SortInfoConfigObject
     */
    public function setDirection($value) {
    	$this->setExtConfigProperty("direction", $value);
    	return $this;
    }	
    /**
     * 
     * @return string
     */
    public function getDirection() {
    	return $this->getExtConfigProperty("direction");
    }    
		
	public function __construct($fieldName, $direction = PhpExt_Data_SortInfoConfigObject::SORT_DIR_ASC) {
		parent::__construct();

		$validProps = array(
		    "field",
		    "direction"
		);
		$this->addValidConfigProperties($validProps);
		    
		$this->setField($fieldName);
		$this->setDirection($direction);	
	}		
 	
	
}

