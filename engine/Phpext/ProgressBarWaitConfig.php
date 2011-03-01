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
class PhpExt_ProgressBarWaitConfig extends PhpExt_Config_ConfigObject
{
    // Duration
    /**
     * The length of time in milliseconds that the progress bar should run before resetting itself (defaults to undefined, in which case it will run indefinitely until reset is called)
     * @param int $value 
     * @return PhpExt_ProgressBarWaitConfig
     */
    public function setDuration($value) {
        $this->setExtConfigProperty("duration", $value);
        return $this;
    }	
    /**
     * The length of time in milliseconds that the progress bar should run before resetting itself (defaults to undefined, in which case it will run indefinitely until reset is called)
     * @return int
    */
    public function getDuration() {
        return $this->getExtConfigProperty("duration");
    }
    
    // Interval
    /**
     * The length of time in milliseconds between each progress update (default to 1000)
     * @param int $value 
     * @return PhpExt_ProgressBarWaitConfig
     */
    public function setInterval($value) {
        $this->setExtConfigProperty("interval", $value);
        return $this;
    }	
    /**
     * The length of time in milliseconds between each progress update (default to 1000)
     * @return int
    */
    public function getInterval() {
        return $this->getExtConfigProperty("interval");
    }
    
    // Increment
    /**
	 * The number of progress update segments to display within the progress bar (defaults to 10).  If the bar reaches the end and is still updating, it will automatically wrap back to the beginning.
     * @param int $value 
     * @return PhpExt_ProgressBarWaitConfig
     */
    public function setIncrement($value) {
        $this->setExtConfigProperty("increment", $value);
        return $this;
    }	
    /**
     * The number of progress update segments to display within the progress bar (defaults to 10).  If the bar reaches the end and is still updating, it will automatically wrap back to the beginning.
     * @return int
    */
    public function getIncrement() {
        return $this->getExtConfigProperty("increment");
    }
    
    // Fn
    /**
     * A callback function to execute after the progress bar finishes auto-
     * updating.  The function will be called with no arguments.  This function
     * will be ignored if duration is not specified since in that case the
     * progress bar can only be stopped programmatically, so any required function
     * should be called by the same code after it resets the progress bar.
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_ProgressBarWaitConfig
     */
    public function setFn($value) {
        $this->setExtConfigProperty("fn", $value);
        return $this;
    }	
    /**
     * A callback function to execute after the progress bar finishes auto-
     * updating.  The function will be called with no arguments.  This function
     * will be ignored if duration is not specified since in that case the
     * progress bar can only be stopped programmatically, so any required function
     * should be called by the same code after it resets the progress bar.
     * @return PhpExt_JavascriptStm
    */
    public function getFn() {
        return $this->getExtConfigProperty("fn");
    }
    
    // Scope
    /**
     * The scope that is passed to the callback function (only applies when
     * duration and fn are both passed).
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_ProgressBarWaitConfig
     */
    public function setScope($value) {
        $this->setExtConfigProperty("scope", $value);
        return $this;
    }	
    /**
     * The scope that is passed to the callback function (only applies when
     * duration and fn are both passed).
     * @return PhpExt_JavascriptStm
    */
    public function getScope() {
        return $this->getExtConfigProperty("scope");
    }
    
	public function __construct() {
		parent::__construct();

		$validProps = array(
		    "duration",
		    "interval",
		    "increment",
		    "fn",
		    "scope"
		);
		$this->addValidConfigProperties($validProps);
				
	}

	/**
	 * Helper function to easily create an instance to add configuration properties inline
	 *
	 * @return PhpExt_ProgressBarWaitConfig
	 */
	public static function createWaitConfig() {
	    return new PhpExt_ProgressBarWaitConfig();
	}
 	
	
}

