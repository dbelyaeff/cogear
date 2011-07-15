<?php
/**
 * Tiny MCE gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class TinyMCE_Gear extends Gear {
    protected $name = 'TinyMCE';
    protected $description = 'Perform the most famous WYSIWYG editor.';
    protected $order = -11;
    /**
     * Init
     */
    public function init(){
        parent::init();
        Wysiwyg_Gear::$editors['tinymce'] = 'TinyMCE_Editor';
    }
}