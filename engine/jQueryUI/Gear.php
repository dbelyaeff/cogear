<?php
/**
 *  jQuery UI Gear 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class jQueryUI_Gear extends Gear{
    protected $name = 'jQuery UI';
    protected $description = 'Provide jQuery UI support.';
    protected $package = 'jQuery';
    protected $order = -99;
    protected $settings = array(
        'theme' => 'ui-lightness',
    );
    
    public function init(){
        $cogear = getInstance();
        parent::init();
        $cogear->assets->addStyle($this->dir.DS.'css'.DS.$this->settings->theme.DS.'jquery-ui-1.8.10.custom.css');
    }
}