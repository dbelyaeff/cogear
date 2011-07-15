<?php

/**
 * Image Driver Abstract
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
abstract class Image_Driver_Abstract extends Options {

    /**
     * File path
     * 
     * @var string
     */
    protected $path;
    /**
     * 
     *  
     * @var type 
     */
    protected $info;
    /**
     * Source image
     * 
     * @var resource
     */
    protected $source;
    /**
     * Destination image
     * 
     * @var resource
     */
    protected $destination;
    /**
     * Options
     * 
     * @var array
     */
    public $options = array(
        'maintain_ratio' => TRUE,
    );

    /**
     * Constructor
     * 
     * @param string $file 
     * @return  boolean
     */
    public function __construct($path) {
        $this->path = $path;
        $info = getimagesize($this->path);
        $this->info = Image::getInfo($this->path);
        $this->options = new Core_ArrayObject($this->options);
    }

    /**
     * Process size from string to array
     * 
     * @param string $size
     * @return array 
     */
    protected function getSizeFromString($size) {
        if (is_string($size)) {
            list($width, $height) = getimagesize($this->image->file->path);
            $size = explode('x', $size);
            if (sizeof($size) == 1) {
                $size[1] = $this->image->options->maintain_ratio === FALSE ? $size[0] : $height * $size[0] / $width;
            }
        }
        return $size;
    }

    /**
     * Prepare to image manipulation
     *  
     * @param string $size 
     * @return  object
     */
    protected function prepare($size = NULL) {
        // If we have previous operation — save it result to source
        $this->destination && $this->source = $this->destination;
        if ($size) {
            $size = $this->getSizeFromString($size);
            $this->destination = $this->create($size->width, $size->height);
            return $size;
        }
        return NULL;
    }

    /**
     * Size
     * 
     * @param
     */
    protected function getSizeFromString($size) {
        $size = explode('x', $size);
        if ($this->options->maintain_ratio OR sizeof($size) == 1) {
            $ratio = $this->info->width / $this->info->height;
            $size[1] = round($size[0] / $ratio);
        }
        return new Core_ArrayObject(array('width' => $size[0], 'height' => $size[1]));
    }
    abstract public function create($width,$height);
    abstract public function resize($size);
    abstract public function crop($size,$x = 0.5,$y = 0.5);
    abstract public function rotate($angle);
    abstract public function watermark($watermark = NULL);
    abstract public function save($path = NULL);
    abstract public function render();
    abstract public function clear();

}