<?php

/**
 * User avatar
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		User
 * @subpackage
 * @version		$Id$
 */
class User_Avatar{

    protected $file;
    protected $user;

    /**
     * Constructor
     * 
     * @param string $file 
     */
    public function __construct($file = NULL) {
        $this->file = $file && file_exists(UPLOADS . DS . $file) ? $file : config('user.default_avatar', 'avatars/0/avatar.png');
    }

    /**
     * Set user
     * 
     * @param User_Object $user 
     */
    public function setUser(&$user) {
        $this->user = & $user;
    }

    /**
     * Get specific size avatar
     * 
     * @param   string
     */
    public function getSize($size){
        $original = $this->getFile();
        $thumb = new Image_Thumb($original,$size);
        return (string)$thumb;
    }
    /**
     * Get avatar file
     * 
     * @return  string 
     */
    public function getFile(){
        return UPLOADS.DS.$this->file;
    }
    /**
     * Render avatar
     *  
     * @param string $file 
     */
    public function render($file = NULL) {
        $file OR $file = UPLOADS.'/'.$this->file;
        return HTML::img(Url::toUri($this->getSize(config('user.profile.avatar.size','200x200'))), $this->user->login, array('class' => 'avatar'));
    }

    /**
     * Render avatar uri
     */
    public function __toString() {
        return $this->render();
    }

}
