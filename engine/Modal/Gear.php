<?php

/**
 * Modal gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Modal
 * @version		$Id$
 */
class Modal_Gear extends Gear {

    protected $name = 'Modal';
    protected $description = 'Handle with modal dialogs and windows.';
    protected $type = Gear::MODULE;
    protected $package = 'Modal';
    protected $order = 100;

    /**
     * Init
     */
    public function init() {
        parent::init();
        hook('done', array($this, 'showFlash'));
    }

    /**
     * Show flash messages from session storage
     */
    public function showFlash() {
        $cogear = getInstance();
        if ($cogear->session->messages) {
            foreach ($cogear->session->messages as $message) {
                self::show($message['text'], $message['title'], $message['class']);
            }
            $cogear->session->messages = NULL;
        }
    }

    /**
     * Set flash message to storage
     */
    public static function flash($text, $title = '', $class='info') {
        $cogear = getInstance();
        $cogear->session->messages OR $cogear->session->messages = new Core_ArrayObject();
        $cogear->session->messages->append(array('text' => $text, 'title' => $title, 'class' => $class));
    }

    /**
     * Show modal window
     * 
     * @param   string    $text
     * @param   string  $title
     * @param   string  $class
     */
    public static function show($text, $title = '', $class='info') {
        self::render('Modal.Modal', array('title' => $title ? $title : t('Info', 'Modal'), 'description' => $text, 'class' => $class));
    }

    /**
     * Render Modal to output
     */
    public static function render($template, $params) {
        $template = new Template($template);
        $template->set($params);
        $cogear = getInstance();
        prepend('content', $template->render());
    }

    /**
     * Show message using overlay
     */
    public static function overlay($text, $title='', $class='info') {
        $cogear = getInstance();
        $theme = $cogear->get('errors.theme', 'Theme_Splash');
        if ($cogear->setTheme($theme, TRUE)) {
            $cogear->assets->clear();
            $cogear->theme->init();
            $cogear->theme->activate();
            self::show($text, $title, $class);
            $cogear->theme->render();
            $cogear->response->send();
            die();
        }
    }

}

function overlay($text, $title = '') {
    Modal_Gear::overlay($text, $title ? $title : t('Error', 'Errors'), 'error');
}

function flash_error($text, $title='') {
    Modal_Gear::flash($text, $title ? $title : t('Error', 'Errors'), 'error');
}

function error($text, $title='') {
    Modal_Gear::show($text, $title ? $title : t('Error', 'Errors'), 'error');
}

function flash_info($text, $title='Notice') {
    Modal_Gear::flash($text, $title);
}

function info($text, $title='Notice') {
    Modal_Gear::show($text, $title);
}

function flash_success($text, $title='Success') {
    Modal_Gear::flash($text, $title, 'success');
}

function success($text, $title='Success') {
    Modal_Gear::show($text, $title, 'success');
}
