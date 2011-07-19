<?php
/**
 * jQueryTools gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          
 * @version		$Id$
 */
class jQueryTools_Gear extends Gear {

    protected $name = 'jQueryTools';
    protected $description = 'Add jQueryTools library.';
    protected $package = 'jQuery';
    protected $order = 0;

    /**
     * Init
     */
    public function init() {
        parent::init();
        $cogear = getInstance();
    }
}