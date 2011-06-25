<?php

/**
 * Menu Object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Menu
 * @subpackage
 * @version		$Id$
 */
class Menu_Object extends Options {

    protected $name;
    protected $base_url;

    /**
     * Constructor
     * 
     * @param type $name 
     */
    public function __construct($name,$base_url = NULL) {
        $this->name = $name;
        $this->base_url = rtrim(parse_url($base_url ? $base_url : Url::link(),PHP_URL_PATH),'/');
    }

    /**
     * Get menu name
     * 
     * @return string 
     */
    public function getName() {
        return preg_replace('#([^a-z-]+)#imsU', '-', $this->name);
    }

    /**
     * Set active element
     * 
     * @param string $uri
     */
    public function setActive($uri = NULL) {
        if (!sizeof($this)) {
            return;
        }
        $cogear = getInstance();
        $uri OR $uri = $cogear->router->getUri();
        $uri = str_replace($this->base_url, '', '/'.$uri);
        $pieces = explode('/', trim($uri, '/'));
        $path = '';
        debug($this->name);
        while ($pieces) {
            $path = implode('/', $pieces);
            if($this->name == 'User.login'){
                debug($path);
            }
            if ($path && strpos($uri, $path) !== FALSE) {
                foreach($this as $item){
                    $link = strpos($item->link,$this->base_url) !== FALSE ? $item->link : $this->base_url.$item->link; 
                    if(strpos($link,$path) !== FALSE){
                        $item->active = TRUE;
                    }
                }
            }
            array_pop($pieces);
        }
    }

    /**
     * Render menu
     * 
     * @param string $tpl
     */
    public function render($tpl = 'Menu.menu') {
        event('menu.' . $this->name, $this);
        $this->ksort();
        $this->setActive();
        $tpl = new Template($tpl);
        $tpl->menu = $this;
        return $tpl->render();
    }

}