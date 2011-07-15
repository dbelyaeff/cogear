<?php
/**
 * CKEditor gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		CKEditor
 * @subpackage          Wysiwyg
 * @version		$Id$
 */
class CKEditor_Gear extends Gear {
    protected $name = 'CKEditor';
    protected $description = 'Perform CKEditor.';
    protected $order = -11;
    /**
     * Init
     */
    public function init(){
        parent::init();
        Wysiwyg_Gear::$editors['ckeditor'] = 'CKEditor_Editor';
    }
}