<?php
/**
 * ajaxUpload gear
 * 
 * Can be used standalone or as a replacement for standart file upload field in forms
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		ajaxUpload
 * @subpackage      
 * @version		$Id$
 */
class ajaxUpload_Gear extends Gear {
    protected $name = 'ajaxUpload';
    protected $description = 'Upload files via ajax';
    protected $type = Gear::MODULE;
    public function init(){
        //config('ajaxUpload.replaceFileInput') && 
        Form_Object::$types['file'] = 'ajaxUpload_Element';
    }
    
    public function result(){
        
    }
}