<?php

/**
 * Menu Tree
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Menu
 * @subpackage
 * @version		$Id$
 */
class Menu_Tree extends Menu_Plain {

    protected $base_url;

    /**
     * Constructor
     * 
     * @param type $name 
     */
    public function __construct($name,$template=NULL,$base_url = NULL) {
        parent::__construct($name,$template);
        $this->base_url = rtrim(parse_url($base_url ? $base_url : Url::link(),PHP_URL_PATH),'/');
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
        while ($pieces) {
            $path = implode('/', $pieces);
            if ($path && strpos($uri, $path) !== FALSE) {
                foreach($this as $item){
                    $link = !$this->base_url OR strpos($item->link,$this->base_url) !== FALSE ? $item->link : $this->base_url.$item->link; 
                    if(strpos($link,$path) !== FALSE){
                        $item->active = TRUE;
                    }
                }
            }
            array_pop($pieces);
        }
    }

}