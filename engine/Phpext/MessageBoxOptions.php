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
 * @subpackage 	
 */
class PhpExt_MessageBoxOptions extends PhpExt_Config_ConfigObject
{

    // AnimEl
    /**
     * An id or Element from which the message box should animate as it opens and closes (defaults to undefined)
     * @param string|PhpExt_JavascriptStm $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setAnimEl($value) {
        $this->setExtConfigProperty("animEl", $value);
        return $this;
    }	
    /**
     * An id or Element from which the message box should animate as it opens and closes (defaults to undefined)
     * @return string|PhpExt_JavascriptStm
    */
    public function getAnimEl() {
        return $this->getExtConfigProperty("animEl");
    }
    
    // Buttons
    /**
     * A button config object (e.g., {@link PhpExt_MessageBox::OKCANCEL()} or {ok:'Foo', cancel:'Bar'}), or false to not show any buttons (defaults to false)
     * @param PhpExt_JavascriptStm|array|bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setButtons($value) {
        $this->setExtConfigProperty("buttons", $value);
        return $this;
    }	
    /**
     * A button config object (e.g., {@link PhpExt_MessageBox::OKCANCEL()} or {ok:'Foo', cancel:'Bar'}), or false to not show any buttons (defaults to false)
     * @return PhpExt_JavascriptStm|array|bool
    */
    public function getButtons() {
        return $this->getExtConfigProperty("buttons");
    }
    
    // Closable
    /**
     * False to hide the top-right close button (defaults to true). Note that progress and wait dialogs will ignore this property and always hide the close button as they can only be closed programmatically.
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setClosable($value) {
        $this->setExtConfigProperty("closable", $value);
        return $this;
    }	
    /**
     * False to hide the top-right close button (defaults to true). Note that progress and wait dialogs will ignore this property and always hide the close button as they can only be closed programmatically.
     * @return bool
    */
    public function getClosable() {
        return $this->getExtConfigProperty("closable");
    }
    
    // CssClass
    /**
     * A custom CSS class to apply to the message box's container element
     * @param string $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setCssClass($value) {
        $this->setExtConfigProperty("cls", $value);
        return $this;
    }	
    /**
     * A custom CSS class to apply to the message box's container element
     * @return string
    */
    public function getCssClass() {
        return $this->getExtConfigProperty("cls");
    }
    
    // DefaultTextHeight
    /**
     * The default height in pixels of the message box's multiline textarea if displayed (defaults to 75)
     * @param integer $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setDefaultTextHeight($value) {
        $this->setExtConfigProperty("defaultTextHeight", $value);
        return $this;
    }	
    /**
     * The default height in pixels of the message box's multiline textarea if displayed (defaults to 75)
     * @return integer
    */
    public function getDefaultTextHeight() {
        return $this->getExtConfigProperty("defaultTextHeight");
    }
    
    // Fn
    /**
     * A callback function which is called when the dialog is dismissed either by clicking on the configured buttons, or on the dialog close button, or by pressing the return button to enter input.
     * 
     * Progress and wait dialogs will ignore this option since they do not respond to user actions and can only be closed programmatically, so any required function should be called by the same code after it closes the dialog. Parameters passed:
	 * <li>buttonId: The ID of the button pressed, one of:
     *     - ok
     *     - yes
     *     - no
     *     - cancel
     * </li>
     * <li>text: Value of input field if prompt or multiline was selected</li>
     * 
     * @param PhpExt_JavascriptStm $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setFn($value) {
        $this->setExtConfigProperty("fn", $value);
        return $this;
    }	
    /**
     * A callback function which is called when the dialog is dismissed either by clicking on the configured buttons, or on the dialog close button, or by pressing the return button to enter input.
     * 
     * Progress and wait dialogs will ignore this option since they do not respond to user actions and can only be closed programmatically, so any required function should be called by the same code after it closes the dialog. Parameters passed:
	 * <li>buttonId: The ID of the button pressed, one of:
     *     - ok
     *     - yes
     *     - no
     *     - cancel
     * </li>
     * <li>text: Value of input field if prompt or multiline was selected</li>
     * @return PhpExt_JavascriptStm
    */
    public function getFn() {
        return $this->getExtConfigProperty("fn");
    }
    
