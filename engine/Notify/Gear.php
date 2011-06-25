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
    
    public function init(){
        parent::init();
        hook('done',array($this,'showFlash'));
    }
    
    public function showFlash(){
        $cogear = getInstance();
        if($cogear->session->messages){
            foreach($cogear->session->messages as $message){
                self::show($message['text'],$message['title'],$message['class']);
            }
            $cogear->session->messages = NULL;
        }
    }
    public static function flash($text,$title = '',$class='info'){
        $cogear = getInstance();
        $cogear->session->messages OR $cogear->session->messages = new Core_ArrayObject();
        $cogear->session->messages->append(array('text'=>$text,'title'=>$title,'class'=>$class));
    }
    
    public static function show($text, $title = '',$class='info') {
        self::render('Notify.notify', array('title' => $title ? $title : t('Info', 'Notify'), 'description' => $text, 'class' => $class));
    }

    public static function render($template, $params) {
        $template = new Template($template);
        $template->set($params);
        $cogear = getInstance();
        prepend('content', $template->render());
    }
    
    public static function overlay($text,$title='',$class='info'){
        $cogear = getInstance();
        $theme = $cogear->get('errors.theme','Theme_Splash');
        if($cogear->setTheme($theme,TRUE)){
            $cogear->assets->clear();
            $cogear->theme->init();
            $cogear->theme->activate();
            self::show($text,$title,$class);
            $cogear->theme->render();
            $cogear->response->send();
            die();
        }
    }
}
function overlay($text, $title = ''){
    Notify_Gear::overlay($text,$title ? $title : t('Error','Errors'),'error');
}
function flash_error($text, $title='') {
    Notify_Gear::flash($text,$title ? $title : t('Error','Errors'),'error');
}
function error($text, $title='') {
    Notify_Gear::show($text,$title ? $title : t('Error','Errors'),'error');
}
function flash_info($text, $title='Notice'){
    Notify_Gear::flash($text,$title);
}
function info($text, $title='Notice'){
    Notify_Gear::show($text,$title);
}
function flash_success($text, $title='Success'){
    Notify_Gear::flash($text,$title,'success');
}
function success($text, $title='Success'){
    Notify_Gear::show($text,$title,'success');
}