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
class Upload_Gear extends Gear{
    protected $name = 'Upload';
    protected $description = 'Upload files and images';
    /**
     * Upload image
     */
    public function image_action(){
        event('image.upload');
    }
}
