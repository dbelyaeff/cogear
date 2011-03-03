<?php

/**
 * Abstract form element
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Form_Element_Abstract extends Options {

    protected $name;
    protected $description;
    protected $label;
    protected $value;
    protected $disabled;
    protected $type;
    /**
     * Link to form instance
     *
     * @var object
     */
    protected $form;
    protected $filters = array();
    protected $validators = array();
    protected $errors = array();
    protected $attributes = array();
    protected $is_fetched;
    protected $wrapper = 'Form.element';

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct($options) {
        parent::__construct($options);
        $this->attributes = new Core_ArrayObject($this->attributes);
    }

    /**
     * addFilter
     *
     * @param string $filter
     */
    public function addFilter($filter) {
        in_array($filter, $this->filters) OR $this->filters[] = $filter;
    }

    /**
     * addFilter
     *
     * @param string $validator
     */
    public function addValidator($validator) {
        in_array($validator, $this->validators) OR $this->validators[] = $validator;
    }

    /**
     * Add error
     *
     * @param   string  $error
     */
    public function addError($error) {
        in_array($error, $this->errors) OR $this->errors[] = $error;
        return TRUE;
    }

    /**
     * Set value
     *
     * @param mixed $value
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * Transform option
     * 
     * array('Length') OR array(array('Length',0,1))
     * 
     * @param callback $class
     * @param string   $suffix
     * @return  callback|NULL
     */
    public function isCallable($class, $suffix = 'Validate') {
        $args = array();
        if (is_array($class) OR $class instanceof  ArrayObject) {
            $args = array_slice($class->toArray(), 1);
            $class = $class[0];
        }
        class_exists($class) OR $class = 'Form_' . $suffix . '_' . $class;
        $callback = array($class, $args);
        return class_exists($class) ? $callback : NULL;
    }

    /**
     * Filter value
     */
    public function filter() {
        foreach ($this->filters as $filter) {
            if ($callback = $this->isCallable($filter, 'Filter')) {
                array_unshift($callback[1], $this->value);
                $filter = new $callback[0]();
                $filter->setElement($this);
                $this->value = call_user_func_array(array($filter, 'filter'), $callback[1]);
            }
        }
    }

    /**
     * Validate value
     *
     * @return  boolean
     */
    public function validate() {
        $is_valid = TRUE;
        foreach ($this->validators as $validator) {
            if ($callback = $this->isCallable($validator, 'Validate')) {
                array_unshift($callback[1], $this->value);
                $validator = new $callback[0];
                $validator->setElement($this);
                if (!call_user_func_array(array($validator, 'validate'), $callback[1])) {
                    $is_valid = FALSE;
                }
            }
        }
        return $is_valid;
    }

    /**
     * Process elements value from request
     *
     * @return
     */
    public function result() {
        //if(isset($this->form->request[$this->name])){
            $this->value = isset($this->form->request[$this->name]) ? $this->form->request[$this->name] : NULL;
            $this->is_fetched = TRUE;
            $this->filter();
            return $this->validate() ? $this->value : FALSE;
        //}
        //return NULL;
    }

    /**
     * Provide id for HTML form
     *
     * @return string
     */
    public function getId() {
        return $this->form->getId() . Form_Manager::SEPARATOR . $this->name;
    }

    /**
     * Set attributes
     */
    public function setAttributes() {
        $this->attributes->id = $this->getId();
        $this->attributes->name = $this->name;
        $this->attributes->label = $this->label;
        $this->attributes->description = $this->description;
        $this->attributes->type = $this->type;
        $this->attributes->value = $this->value;
        $this->attributes->required = in_array('Required',(array)$this->validators) ? TRUE : NULL;
        $this->attributes->errors = $this->errors;
        $this->disabled && $this->attributes->disabled = 'disabled';
        $this->checked && $this->attributes->checked = 'checked';
    }

    /**
     * Render element
     */
    public function render() {
        $this->setAttributes();
        $code = HTML::input($this->attributes);
        if ($this->wrapper) {
            $tpl = new Template($this->wrapper);
            $tpl->assign($this->attributes);
            $tpl->code = $code;
            $code = $tpl->render();
        }
        return $code;
    }

}
