<?php

/**
 * Grid Object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Grid_Object extends Nameable{

    protected $fields;
    /**
     * Raw data
     *  
     * @var array
     */
    protected $data;
    /**
     * Data converted to Grid lines
     * 
     * @var object 
     */
    protected $lines;
    protected $template;
    public static $types = array(
        'text' => 'Grid_Element_Text',
        'checkbox' => 'Grid_Element_Checkbox',
        'image' => 'Grid_Element_Image',
    );

    /**
     * Constructor
     *  
     * @param string $name
     * @param array $fields
     * @param array $data 
     */
    public function __construct($name, $fields = NULL, $data = NULL, $template = 'Grid.grid') {
        $this->name = $name;
        $this->fields = Core_ArrayObject::transform($fields);
        $this->data = Core_ArrayObject::transform($data);
        $this->template = $template;
        $this->lines = new Core_ArrayObject();
    }

    /**
     * Set fields
     * 
     * @param array $fields 
     */
    public function setFields($fields) {
        $this->fields = Core_ArrayObject::transform($fields);
        return $this;
    }

    /**
     * Set data
     * 
     * @param array $data 
     */
    public function setData($data) {
        $this->data = Core_ArrayObject::transform($data);
        return $this;
    }
    
    /**
     * Render grid
     */
    public function render($tpl = ''){
        $tpl OR $tpl = $this->template;
        $tpl = new Template($tpl);
        $tpl->grid = $this;
        foreach($this->data as $item){
            $line = new Grid_Line($this);
            foreach($item as $key=>$row){
                if($this->fields->$key && array_key_exists($this->fields->$key->type,self::$types) && class_exists(self::$types[$this->fields->$key->type])){
                    $row = new self::$types[$this->fields->$key->type]($key,$row,$this->fields->$key);
                    if($row instanceof Grid_Row){
                        $line->append($row);
                    }
                }
            }
            $this->lines->append($line);
        }
        return $tpl->render();
    }

}