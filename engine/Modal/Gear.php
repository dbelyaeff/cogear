<?php
/**
 * Modal windows gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          
 * @version		$Id$
 */
class Modal_Gear extends Gear {
    protected $name = 'Modal';
    protected $description = 'Operate modal gears';
    protected $order = 0;
    
    public function index(){
        $window = new Modal_Window();
    }
}