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
 */
class PhpExt_ToolConfigObject extends PhpExt_Config_ConfigObject
{
	const ID_TOOGLE = 'toogle';
	const ID_CLOSE = 'close';
	const ID_MINIMIZE = 'minimize';
	const ID_MAXIMIZE = 'maximize';
	const ID_RESTORE = 'restore';
	const ID_GEAR = 'gear';
	const ID_PIN = 'pin';
	const ID_UNPIN = 'unpin';
	const ID_RIGHT = 'right';
	const ID_LEFT = 'left';
	const ID_UP = 'up';
	const ID_DOWN = 'down';
	const ID_REFRESH = 'refresh';
	const ID_MINUS = 'minus';
	const ID_PLUS = 'plus';
	const ID_HELP = 'help';
	const ID_SEARCH = 'search';
	const ID_SAVE = 'save';
    
	

    // Id
    /**
     * The type of tool to create. Values may be
     *  - {@link ID_TOOGLE} (Created by default when collapsible is true)
     *  - {@link ID_CLOSE}
     *  - {@link ID_MINIMIZE}
     *  - {@link ID_MAXIMIZE}
     *  - {@link ID_RESTORE}
     *  - {@link ID_GEAR}
     *  - {@link ID_PIN}
     *  - {@link ID_UNPIN}
     *  - {@link ID_RIGHT}
     *  - {@link ID_LEFT}
     *  - {@link ID_UP}
     *  - {@link ID_DOWN}
     *  - {@link ID_REFRESH}
     *  - {@link ID_MINUS}
     *  - {@link ID_PLUS}
     *  - {@link ID_HELP}
     *  - {@link ID_SEARCH}
     *  - {@link ID_SAVE}
     * 
     * @param string $value 
     * @return PhpExt_ToolConfigObject
     */
    public function setId($value) {
    	$this->setExtConfigProperty("id", $value);
    	return $this;
    }	
    /**
     * The type of tool to create. Values may be
     *  - {@link ID_TOOGLE} (Created by default when collapsible is true)
     *  - {@link ID_CLOSE}
     *  - {@link ID_MINIMIZE}
     *  - {@link ID_MAXIMIZE}
     *  - {@link ID_RESTORE}
     *  - {@link ID_GEAR}
     *  - {@link ID_PIN}
     *  - {@link ID_UNPIN}
     *  - {@link ID_RIGHT}
     *  - {@link ID_LEFT}
     *  - {@link ID_UP}
     *  - {@link ID_DOWN}
     *  - {@link ID_REFRESH}
     *  - {@link ID_MINUS}
     *  - {@link ID_PLUS}
     *  - {@link ID_HELP}
     *  - {@link ID_SEARCH}
     *  - {@link ID_SAVE}
     *  
     * @return string
     */
    public function getId() {
    	return $this->getExtConfigProperty("id");
    }
	
    // Handler
    /**
     * The function to call when clicked. Arguments passed are:
     * <dl> 
     * 	<dt>event : Ext.EventObject</dt>
     *  	<dd>The click event.</dd>
     *  <dt>toolEl : Ext.Element</dt>
     *      <dd>The tool Element.</dd>
     *  <dt>Panel : Ext.Panel<dt>
     *      <dd>The host Panel</dd>
	 * </dl>
     * 
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_ToolConfigObject
     */
    public function setHandler($value) {
    	$this->setExtConfigProperty("handler", $value);
    	return $this;
    }	
    /**
     * The function to call when clicked. Arguments passed are:
     * <dl> 
     * 	<dt>event : Ext.EventObject</dt>
     *  	<dd>The click event.</dd>
     *  <dt>toolEl : Ext.Element</dt>
     *      <dd>The tool Element.</dd>
     *  <dt>Panel : Ext.Panel<dt>
     *      <dd>The host Panel</dd>
	 * </dl>
     * 
     * @return PhpExt_JavascriptStm
     */
    public function getHandler() {
    	return $this->getExtConfigProperty("handler");
    }
    
    // Scope
    /**
     * The scope in which to call the handler.
     * @param JavascriptStm $value 
     * @return PhpExt_ToolConfigObject
     */
    public function setScope($value) {
    	$this->setExtConfigProperty("scope", $value);
    	return $this;
    }	
    /**
     * The scope in which to call the handler.
     * @return JavascriptStm
     */
    public function getScope() {
    	return $this->getExtConfigProperty("scope");
    }
	
    // Qtip
    /**
     * A tip string, or a config argument to Ext.QuickTip.register
     * @param string $value 
     * @return PhpExt_ToolConfigObject
     */
    public function setQtip($value) {
    	$this->setExtConfigProperty("qtip", $value);
    	return $this;
    }	
    /**
     * A tip string, or a config argument to Ext.QuickTip.register
     * @return string
     */
    public function getQtip() {
    	return $this->getExtConfigProperty("qtip");
    }
    
    // Hidden
    /**
     * True to initially render hidden.
     * @param boolean $value 
     * @return PhpExt_ToolConfigObject
     */
    public function setHidden($value) {
    	$this->setExtConfigProperty("hidden", $value);
    	return $this;
    }	
    /**
     * True to initially render hidden.
     * @return boolean
     */
    public function getHidden() {
    	return $this->getExtConfigProperty("hidden");
    }
    
    // On
    /**
     * A {@link PhpExt_ListenerCollection}
     * @param PhpExt_ListenerCollection $value 
     * @return PhpExt_ToolConfigObject
     */
    public function setOn($value) {
    	$this->setExtConfigProperty("on", $value);
    	return $this;
    }	
    /**
     * A {@link PhpExt_ListenerCollection}
     * @return PhpExt_ListenerCollection
     */
    public function getOn() {
    	return $this->getExtConfigProperty("on");
    }
    
    
	/**
	 * @param string $id The type of tool to create. For a list of possible values see {@link PhpExt_Tool::setId()}.
	 * @param PhpExt_JavascriptStm $handler The Javacript function to call when clicked, can be created with {@link PhpExt_Javascript::functionDef()} 
	 * @param boolean $scope The scope in which to call the handler.
	 * @param string $qtip A tip string, or a config argument to Ext.QuickTip.register
	 * @param string $hidden True to initially render hidden. 
	 * @param PhpExt_ListenerCollection $on A {@link PhpExt_ListenerCollection}
	 */
	public function __construct($id, $handler, $scope = null, $qtip = null, $hidden = null, $on = null) {
		parent::__construct();

		$validProps = array(
		    "id",
		    "handler",
		    "scope",
		    "qtip",
		    "hidden",
		    "on"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->setId($id);
		$this->setHandler($handler);
		if ($scope !== null)
		    $this->setScope($scope);
		if ($qtip !== null)
		    $this->setQtip($qtip);
		if ($hidden !== null)
		    $this->setHidden($hidden);
		if ($on !== null)
		    $this->setOn($on);
	}		
 	
	
}

