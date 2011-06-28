<?php
/**
 * Grid text element 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Grid
 * @subpackage
 * @version		$Id$
 */
class Grid_Element_Text extends Grid_Row {
    protected $text;
    /**
     * 
     * @param   string $text
     */
    public function __construct($text){
        $this->text = $text;
    }
    public function render(){
        return $this->text;
    }
}
