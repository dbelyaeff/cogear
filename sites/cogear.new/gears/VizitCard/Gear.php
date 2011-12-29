<?php

/**
 * Install gear
 *
 * @author		Naumov Aleksandr <inetlover@gmail.com>
 * @copyright		Copyright (c) 2011, Naumov Aleksandr
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          VizitCard
 * @version		$Id$
 */
class VizitCard_Gear extends Gear {

    protected $name = 'VizitCard';
    protected $description = 'The site in one page.';
    protected $type = Gear::CORE;
    protected $package = 'Core';
    protected $order = 0;

    /**
     * Init
     */
    public function init() {
        parent::init();
    }

    public function index() {
        $this->theme->choose('VizitCard_Theme_Default');
    }

}
