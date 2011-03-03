<?php
/**
 * Menu Tree
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Menu
 * @subpackage
 * @version		$Id$
 */
class Menu_Tree extends Menu_Object {
    public $data = array();
    public function adopt($tree){
        $this->data = $tree;
    }
    public static function output($tree,$ul = 'ul',$li = 'li'){
        return $result;
    }
}