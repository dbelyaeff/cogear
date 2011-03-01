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
 * @see PhpExt_Panel
 */
include_once 'PhpExt/Panel.php';



/**
 * A specialized panel intended for use as an application window. Windows are floated and draggable by default, and also provide specific behavior like the ability to maximize and restore (with an event for minimizing, since the minimize behavior is application-specific).
 * @package PhpExt
 */
class PhpExt_Window extends PhpExt_Panel
{
	const CLOSE_ACTION_CLOSE = 'close';
	const CLOSE_ACTION_HIDE = 'hide';

	// AnimateTarget
	/**
	 * Id or element from which the window should animate while opening (defaults to null with no animation).
	 * @param string $value
	 * @return PhpExt_Window
	 */
	public function setAnimateTarget($value) {
		$this->setExtConfigProperty("animateTarget", $value);
		return $this;
	}	
	/**
	 * Id or element from which the window should animate while opening (defaults to null with no animation).
	 * @return string
	 */
	public function getAnimateTarget() {
		return $this->getExtConfigProperty("animateTarget");
	}
	
	// BaseCssClass
	/**
	 * The base CSS class to apply to this panel's element (defaults to 'x-window').
	 * @param string $value
	 * @return PhpExt_Window
	 */
	public function setBaseCssClass($value) {
		return parent::setBaseCssClass($value);
	}	
	/**
	 * The base CSS class to apply to this panel's element (defaults to 'x-window').
	 * @return string
	 */
	public function getBaseCssClass() {
		return parent::getBaseCssClass();
	}
	
	// Closable
	/**
	 * True to display the 'close' tool button and allow the user to close the window, false to hide the button and disallow closing the window (default to true).
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setClosable($value) {
		$this->setExtConfigProperty("closable", $value);
		return $this;
	}	
	/**
	 * True to display the 'close' tool button and allow the user to close the window, false to hide the button and disallow closing the window (default to true).
	 * @return boolean
	 */
	public function getClosable() {
		return $this->getExtConfigProperty("closable");
	}
	
	// CloseAction
	/**
	 * The action to take when the close button is clicked. The default action is PhpExt_Window::CLOSE_ACTION_CLOSE which will actually remove the window from the DOM and destroy it. The other valid option is PhpExt_Window::CLOSE_ACTION_HIDE which will simply hide the window by setting visibility to hidden and applying negative offsets, keeping the window available to be redisplayed via the show method.
	 * @uses PhpExt_Window::CLOSE_ACTION_CLOSE
	 * @uses PhpExt_Window::CLOSE_ACTION_HIDE
	 * @param string $value
	 * @return PhpExt_Window
	 */
	public function setCloseAction($value) {
		$this->setExtConfigProperty("closeAction", $value);
		return $this;
	}	
	/**
	 * The action to take when the close button is clicked. The default action is PhpExt_Window::CLOSE_ACTION_CLOSE which will actually remove the window from the DOM and destroy it. The other valid option is PhpExt_Window::CLOSE_ACTION_HIDE which will simply hide the window by setting visibility to hidden and applying negative offsets, keeping the window available to be redisplayed via the show method.
	 * @uses PhpExt_Window::CLOSE_ACTION_CLOSE
	 * @uses PhpExt_Window::CLOSE_ACTION_HIDE
	 * @return string
	 */
	public function getCloseAction() {
		return $this->getExtConfigProperty("closeAction");
	}
	
	// Constrain
	/**
	 * True to constrain the window to the viewport, false to allow it to fall outside of the viewport (defaults to false). Optionally the header only can be constrained using setConstrainHeader.
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setConstrain($value) {
		$this->setExtConfigProperty("contrain", $value);
		return $this;
	}	
	/**
	 * True to constrain the window to the viewport, false to allow it to fall outside of the viewport (defaults to false). Optionally the header only can be constrained using setConstrainHeader.
	 * @return boolean
	 */
	public function getConstrain() {
		return $this->getExtConfigProperty("contrain");
	}
	
