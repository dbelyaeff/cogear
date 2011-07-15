<?php
/**
 * Simple Text Widget
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Widgets_Simple_Text extends Pages_Widget{
    public function render(){
        return $this->data;
    }
    public function options(){
        
    }
}