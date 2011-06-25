<?php

/**
 * Filesystem cache
 *
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
class Cache_Adapter_File extends Options implements Interface_Cache {
    /**
     * Path to cache storage
     *
     * @var string
     */
    protected $path = '';
    /**
     * Flag indicates cache state
     * 
     * @var boolean
     */
    protected $enabled = TRUE;
    /**
     * Constructor
     * 
     * @param array $options 
     */
    public function __construct($options = array()) {
        isset($options['path']) OR $options['path'] = SITE . DS . 'cache';
        parent::__construct($options);
        Filesystem::makeDir($this->path);
    }
    /**
     * Read from cache
     * 
     * @param string $name
     * @param boolean $force
     * @return mixed|NULL
     */
    public function read($name,$force=FALSE) {
        if(!$force && $this->enabled === FALSE){
            return NULL;
        }
        $name = $this->prepareFilename($name);
        $path = $this->path . DS . $name;
        if (file_exists($path)) {
            $data = Config::read($path,Config::AS_ARRAY);
            if($force){
                return $data['value'];
            }
            elseif($data['ttl'] && time()  > $data['ttl']){
                return NULL;
            }
            elseif (isset($data['tags']) && is_array($data['tags'])) {
                foreach ($data['tags'] as $tag) {
                    if (!$this->read('tags/' . $tag)) {
                        return NULL;
                    }
                }
            }
            else {
                return $data['value'];
            }
        }
        return NULL;
    }
    /**
     * Write to cache
     *
     * @param string $name
     * @param mixed $value
     * @param array $tags
     * @param int $ttl
     */
    public function write($name, $value, $tags = NULL, $ttl = NULL) {
        $name = $this->prepareFilename($name);
        $data = array(
            'value' => $value,
            'ttl' => $ttl,
        );
        if ($tags){
            $data['tags'] = $tags;
            foreach($tags as $tag){
                $this->write('tags/'.$tag,'',array(),$ttl);
            }
        }
        file_put_contents($this->path.DS.$name, PHP_FILE_PREFIX.'return '.var_export($data,TRUE).';');
    }
    /**
     * Remove cached element
     * 
     * @param string $name 
     */
    public function remove($name){
        @unlink($this->path.DS.$this->prepareFilename($name));
    }
    /**
     * Remove cached tags
     *
     * @param string|array $name
     */
    public function removeTags($name){
        if(is_array($name)){
            foreach($name as $tag){
                $this->remove('tags/'.$tag);
            }
        }
        else {
            $this->remove('tags/'.$name);
        }
    }
    /**
     * Clear cache folder
     */
    public function clear(){
        if($result = glob($this->path.DS.'*'.EXT)){
           foreach($result as $path){
               unlink($path);
           }
        }
    }
    /**
     *  Prepare filaname for cache
     * @param string $name
     * @return string
     */
    private function prepareFilename($name) {
        $name = str_replace('/','_',$name.EXT);//md5($name . Cogear::key()) . EXT;
        return $name;
    }

}