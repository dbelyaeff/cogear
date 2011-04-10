<?php

/**
 * TinyMCE Editor
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Wysiwyg
 * @version		$Id$
 */
class CKEditor_Editor extends Wysiwyg_Abstract {
    protected $options = array(
    );
    protected $path;
    /**
     * Load editor
     */
    public function load() {
        $this->path = Url::toUri(dirname(__FILE__)) . '/ckeditor/';
        js($this->path . 'ckeditor.js');
        js($this->path . 'adapters/jquery.js');
    }
    /**
     * Render
     * 
     * @return string
     */
    public function render() {
        $this->options['language'] = config('site.locale','en');
        inline_js("$(document).ready(
		function()
		{
        $('#{$this->getId()} textarea').ckeditor(function(){},".json_encode($this->options).");
		}
	);");
        return parent::render();
    }

}