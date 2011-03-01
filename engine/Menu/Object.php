<?php

/**
 * Menu Object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Menu
 * @version		$Id$
 */
class Menu_Object extends Recursive_ArrayObject {

    /**
     * Menu
     *  
     * @var type 
     */
    protected $name;
    /**
     * Template
     * 
     * @var string 
     */
    protected $template = 'Menu.menu';
    /**
     * Menu elements
     * 
     * @var Core_ArrayObject
     */
    public $elements;

    /**
     * Constructor
     * 
     * @param string $name
     * @param string $template 
     */
    public function __construct($name, $template = '') {
        $this->name = $name;
        $template && $this->template = $template;
    }

    /**
     * Magic __get method
     * 
     * @param string $name
     * @return string|Core_ArrayObject
     */
    public function __get($name) {
        if (!$this->offsetExists($name)) {
            $this->offsetSet($name, new Menu_Element());
        }
        return $this->offsetGet($name);
    }

    /**
     * Magic __set method
     * 
     * @param string $name
     * @param string $value 
     */
    public function __set($name, $value) {
        $this->offsetSet($name,new Menu_Element($value));
    }

    /**
     * Render menu
     * 
     * @return string 
     */
    public function render() {
        $tpl = new Template($this->template);
        $tpl->assign('menu', $this);
        return $tpl->render();
    }

    /**
     *
     * 
     * @param type $ul
     * @param type $li
     * @return string 
     */
    public function output($ul = 'ul', $li = 'li') {
        $it = new Menu_Iterator($this->getIterator(),$ul,$li);
        while ($it->valid()){
            $it->result .= str_repeat("\t",$it->getDepth()+1).'<'.$li.'>'.$it->current()."\n";
            $it->next();
        }
//        debug(htmlspecialchars($it->getResult()));
//        die();
        return $it->getResult();
    }

}
