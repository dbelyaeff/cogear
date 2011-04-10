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
class TinyMCE_Editor extends Wysiwyg_Abstract {
    protected $options = array(
        'theme' => 'advanced',
        'theme_advanced_toolbar_location' => 'top',
        'theme_advanced_toolbar_align' => 'left',
        'theme_advanced_statusbar_location' => 'bottom',
        'theme_advanced_resizing' => 'true',
        'plugins' => 'pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
        'theme_advanced_buttons1' => 'save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect',
        'theme_advanced_buttons2' => 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor',
        'theme_advanced_buttons3' => 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
        'theme_advanced_buttons4' => 'insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak',
        'skin' => 'o2k7',
    );
    protected $path;
    /**
     * Load editor
     */
    public function load() {
        $this->path = Url::toUri(dirname(__FILE__)) . '/tinymce/jscripts/tiny_mce/';
        js($this->path . 'jquery.tinymce.js');
    }
    /**
     * Render
     * 
     * @return string
     */
    public function render() {
        $this->options['lang'] = config('site.locale','en');
        $this->options['script_url'] = Url::toUri(dirname(__FILE__)) . '/tinymce/jscripts/tiny_mce/'.'tiny_mce.js';
        inline_js("$(document).ready(
		function()
		{
         $('#{$this->getId()} textarea').tinymce(".json_encode($this->options).");
		}
	);");
        return parent::render();
    }

}