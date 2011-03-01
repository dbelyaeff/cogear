<?php
/**
 *  Meta widget
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Meta_Widget extends Pages_Widget {
    public function render(){
        $cogear = getInstance();
        $meta = $cogear->meta->info;
        $output[] = HTML::paired_tag('title', $meta->title);
        $output[] = HTML::tag('meta',array('type'=>'keywords','content'=>$meta->keywords->toString(', ')));
        $output[] = HTML::tag('meta',array('type'=>'description','content'=>$meta->description));
        return implode("\n",$output);
    }
    public function options(){

    }
}