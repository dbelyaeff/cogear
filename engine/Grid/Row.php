<?php
/**
 * Grid Row
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Grid
 * @subpackage
 * @version		$Id$
 */
class Grid_Row extends Nameable {
    protected $data;
    protected $field;
    /**
     * Constructor
     * 
     * @param string $name
     * @param array $data
     * @param array $field 
     */
    public function __construct($name,$data,$field){
        $this->name = $name;
        $this->data = $data;
        $this->field = $field;
    }
    /**
     * 
     */
    function render(){
       return (string)$this->data; 
    }
}
