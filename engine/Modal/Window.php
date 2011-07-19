<?php

/**
 * Modal window
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          
 * @version		$Id$
 */
class Modal_Window extends Options {
    protected $name;
    /**
     * Options
     * 
     * @link http://fancybox.net/api
     * @var array 
     */
    protected $options = array(
        'padding' => NULL,
        'margin' => NULL,
        'opacity' => NULL,
        'modal' => NULL,
        'cyclic' => NULL,
        'scrolling' => NULL,
        'width' => NULL,
        'height' => NULL,
        'autoScale' => NULL,
        'autoDimensions' => NULL,
        'centerOnScroll' => NULL,
        'ajax' => NULL,
        'swf' => NULL,
        'hideOnOverlayClick' => NULL,
        'hideOnContentClick' => NULL,
        'overlayShow' => NULL,
        'overlayOpacity' => NULL,
        'overlayColor' => NULL,
        'titleShow' => NULL,
        'titlePosition' => NULL,
        'titleFormat' => NULL,
        'transitionIn' => NULL,
        'transitionOut' => NULL,
        'speedIn' => NULL,
        'speedOut' => NULL,
        'changeSpeed' => NULL,
        'changeFade' => NULL,
        'easingIn',
        'easingOut' => NULL,
        'showCloseButton' => NULL,
        'showNavArrows' => NULL,
        'enableEscapeButton' => NULL,
        'onStart' => NULL,
        'onCancel' => NULL,
        'onComplete' => NULL,
        'onCleanup' => NULL,
        'onClosed' => NULL,
        'type' => 'image',
        'href' => NULL,
        'title' => NULL,
        'content' => NULL,
        'orig' => NULL,
        'index' => NULL,
    );

    /**
     * Constructor
     *  
     * @param string $name 
     * @param array $options
     */
    public function __construct($name, $options = NULL) {
        $this->name = $name;
        parent::__construct($options);
    }
    /**
     * Render modal window
     */
    public function render(){
        switch($this->options->type){
            case 'image':
            case ''
        }
        inline_js('$(document).ready(function(){
            
        })');
    }
}