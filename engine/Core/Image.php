<?php
/**
 *  Images hanlder
 *
 *
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2010, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage  	Image
 * @version		$Id$
 */
class Image extends File{
    /**
     * Allowed image types
     * @var string
     */
    protected $allowed_types = 'jpg,png,gif,ico';
    /**
     * Image width
     * @var int
     */
    protected $width;
    /**
     * Image height
     * @var int
     */
    protected $height;
    /**
     * Image type
     *
     * IMAGETYPE_XXX
     *
     * @var string
     */
    protected $type;
    /**
     * Image mime
     * 
     * @var string
     */
    protected $mime;
    /**
     * Constructor
     *
     * @param string $name
     * @param array $options
     */
    public function __construct($name,$options = array()){
        isset($options['allowed_types']) OR $options['allowed_types'] = $this->allowed_types;
        parent::__construct($name,$options);
    }
    /**
     * Upload
     * 
     * @return  boolean
     */
    public function upload(){
        if($result = parent::upload()){
            $this->getInfo();
            // Resize
            $this->options->resize && $this->resize($this->options->resize);
            // Crop
            $this->options->crop && $this->crop($this->options->crop);
            // Watermark
            $this->options->watermark && $this->watermark($this->options->watermark);
            return $result;
        }
        return FALSE;
    }
    /**
     * Process upload
     *
     * @return boolean|string
     */
    protected function processUpload(){
        $this->getInfo($this->file->tmp_name);
        if($this->options->max && !$this->checkMax($this->options->max->width,$this->options->max->height)
        OR $this->options->min && !$this->checkMin($this->options->max->width,$this->options->max->height)){
            return FALSE;
        }
        return parent::processUpload();
    }
    /**
     * Get info about uploaded image
     *
     * @return array
     */
    public function getInfo($file = ''){
        $file OR $file = $this->file->path;
        list($this->width,$this->height,$this->type,$this->mime) = new Core_ArrayObject(getimagesize($file));
        return array(
            'width' => $this->width,
            'height' => $this->height,
            'type' => $this->type,
            'mime' => $this->mime,
        );
    }
    /**
     * Check image dimensions for maximum
     *
     * @param   int $width Max width
     * @param   int $height Max height
     * @param   boolean $strict
     * @return  boolean
     */
    public function checkMax($width,$height,$strict = NULL){
        if(($strict && $this->width > $width && $this->height > $height) OR
                      ($this->width > $width OR $this->height > $height)){
            $this->errors[] = t('Maximum image dimensions are <b>%sx%s</b>pixels.','Image',$width,$height);
            return FALSE;
        }
        return TRUE;
    }
    /**
     * Check image dimensions for minimum
     *
     * @param   int $width Min width
     * @param   int $height Min height
     * @param   boolean $strict
     * @return  boolean
     */
    public function checkMin($width,$height,$strict = NULL){
        if(($strict && $this->width < $width && $this->height < $height) OR
                      ($this->width < $width OR $this->height < $height)){
            $this->errors[] = t('Minimal image dimensions are <b>%sx%s</b>pixels.','Image',$width,$height);
            return FALSE;
        }
        return TRUE;
    }
}
