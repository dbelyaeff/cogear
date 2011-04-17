<?php
/**
 * Menu Item
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Menu
 * @subpackage
 * @version		$Id$
 */
class Menu_Item extends Options {
    protected $active;
    protected $link;
    protected $text;

    /**
     * Constructor
     * 
     * @param string $link
     * @param string $text 
     */
    public function __construct($link,$text) {
        $this->link = $link;
        $this->text = $text;
    }
}