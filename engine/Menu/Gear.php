<?php
/**
 * Menu gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Menu_Gear extends Gear {
    protected $name = 'Menu';
    protected $description = 'Build navigation menues';
    protected $menus;
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->menus = new Core_ArrayObject(); 
    }
}
