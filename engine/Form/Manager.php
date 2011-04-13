<?php
/**
 * Form Manager
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Form_Manager extends Options {
    protected $name;
    protected $prefix = 'form';
    protected $method  = 'POST';
    protected $action;
    protected $ajax;
    protected $enctype = self::ENCTYPE_MULTIPART;
    protected $template = 'Form.form';
    public $request;
    protected $is_ajaxed;
    /**
     * Elements config
     * @var array
     */
    public $elements = array();
    public static $types = array(
        'input' => 'Form_Element_Input',
        'text' => 'Form_Element_Input',
        'password' => 'Form_Element_Password',
        'textarea' => 'Form_Element_Textarea',
        'radio' => 'Form_Element_Radio',
        'checkbox' => 'Form_Element_Checkbox',
        'select' => 'Form_Element_Select',
        'submit' => 'Form_Element_Submit',
        'button' => 'Form_Element_Button',
        'file' => 'Form_Element_File',
        'image' => 'Form_Element_Image',
    );
    protected $callback;
    /**
     * Helps to transform form names to jQuery-readable
     *
     * @const
     */
    const SEPARATOR = '-';
    /**
     * Constants
     *
     * @const
     */
    const ENCTYPE_URLENCODED = 'application/x-www-form-urlencoded';
    const ENCTYPE_MULTIPART = 'multipart/form-data';
    
    /**
     * Constructor
     * 
     * @param string|array $options
     */
    public function  __construct($options) {
        if(is_string($options)){
            if(!$config = Config::read(Gear::preparePath($options,'forms').EXT)){
                return error(t('Cannot read form config <b>%s</b>.','',$options));
            }
            else {
                $options = $config;
            }
        }
        parent::__construct($options);
        $cogear = getInstance();
        $cogear->event('form.init',$this);
        return $this->init();
    }
    /**
     * Initialize elements
     */
    public function init(){
        $this->is_ajaxed = Ajax::get('form') == $this->name;
        $elements = array();
        foreach($this->elements as $name=>$config){
            $config->type OR $config->type = 'input';
            $config->name = $name;
            $config->form = $this;
            if(isset($config['access']) && !$config['access']){
                continue;
            }
            if(isset(self::$types[$config->type]) && class_exists(self::$types[$config->type])){
                $elements[$name] = new self::$types[$config->type]($config);
            }
        }
        $this->elements->exchangeArray($elements);
        if($this->callback && $callback = Cogear::prepareCallback($this->callback)){
            if($result = $this->result()){
                call_user_func_array($callback,array($result));
            }
            else {
                return $this->render();
            }
        }
    }
    /**
     * Set values for fields
     * 
     * @param array $data 
     */
    public function setValues($data){
        foreach($data as $key=>$value){
            $this->elements->$key && $this->elements->$key->setValue($value);
        }
    }
    /**
     * Result
     *
     * @return  NULL|Core_ArrayObject — filtered and validated data
     */
    public function result(){
        $this->request = $this->method == 'POST' ? $_POST : $_GET;
        $result = array();
        $is_valid = TRUE;
        if(sizeof($this->request) > 0){
            foreach($this->elements as $name=>$element){
               if($value = $element->result()){
                   $result[$name] = $value;
               }
               elseif(FALSE === $value) {
                   $is_valid = FALSE;
               }
            }
        }
        if($this->is_ajaxed){
            $response = array();
            foreach($this->elements as $name=>$element){
                if($name == Ajax::get('element')){
                    if($result = $element->ajax()){
                        $response[$name] = $result;
                    }
                }
            }
            $response && Ajax::json($response);
        }
        return $is_valid && $result ? Core_ArrayObject::transform($result) : FALSE;
    }
    /**
     * Provide id for HTML form
     *
     * @return string
     */
    public function getId(){
        return $this->prefix.self::SEPARATOR.$this->name;
    }
    /**
     * Render form
     */
    public function render(){
        $tpl = new Template($this->template);
        $id = $this->getId();
        $tpl->form  = array(
            'id' => $id,
            'name' => $id,
            'method' => $this->method,
            'action' => $this->action,
            'enctype' => $this->enctype,
            'class' => 'form'.($this->ajax ? ' ajaxed' : ''),
        );
        $tpl->elements = $this->elements;
        return $tpl->render();
    }
}