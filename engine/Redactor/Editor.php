<?php

/**
 *  Redactor WYSIWYG editor 
 * 
 *  http://imperavi.ru/redactor/
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Redactor_Editor extends Wysiwyg_Abstract {

    protected $options = array(
        'focus' => TRUE,
        );
    /**
     * Constructor
     * 
     * @param array $options 
     */
    public function __construct($options  = array()) {
        $this->options['image_upload'] =  Url::gear('upload').'image';
        parent::__construct($options);
    }
    /**
     * Load scripts
     */
    public function load() {
        $path = Url::toUri(dirname(__FILE__));
        js($path . '/editor/editor.js');
        css($path . '/editor/css/editor.css');
    }

    /**
     * Render
     * 
     * @return string
     */
    public function render() {
        inline_js("$(document).ready(
		function()
		{
			$('#{$this->getId()} textarea').editor(" . json_encode((array)$this->options) . ");
		}
	);");
        return parent::render();
    }

}
