<?php

/**
 *  Form Ajax Image Upload
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Ajax
 * @version		$Id$
 */
class Ajax_FileUpload_Form_Image extends Form_Element_Image {

    /**
     * Set value from request
     *
     * @return  mixed
     */
    public function result() {
        $image = new Upload_Image($this->name, $this->getAttributes(), $this->validators->findByValue('Required'));
        if ($result = $image->upload()) {
            $this->is_fetched = TRUE;
            $this->image = $image->getInfo();
            $this->value = $result;
        } else {
            $this->errors = $image->errors;
        }
        if ($this->form->is_ajaxed) {
            $result = array(
                'value' => $this->value,
                'file' => Url::toUri(UPLOADS . $this->value),
                'width' => $this->image->width,
                'height' => $this->image->height,
                'errors' => $this->errors ? strip_tags(implode("\n",$this->errors)) : '',
            );
            Ajax::json($result);
        }
        // if there is hidden field with the same name — take value from there
        if(isset($this->form->request[$this->name])){
            $this->value = $this->form->request[$this->name];
        }
        return $this->value;
    }

    /**
     * Render
     */
    public function render() {
        $this->getAttributes();
        $this->attributes->type = 'file';
        $this->attributes->class = 'ajaxed image';
        if ($this->value && $this->value = Url::link(Url::toUri(UPLOADS . $this->value, ROOT, FALSE))) {
            $tpl = new Template('Ajax_FileUpload.image');
            $tpl->assign($this->attributes);
            $tpl->value = $this->value;
            $tpl->image = $this->image;
            $this->code = $tpl->render();
        }
        return Form_Element_Abstract::render();
    }

}