    // Scope
    /**
     * The scope of the callback function
     * @param PhpExt_Javascript $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setScope($value) {
        $this->setExtConfigProperty("scope", $value);
        return $this;
    }	
    /**
     * The scope of the callback function
     * @return PhpExt_Javascript
    */
    public function getScope() {
        return $this->getExtConfigProperty("scope");
    }
    
    // Icon
    /**
     * A CSS class that provides a background image to be used as the body icon for the dialog (e.g., {@link PhpExt_MessageBox::WARNING()} or 'custom-class', defaults to '')
     * @param string|PhpExt_JavascriptStm $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setIcon($value) {
        $this->setExtConfigProperty("icon", $value);
        return $this;
    }	
    /**
     * A CSS class that provides a background image to be used as the body icon for the dialog (e.g., {@link PhpExt_MessageBox::WARNING()} or 'custom-class', defaults to '')
     * @return string|PhpExt_JavascriptStm
    */
    public function getIcon() {
        return $this->getExtConfigProperty("icon");
    }
    
    // IconCssClass
    /**
     * The standard Ext.Window.iconCls to add an optional header icon (defaults to '')
     * @param string $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setIconCssClass($value) {
        $this->setExtConfigProperty("iconCls", $value);
        return $this;
    }	
    /**
     * The standard Ext.Window.iconCls to add an optional header icon (defaults to '')
     * @return string
    */
    public function getIconCssClass() {
        return $this->getExtConfigProperty("iconCls");
    }
    
    // MaxWidth
    /**
     * The maximum width in pixels of the message box (defaults to 600)
     * @param int $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setMaxWidth($value) {
        $this->setExtConfigProperty("maxWidth", $value);
        return $this;
    }	
    /**
     * The maximum width in pixels of the message box (defaults to 600)
     * @return int
    */
    public function getMaxWidth() {
        return $this->getExtConfigProperty("maxWidth");
    }
    
    // MinWidth
    /**
     * The minimum width in pixels of the message box (defaults to 100)
     * @param int $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setMinWidth($value) {
        $this->setExtConfigProperty("minWidth", $value);
        return $this;
    }	
    /**
     * The minimum width in pixels of the message box (defaults to 100)
     * @return int
    */
    public function getMinWidth() {
        return $this->getExtConfigProperty("minWidth");
    }
    
    // Modal
    /**
     * False to allow user interaction with the page while the message box is displayed (defaults to true)
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setModal($value) {
        $this->setExtConfigProperty("modal", $value);
        return $this;
    }	
    /**
     * False to allow user interaction with the page while the message box is displayed (defaults to true)
     * @return bool
    */
    public function getModal() {
        return $this->getExtConfigProperty("modal");
    }
    
    // Msg
    /**
     * A string that will replace the existing message box body text (defaults to the XHTML-compliant non-breaking space character ' ')
     * @param string $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setMsg($value) {
        $this->setExtConfigProperty("msg", $value);
        return $this;
    }	
    /**
     * A string that will replace the existing message box body text (defaults to the XHTML-compliant non-breaking space character ' ')
     * @return string
    */
    public function getMsg() {
        return $this->getExtConfigProperty("msg");
    }
    
    // Multiline
    /**
     * True to prompt the user to enter multi-line text (defaults to false)
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setMultiline($value) {
        $this->setExtConfigProperty("multiline", $value);
        return $this;
    }	
    /**
     * True to prompt the user to enter multi-line text (defaults to false)
     * @return bool
    */
    public function getMultiline() {
        return $this->getExtConfigProperty("multiline");
    }
    
    // Progress
    /**
     * True to display a progress bar (defaults to false)
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setProgress($value) {
        $this->setExtConfigProperty("progress", $value);
        return $this;
    }	
    /**
     * True to display a progress bar (defaults to false)
     * @return bool
    */
    public function getProgress() {
        return $this->getExtConfigProperty("progress");
    }
    
