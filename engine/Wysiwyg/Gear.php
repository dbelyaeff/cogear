<?php
/**
 * WYSIWYG gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Wysiwyg_Gear extends Gear {
    protected $name = 'WYSIWYG';
    protected $description = 'Visual editors manager.';
    public static $editors = array(
        'redactor' => 'Wysiwyg_Redactor_Editor',
    );
    protected $order = -10;
    /**
     * Init
     */
    public function init(){
        parent::init();
        Form_Manager::$types['textarea'] = self::$editors[config('wysiwyg.editor','redactor')];
    }
}