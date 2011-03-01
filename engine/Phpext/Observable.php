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
 * PhpExt_Object
 */
include_once 'PhpExt/Object.php';
/**
 * PhpExt_ListenerCollection
 */
include_once 'PhpExt/ListenerCollection.php';

/**
 * @package PhpExt
 */
abstract class PhpExt_Observable extends PhpExt_Object {

    /**
     * PhpExt_ListenerCollection
     *
     * @var PhpExt_ListenerCollection
     */
	protected $_listeners;
	// Listeners	
	/**
	 * 
	 * @return PhpExt_ListenerCollection
	 */
	public function getListeners() {
		return $this->getExtConfigProperty("listeners");
	}
	
	
	protected function __construct() {
		parent::__construct();

		$validProps = array(
		    "listeners"
		);
		$this->addValidConfigProperties($validProps);
		
		$this->_listeners = new PhpExt_ListenerCollection();
		$this->_extConfigProperties["listeners"] = $this->_listeners;
	}		

	/**
	 * Adds a {@link PhpExt_Listener} to the specified $eventName.  This lintener will execute when the Javascript object fires that event.
	 * @param string $eventName The name of the event
	 * @param PhpExt_Listener|PhpExt_JavascriptStm $listener A {@link PhpExt_JavascriptStm} with the corresponding name of the javascript function previously defined of a {@link PhpExt_Listener} to create an anonymous function
	 * @return PhpExt_Observable 
	 */
	public function attachListener($eventName, $listener) {
		$this->_listeners->add($listener, $eventName);
		return $this;
	}
	
    /*public function removeListener($eventName, $listener) {
		unset($this->_listeners[$eventName]);
	}*/
	
	protected function getConfigParams($lazy = false) {		
		if ($this->_listeners->getCount() == 0)
		    $this->setExtConfigProperty("listeners", null);
		
		return parent::getConfigParams($lazy);
	}
	
		
}

