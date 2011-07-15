<?php

/**
 * Upload gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Upload_Gear extends Gear {

    protected $name = 'Upload';
    protected $description = 'Upload files and images';
    protected $settings = array('theme'=>'Theme_Splash');

    public function index($action = NULL, $subaction = NULL) {
        switch ($action) {
            case 'file':
                 $tpl = new Template('Upload.file');
                 $tpl->show();
//                $file = new Upload_File('myfile', array('path' => cogear()->user->getDir(), 'maxsize' => '100'));
//                append('content', $file->render());
                break;
            case 'image':

                break;
            default:
                append('content', HTML::a(Url::gear('upload') . '/file?iframe', t('Upload'), array('rel' => 'modal', 'class' => 'button')));
        }
    }

    /**
     * Upload image
     */
    public function image_action() {
        
    }
}

