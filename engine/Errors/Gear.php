<?php
/**
 *  Errors gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Errors_Gear extends Gear {
    protected $name = 'Errors gear';
    protected $description = 'Handle errors';
    protected $order =  1;
    /**
     * Init
     */
    public function init(){
        $cogear = getInstance();
        $cogear->errors = $this;
        parent::init();
    }
    /**
     * Show error
     * @param string $text
     * @param string $title 
     */
    public function show($text,$title = ''){
        Message::error($text,$title = '');
    }
}