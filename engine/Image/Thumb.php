<?php
/**
 * Image Thumb class
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Image
 * @subpackage
 * @version		$Id$
 */
class Image_Thumb extends Image_Object {
    protected $thumb;
    protected $size;
    /**
     * Thumbs directory
     * 
     * const
     */
    const DIR = '.thumbs';
    /**
     * Get thumb by exact size
     *  
     * @param type $size 
     */
    public function get($size){
        if(!file_exists($this->file)) return NULL;
        $this->size = $this->prepare($size);
        $this->thumb = $this->buildThumbPath();
        if(filemtime($this->file) > filemtime($thumb)){
            $this->makeThumb();
        }
        return $this->thumb;
    }
    
    /**
     * Make thumb
     */
    protected function makeThumb(){
        $this->sizecrop($this->size)->save($this->thumb);
        return $this->thumb;
    }
    /**
     * Build path for thumb
     */
    public function buildThumbPath($size = NULL,$file = NULL){
        is_string($size) && $this->size = $this->prepare($size);
        $file OR $file = $this->file;
        $dir = dirname($file);
        $filename = basename($file);
        $path = $dir.DS.self::DIR.DS.$this->size->width.'x'.$this->size->height.DS.$filename;
        return $path;
    }
    
}