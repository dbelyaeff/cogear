<?php
/**
 * Config
 *
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2010, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Config extends Core_ArrayObject{
    protected $file;
    const AS_ARRAY = 0;
    const AS_OBJECT = 1;
    /**
     * Constructor
     * 
     * @param string $path
     * @param string $section 
     */
    public function __construct($path = '',$section = '') {
        if($path){
            $this->file = $path;
            $this->load($path,$section);
        }
    }
    /**
     * Load file into internal config
     * 
     * @param   string  $path
     * @param   string  $section
     */
    public function load($path,$section = ''){
        file_exists($path) && ($section && $this->$section->mix(self::read($path))) OR $this->mix(self::read($path));
    }
    /**
     * Read config from file
     *
     * @param string $file
     */
    public static function read($file,$mode=NULL){
        $mode OR $mode = self::AS_OBJECT;
        if(!file_exists($file)){
            return NULL;
        }
        elseif($mode == self::AS_OBJECT){
            return Core_ArrayObject::transform(include $file);
        }
        elseif($mode == self::AS_ARRAY){
            return include $file;
        }
    }
    /**
     * Write config to file
     * 
     * @param string $file
     * @param array $data
     */
    public function write($file = NULL,$data = NULL){
        $file OR $file = $this->file;
        $data OR $data = $this->toArray();
        Filesystem::makeDir(dirname($file));
        file_put_contents($file, PHP_FILE_PREFIX."return ".var_export($data,TRUE).';');
    }
}