<?php

/**
 * Notifications
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Notify_Gear extends Gear {

    protected $name = 'Notify';
    protected $description = 'Notify user about events';

    
    public static function show($text, $title = '',$class='info') {
        self::render('Notify.notify', array('title' => $title ? $title : t('Info', 'Notify'), 'description' => $text, 'class' => $class));
    }

    public static function render($template, $params) {
        $template = new Template($template);
        $template->set($params);
        $cogear = getInstance();
        prepend('content', $template->render());
    }

}

function error($text, $title='') {
    Notify_Gear::show($text,$title ? $title : t('Error','Errors'),'error');
}
function info($text, $title='') {
    Notify_Gear::show($text,$title);
}