<?php

/**
 *  Form Element Input
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Form
 * @version		$Id$
 */
class Form_Element_File extends Form_Element_Abstract {
    protected $type = 'file';
    protected $isRequired = FALSE;
    protected $path;
    protected $allowed_types;
    protected $maxsize;
    protected $overwrite = TRUE;
    protected $rename;

    /**
     * Constructor
     *
     * @param string $name
     * @param array $options
     */
    public function __construct($name, $options) {
        parent::__construct($name, $options);
        if (in_array('Required', $this->validators)) {
            $this->isRequired = TRUE;
            $key = array_search('Required', $this->validators);
            unset($this->validators[$key]);
        }
    }

    /**
     * Process elements value from request
     *
     * @return
     */
    public function result() {
        $cogear = getInstance();
        $file = new File($this->name, get_object_vars($this), $this->isRequired);
        if ($this->value = $file->upload()) {
            $this->is_fetched = TRUE;
        }
        else {
            $this->errors = $file->getErrors();
        }
        return $this->value;
    }

    /**
     * Render
     */
    public function render(){
        return parent::render().'<br/>'.$this->value;
    }

}