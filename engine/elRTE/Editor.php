<?php

/**
 * elRTE Editor
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		elRTE
 * @subpackage          Wysiwyg
 * @version		$Id$
 */
class elRTE_Editor extends Wysiwyg_Abstract {
    protected $options = array(
        'styleWithCSS' => FALSE,
        'height' => 400,
        'toolbar' => 'maxi',
    );
    /**
     * Load editor
     */
    public function load() {
        $path = Url::toUri(dirname(__FILE__)) . '/elrte-1.2/';
        css($path . 'css/elrte.full.css');
        js($path . 'js/elrte.full.js');
    }
    /**
     * Render
     * 
     * @return string
     */
    public function render() {
        $this->options['lang'] = config('site.locale','en');
        inline_js("$(document).ready(
		function()
		{
                  var opts = ".json_encode($this->options).";
         $('#{$this->getId()} textarea').elrte(opts);
		}
	);");
        return parent::render();
    }

}