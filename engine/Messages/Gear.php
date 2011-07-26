<?php
/**
 * Messages gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          messages
 * @version		$Id$
 * 
 * @todo
 * 
 * Integrate with jGrowl.
 */
class Messages_Gear extends Gear {

    protected $name = 'Messages';
    protected $description = 'Handle with messages dialogs and windows.';
    protected $order = 100;
    protected $template = 'Messages.window';
    protected $version = '0.1';
    const INFO = 0;
    const DIALOG = 1;
    const AJAX = 2;

    /**
     * Init
     */
    public function init() {
        parent::init();
        hook('done', array($this, 'showFlash'));
    }

    /**
     * Show messages window
     * 
     * @param string $content
     * @param string $title
     * @param string $class
     * @param int $type 
     */
    public function show($content = NULL, $title = NULL, $class = 'info', $type = NULL) {
        $tpl = new Template($this->template);
        $tpl->title = $title OR t('Info');
        $tpl->content = $content;
        $tpl->class = $class;
        $tpl->type = $type ? $type : self::INFO;
        inject('content', $tpl->render(),-1);
    }

    /**
     * Set flash message
     * 
     * @param string $content
     * @param string $title
     * @param string $class
     * @param int $type 
     */
    public function flash($content = NULL, $title = NULL, $class = 'info', $type = NULL) {
        $data = func_get_args();
        $cogear = getInstance();
        $cogear->session->messages OR $cogear->session->messages = new Core_ArrayObject();
        $cogear->session->messages->append($data);
    }

    /**
     * Show flashed messages
     */
    public function showFlash() {
        $cogear = getInstance();
        if ($cogear->session->messages) {
            foreach ($cogear->session->messages as $offset => $data) {
                call_user_func_array(array($this, 'show'), $data);
            }
            $cogear->session->destroy('messages');
        }
    }

}

/**
 * Show success messages dialog
 * 
 * @param string $content
 * @param string $title
 * @param string $class 
 */
function success($content=NULL, $title=NULL, $class='success') {
    $content OR $content = t('Operation is successfully completed.');
    $title OR $title = t('Success');
    cogear()->messages->show($content, $title, $class);
}

/**
 * Show flash success messages dialog
 * 
 * @param string $content
 * @param string $title
 * @param string $class 
 */
function flash_success($content=NULL, $title=NULL, $class='success') {
    $content OR $content = t('Operation is successfully completed.');
    $title OR $title = t('Success');
    cogear()->messages->flash($content, $title, $class);
}

/**
 * Show info messages dialog
 * 
 * @param string $content
 * @param string $title
 * @param string $class 
 */
function info($content=NULL, $title=NULL, $class='info') {
    $content OR $content = t('Please pay attetion to this notification.');
    $title OR $title = t('Info');
    cogear()->messages->show($content, $title, $class);
}

/**
 * Show flash info messages dialog
 * 
 * @param string $content
 * @param string $title
 * @param string $class 
 */
function flash_info($content=NULL, $title=NULL, $class='info') {
    $content OR $content = t('Please pay attetion to this notification.');
    $title OR $title = t('Info');
    cogear()->messages->flash($content, $title, $class);
}

/**
 * Show error messages dialog
 * 
 * @param string $content
 * @param string $title
 * @param string $class 
 */
function error($content=NULL, $title=NULL, $class='error') {
    $content OR $content = t('Operation failed.');
    $title OR $title = t('Failure');
    cogear()->messages->show($content, $title, $class);
}

/**
 * Show flash error messages dialog
 * 
 * @param string $content
 * @param string $title
 * @param string $class 
 */
function flash_error($content=NULL, $title=NULL, $class='error') {
    $content OR $content = t('Operation failed.');
    $title OR $title = t('Failure');
    cogear()->messages->flash($content, $title, $class);
}
