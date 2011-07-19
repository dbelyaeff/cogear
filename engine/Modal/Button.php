<?php
/**
 * Modal button
 * 
 * Calls for modal window
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          
 * @version		$Id$
 */
class Modal_Button extends Options{
    protected $window;
    public function __construct(Modal_Window $window){
        $this->window = $window;
    }
    /**
     * Render modal button
     */
    public function render(){
        return HTML::a()
    }
}