    // ProgressText
    /**
     * The text to display inside the progress bar if progress = true (defaults to '')
     * @param string $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setProgressText($value) {
        $this->setExtConfigProperty("progressText", $value);
        return $this;
    }	
    /**
     * The text to display inside the progress bar if progress = true (defaults to '')
     * @return string
    */
    public function getProgressText() {
        return $this->getExtConfigProperty("progressText");
    }
    
    // Prompt
    /**
     * True to prompt the user to enter single-line text (defaults to false)
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setPrompt($value) {
        $this->setExtConfigProperty("prompt", $value);
        return $this;
    }	
    /**
     * True to prompt the user to enter single-line text (defaults to false)
     * @return bool
    */
    public function getPrompt() {
        return $this->getExtConfigProperty("prompt");
    }
    
    // ProxyDrag
    /**
     * True to display a lightweight proxy while dragging (defaults to false)
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setProxyDrag($value) {
        $this->setExtConfigProperty("proxyDrag", $value);
        return $this;
    }	
    /**
     * True to display a lightweight proxy while dragging (defaults to false)
     * @return bool
    */
    public function getProxyDrag() {
        return $this->getExtConfigProperty("proxyDrag");
    }
    
    // Title
    /**
     * The title text
     * @param string $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setTitle($value) {
        $this->setExtConfigProperty("title", $value);
        return $this;
    }	
    /**
     * The title text
     * @return string
    */
    public function getTitle() {
        return $this->getExtConfigProperty("title");
    }
    
    // Value
    /**
     * The string value to set into the active textbox element if displayed
     * @param string $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setValue($value) {
        $this->setExtConfigProperty("value", $value);
        return $this;
    }	
    /**
     * The string value to set into the active textbox element if displayed
     * @return string
    */
    public function getValue() {
        return $this->getExtConfigProperty("value");
    }
    
    // Wait
    /**
     * True to display a progress bar (defaults to false)
     * @param bool $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setWait($value) {
        $this->setExtConfigProperty("wait", $value);
        return $this;
    }	
    /**
     * True to display a progress bar (defaults to false)
     * @return bool
    */
    public function getWait() {
        return $this->getExtConfigProperty("wait");
    }
    
    // WaitConfig
    /**
     * A PhpExt_ProgressBarWaitConfig object (applies only if wait = true)
     * @param PhpExt_ProgressBarWaitConfig $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setWaitConfig($value) {
        $this->setExtConfigProperty("waitConfig", $value);
        return $this;
    }	
    /**
     * A PhpExt_ProgressBarWaitConfig object (applies only if wait = true)
     * @return PhpExt_ProgressBarWaitConfig
    */
    public function getWaitConfig() {
        return $this->getExtConfigProperty("waitConfig");
    }
    
    // Width
    /**
     * The width of the dialog in pixels
     * @param int $value 
     * @return PhpExt_MessageBoxOptions
     */
    public function setWidth($value) {
        $this->setExtConfigProperty("width", $value);
        return $this;
    }	
    /**
     * The width of the dialog in pixels
     * @return int
    */
    public function getWidth() {
        return $this->getExtConfigProperty("width");
    }
        
	public function __construct() {
		parent::__construct();

		$validProps = array(
		    "animEl",
		    "buttons",
		    "closable",
		    "cls",
		    "defaultTextHeight",
		    "fn",
		    "scope",
		    "icon",
		    "iconCls",
		    "maxWidth",
		    "minWidth",
		    "modal",
		    "msg",
		    "multiline",
		    "progress",
		    "progressText",
		    "prompt",
		    "proxyDrag",
		    "title",
		    "value",
		    "wait",
		    "waitConfig",
		    "width"
		);
		$this->addValidConfigProperties($validProps);
				
	}

	/**
	 * Helper function to easily create an instance to add configuration properties inline
	 *
	 * @return PhpExt_MessageBoxOptions
	 */
	public static function createMsgOptions() {
	    return new PhpExt_MessageBoxOptions();
	}
 	
	
}

