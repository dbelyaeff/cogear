<?php
/**
 * Form image element
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Form
 * @version		$Id$
 */
class Form_Element_Image extends Form_Element_File{
    protected $image;
    protected $resize;
    protected $crop;
    protected $watermark;
    protected $thumbnails;

    /**
     * Set value from request
     *
     * @return  mixed
     */
    protected function result() {
        $cogear =  getInstance();
        $image = new Image($this->name,  get_object_vars($this),$this->isRequired);
        if ($result = $image->upload()) {
            $this->requestIsFetched = TRUE;
            $this->image = $image->getInfo();
            $this->value = $result;
        }
        else $this->errors = $image->getErrors();
        return $this->value;
    }
    /**
     * Render
     */
    public function render(){
        if($this->value && $this->value = Url::link(Url::toUri(UPLOADS.$this->value,ROOT,FALSE))){
            return HTML::img(array(
                'src' => $this->value,
                'width' => $this->image->width,
                'height' => $this->image->height,
                'alt' => '',
            )).HTML::a('',icon('delete'),array(
                'class' => 'form-action',
                'rel' => $this->name,
            ));
        }
        else return parent::compile();
    }
    /**
     * Perform ajax handler
     * 
     * @param string $action
     * @param string $value 
     */
    public function ajaxCall($action,$value = NULL){
        switch($action){
            case 'replace':
                $this->value = '';
                break;
        }
    }
}