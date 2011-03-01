<?php

/**
 *  Menu iterator 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Menu_Iterator extends RecursiveIteratorIterator {

    private $ul;
    private $li;
    public $result = '';
    protected $last_depth = 0;

    public function __construct($iterator, $ul = 'ul', $li = 'li') {
        parent::__construct($iterator);
        $this->ul = $ul;
        $this->li = $li;
    }

    function beginChildren() {
        if ($this->getDepth() > $this->last_depth) {
            $this->result .= ($this->getDepth() > 1 ? str_repeat("\t", $this->getDepth()+1) : '')  . "<{$this->ul}>\n";
        }
    }

    function current() {
        $this->last_depth = $this->getDepth();
        $this->getDepth() == 0 && $this->next();
        return parent::current();
    }

    function endChildren() {
        if ($this->getDepth() < $this->last_depth) {
            $this->result .= str_repeat("\t", $this->getDepth()+2) . "</{$this->ul}>\n";
            $this->result .= str_repeat("\t", $this->getDepth()+1) . "</{$this->li}>\n";
        }
        elseif($this->getDepth() >= $this->last_depth){
            $this->result .= str_repeat("\t", $this->getDepth()+1) . "</{$this->li}>\n";
        }
    }

    function getResult() {
        return $this->result . '</' . $this->ul . '>';
    }

}