	// ConstrainHeader
	/**
	 * True to constrain the window header to the viewport, allowing the window body to fall outside of the viewport, false to allow the header to fall outside the viewport (defaults to false). Optionally the entire window can be constrained using setConstrain.
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setConstrainHeader($value) {
		$this->setExtConfigProperty("contrainHeader", $value);
		return $this;
	}	
	/**
	 * True to constrain the window header to the viewport, allowing the window body to fall outside of the viewport, false to allow the header to fall outside the viewport (defaults to false). Optionally the entire window can be constrained using setConstrain.
	 * @return boolean
	 */
	public function getConstrainHeader() {
		return $this->getExtConfigProperty("contrainHeader");
	}
	
	// DefaultButton
	/**
	 * The id / index of a button or a button instance to focus when this window received the focus.
	 * @param string|integer|PhpExt_Button $value
	 * @return PhpExt_Window
	 */
	public function setDefaultButton($value) {
		$this->setExtConfigProperty("defaultButton", $value);
		return $this;
	}	
	/**
	 * The id / index of a button or a button instance to focus when this window received the focus.
	 * @return string|integer|PhpExt_Button
	 */
	public function getDefaultButton() {
		return $this->getExtConfigProperty("defaultButton");
	}
	
	// Draggable
	/**
	 * True to allow the window to be dragged by the header bar, false to disable dragging (defaults to true). Note that by default the window will be centered in the viewport, so if dragging is disabled the window may need to be positioned programmatically after render (e.g., myWindow.setPosition(100, 100);).
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setDraggable($value) {
		$this->setExtConfigProperty("draggable", $value);
		return $this;
	}	
	/**
	 * True to allow the window to be dragged by the header bar, false to disable dragging (defaults to true). Note that by default the window will be centered in the viewport, so if dragging is disabled the window may need to be positioned programmatically after render (e.g., myWindow.setPosition(100, 100);).
	 * @return boolean
	 */
	public function getDraggable() {
		return $this->getExtConfigProperty("draggable");
	}
	
	// ExpandOnShow
	/**
	 * True to always expand the window when it is displayed, false to keep it in its current state (which may be collapsed) when displayed (defaults to true).
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setExpandOnShow($value) {
		$this->setExtConfigProperty("expandOnShow", $value);
		return $this;
	}	
	/**
	 * True to always expand the window when it is displayed, false to keep it in its current state (which may be collapsed) when displayed (defaults to true).
	 * @return boolean
	 */
	public function getExpandOnShow() {
		return $this->getExtConfigProperty("expandOnShow");
	}
	
	// TODO: Implement WindowManager and manager property

	// Maximizable
	/**
	 * True to display the 'maximize' tool button and allow the user to maximize the window, false to hide the button and disallow maximizing the window (defaults to false). Note that when a window is maximized, the tool button will automatically change to a 'restore' button with the appropriate behavior already built-in that will restore the window to its previous size.
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setMaximizable($value) {
		$this->setExtConfigProperty("maximizable", $value);
		return $this;
	}	
	/**
	 * True to display the 'maximize' tool button and allow the user to maximize the window, false to hide the button and disallow maximizing the window (defaults to false). Note that when a window is maximized, the tool button will automatically change to a 'restore' button with the appropriate behavior already built-in that will restore the window to its previous size.
	 * @return boolean
	 */
	public function getMaximizable() {
		return $this->getExtConfigProperty("maximizable");
	}
	
	// MinHeight
	/**
	 * The minimum height in pixels allowed for this window (defaults to 100). Only applies when resizable = true.
	 * @param integer $value
	 * @return PhpExt_Window
	 */
	public function setMinHeight($value) {
		$this->setExtConfigProperty("minHeight", $value);
		return $this;
	}	
	/**
	 * The minimum height in pixels allowed for this window (defaults to 100). Only applies when resizable = true.
	 * @return integer
	 */
	public function getMinHeight() {
		return $this->getExtConfigProperty("minHeight");
	}
	
	// MinWidth
	/**
	 * The minimum width in pixels allowed for this window (defaults to 200). Only applies when resizable = true.
	 * @param integer $value
	 * @return PhpExt_Window
	 */
	public function setMinWidth($value) {
		$this->setExtConfigProperty("minWidth", $value);
		return $this;
	}	
	/**
	 * The minimum width in pixels allowed for this window (defaults to 200). Only applies when resizable = true.
	 * @return integer
	 */
	public function getMinWidth() {
		return $this->getExtConfigProperty("minWidth");
	}
	
