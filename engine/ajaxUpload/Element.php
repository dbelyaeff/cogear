<?php

/**
 * ajaxUpload form element
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		ajaxUpload
 * @subpackage
 * @version		$Id$
 */
class ajaxUpload_Element extends Form_Element_File {

    protected $options = array(
        'debug' => FALSE,
        'action' => '',
        'params' => array(),
        'button' => NULL,
        'multiple' => FALSE,
        'maxConnections' => 3,
        // validation        
        'sizeLimit' => array(),
        'minSizeLimit' => 0,
        'onSubmit' => 'function(id, fileName){}',
        'onProgress' => 'function(id, fileName, loaded, total){}',
        'onComplete' => 'function(id, fileName, responseJSON){}',
        'onCancel' => 'function(id, fileName){}',
    );
    private static $is_loaded;

    public function __construct($options) {
        parent::__construct($options);
// messages                
        $this->options['messages'] = array(
            'typeError' => t("{file} has invalid extension. Only {extensions} are allowed."),
            'sizeError' => t("{file} is too large, maximum file size is {sizeLimit}."),
            'minSizeError' => t("{file} is too small, minimum file size is {minSizeLimit}."),
            'emptyError' => t("{file} is empty, please select files again without it."),
            'onLeave' => t("The files are being uploaded, if you leave now the upload will be cancelled.")
        );
        $this->options['showMessage'] = "function(message){
                alert(message);
}";
    }
    /**
     * 
     */
    public function result(){
        
    }
    /**
     * Render
     */
    public function render() {
        if (!self::$is_loaded) {
            $path = Url::toUri(dirname(__FILE__)) . '/uploader/';
            js($path . 'js/fileuploader.js');
            css($path . 'css/fileuploader.css');
            self::$is_loaded = TRUE;
        }
        $this->code = HTML::paired_tag('div', '', array('id' => $this->name));
        $element = 'document.getElementById(\'' . $this->name . '\')';
        extract($this->options);
        $action OR $action = Url::link();
        inline_js("
            $(document).ready(function(){
                new qq.FileUploader({
                    element: {$element},
                    debug: ".($debug ? 'true' : 'false').",
                    action: '{$action}',
                    params: ".json_encode($params).",
                    button: ".($button ? $button : 'null').",
                    multiple: ".($multiple ? 'true' : 'false').",
                    maxConnections: {$maxConnections},
                    // validation        
                    allowedExtensions: ['".implode('\', \'',(array)$this->allowed_types)."'],               
                    sizeLimit: {$sizeLimit},   
                    minSizeLimit: {$minSizeLimit},                             
                    // events
                    // return false to cancel submit
                    onSubmit: {$onSubmit},
                    onProgress: {$onProgress},
                    onComplete: {$onComplete},
                    onCancel: {$onCancel},
                    // messages                
                    messages: {
                        typeError: \"{$messages['typeError']}\",
                        sizeError: \"{$messages['sizeError']}\",
                        minSizeError: \"{$messages['minSizeError']}\",
                        emptyError: \"{$messages['emptyError']}\",
                        onLeave: \"{$messages['onLeave']}\" 
                    },
                    showMessage: {$showMessage}
                });
                
        });");
        $this->getAttributes();
        $this->decorate();
        return $this->code;
    }

}
