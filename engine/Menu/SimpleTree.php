<?php

/**
 * Simple Tree Menu 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Menu
 * @subpackage
 * @version		$Id$
 */
class Menu_SimpleTree extends Template {

    protected $structure;

    /**
     * Adopt data
     * 
     * @param array $data 
     */
    public function adopt($data) {
        $this->structure = new Core_ArrayObject($data);
        event('menu.' . $this->name, &$this->structure);
    }

    /**
     * Set active elements
     * 
     * @param array $args 
     */
    public function setActive($args) {
        $rev_args = array_reverse((array) $args);
        $current = & $this->structure;
        while ($key = array_pop($rev_args)) {
            if (isset($current[$key])) {
                if (isset($current[$key]['#value'])) {
                    $current[$key]['#value']['active'] = TRUE;
                    array_push($rev_args, 'index');
                } else {
                    $current[$key]['active'] = TRUE;
                }
                $current = & $current[$key];
            }
        }
    }

    /**
     * Render menu
     */
    public function render() {
        $this->bind('data', &$this->structure);
        return parent::render();
    }

}
