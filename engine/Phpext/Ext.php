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
 * @see PhpExt_Javascript
 */
include_once 'PhpExt/Javascript.php';

/**
 * 
 */

/**
 * @package PhpExt
 */
class PhpExt_Ext {	
	
	const HALIGN_LEFT = 'left';
	const HALIGN_CENTER = 'center';
	const HALIGN_RIGHT = 'right';
	
	const ELEMENT_ANCHOR_TOP_LEFT = 'tl';
	const ELEMENT_ANCHOR_TOP_CENTER = 't';
	const ELEMENT_ANCHOR_TOP_RIGHT = 'tr';
	const ELEMENT_ANCHOR_CENTER_LEFT = 'l';
	const ELEMENT_ANCHOR_CENTER = 'c';
	const ELEMENT_ANCHOR_CENTER_RIGHT = 'r';
	const ELEMENT_ANCHOR_BOTTOM_LEFT = 'bl';
	const ELEMENT_ANCHOR_BOTTOM_CENTER = 'b';
	const ELEMENT_ANCHOR_BOTTOM_RIGHT = 'br';	
	
	protected function __constructor() {		
	}
	
	static public function onReady() {
		$statements = func_get_args();
		$js  = "Ext.onReady(function(){\n";
		foreach($statements as $stm)		
			$js .= PhpExt_Javascript::output($stm)."\n";		
		$js .= "});";

		return $js;
	}
    
	/**
	 * Combines Element Anchor contants defined in PhpExt_Ext. Possible values for either parameter are:
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_TOP_LEFT}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_TOP_CENTER}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_TOP_RIGHT}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_CENTER_LEFT}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_CENTER}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_CENTER_RIGHT}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_BOTTOM_LEFT}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_BOTTOM_CENTER}
	 *   - {@link PhpExt_Ext::ELEMENT_ANCHOR_BOTTOM_RIGHT}
	 *
	 * @param string $elementAnchor
	 * @param string $targetAnchor
	 * @return string
	 */
	static public function combineAnchors($elementAnchor, $targetAnchor) {
		return $elementAnchor."-".$targetAnchor;
	}
		
}