	// Minimizable
	/**
	 * True to display the 'minimize' tool button and allow the user to minimize the window, false to hide the button and disallow minimizing the window (defaults to false). Note that this button provides no implementation -- the behavior of minimizing a window is implementation-specific, so the minimize event must be handled and a custom minimize behavior implemented for this option to be useful.
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setMinimizable($value) {
		$this->setExtConfigProperty("minimizable", $value);
		return $this;
	}	
	/**
	 * True to display the 'minimize' tool button and allow the user to minimize the window, false to hide the button and disallow minimizing the window (defaults to false). Note that this button provides no implementation -- the behavior of minimizing a window is implementation-specific, so the minimize event must be handled and a custom minimize behavior implemented for this option to be useful.
	 * @return boolean
	 */
	public function getMinimizable() {
		return $this->getExtConfigProperty("minimizable");
	}
	
	// Modal
	/**
	 * True to make the window modal and mask everything behind it when displayed, false to display it without restricting access to other UI elements (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setModal($value) {
		$this->setExtConfigProperty("modal", $value);
		return $this;
	}	
	/**
	 * True to make the window modal and mask everything behind it when displayed, false to display it without restricting access to other UI elements (defaults to false).
	 * @return boolean
	 */
	public function getModal() {
		return $this->getExtConfigProperty("modal");
	}
	
	// OnEsc
	/**
	 * Allows override of the built-in processing for the escape key. Default action is to close the Window (performing whatever action is specified in closeAction. To prevent the Window closing when the escape key is pressed, specify this as Ext.emptyFn (See Ext.emptyFn).
	 * @param PhpExt_Handler $value
	 * @return PhpExt_Window
	 */
	public function setOnEsc($value) {
		$this->setExtConfigProperty("onEsc", $value);
		return $this;
	}	
	/**
	 * Allows override of the built-in processing for the escape key. Default action is to close the Window (performing whatever action is specified in closeAction. To prevent the Window closing when the escape key is pressed, specify this as Ext.emptyFn (See Ext.emptyFn).
	 * @return PhpExt_Handler
	 */
	public function getOnEsc() {
		return $this->getExtConfigProperty("onEsc");
	}
	
	// Plain
	/**
	 * True to render the window body with a transparent background so that it will blend into the framing elements, false to add a lighter background color to visually highlight the body element and separate it more distinctly from the surrounding frame (defaults to false).
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setPlain($value) {
		$this->setExtConfigProperty("plain", $value);
		return $this;
	}	
	/**
	 * True to render the window body with a transparent background so that it will blend into the framing elements, false to add a lighter background color to visually highlight the body element and separate it more distinctly from the surrounding frame (defaults to false).
	 * @return boolean
	 */
	public function getPlain() {
		return $this->getExtConfigProperty("plain");
	}
	
	// Resizable
	/**
	 * True to allow user resizing at each edge and corner of the window, false to disable resizing (defaults to true).
	 * @param boolean $value
	 * @return PhpExt_Window
	 */
	public function setResizable($value) {
		$this->setExtConfigProperty("resizable", $value);
		return $this;
	}	
	/**
	 * True to allow user resizing at each edge and corner of the window, false to disable resizing (defaults to true).
	 * @return boolean
	 */
	public function getResizable() {
		return $this->getExtConfigProperty("resizable");
	}
	
	// TODO: Implement resizeHandles
		
	
	
	public function __construct() {
		parent::__construct();
		$this->setExtClassInfo("Ext.Window","window");

		$validProps = array(
		    "animateTarget",
		    "baseCls",
		    "closable",
		    "closeAction",
		    "constrain",
		    "constrainHeader",
		    "defaultButton",
		    "draggable",
		    "expandOnShow",
		    //"manager",
            "maximizable",
            "minHeight",
            "minWidth",
            "minimizable",
            "modal",
            "onEsc",
            "plain",
            "resizable"
            //"resizeHandles"
		);
		$this->addValidConfigProperties($validProps);
	}	
	
	public function show() {
		$args = func_get_args();
		$methodSig = $this->createMethodSignature("show", $args);
		return $this->getMethodInvokeStm($this->_varName, $methodSig);
	}
		
}

