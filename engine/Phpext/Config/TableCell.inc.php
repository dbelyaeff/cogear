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
 * @package PhpExt
 * @subpackage Config
 */
class PhpExt_Config_TableCell extends PhpExt_Config_ConfigObject
{
    // Html
    /**
     * Inner HTML for the cell
     * @param string $value
     * @return PhpExt_Config_TableCell
     */
    public function setHtml($value) {
    	$this->setExtConfigProperty("html", $value);
    	return $this;
    }	
    /**
     * Inner HTML for the cell
     * @return string
     */
    public function getHtml() {
    	return $this->getExtConfigProperty("html");
    }
    
    // RowSpan
    /**
     * Cell Row Span
     * @param integer $value
     * @return PhpExt_Config_TableCell
     */
    public function setRowSpan($value) {
    	$this->setExtConfigProperty("rowspan", $value);
    	return $this;
    }	
    /**
     * Cell Row Span
     * @return integer
     */
    public function getRowSpan() {
    	return $this->getExtConfigProperty("rowspan");
    }
    
    // ColSpan
    /**
     * Cell Col Span
     * @param integer $value
     * @return PhpExt_Config_TableCell
     */
    public function setColSpan($value) {
    	$this->setExtConfigProperty("colspan", $value);
    	return $this;
    }	
    /**
     * Cell Col Span
     * @return integer
     */
    public function getColSpan() {
    	return $this->getExtConfigProperty("colspan");
    }

		
	public function __construct($html, $colspan = null, $rowspan = null) {
		parent::__construct();

		$validProps = array(
		    "html",
		    "rowspan",
		    "colspan"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setHtml($html);		
		$this->setColSpan($colspan);
		$this->setRowSpan($rowspan);
	}	
 	
	
}

