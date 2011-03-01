<?php
/**
 * Cached session
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Cache_Session extends Cache{
    /**
     * Session garbage collector
     *
     * @param int $ttl
     */
    public function gc($ttl){
        $dit = new DirectoryIterator($this->path);
        foreach($dir as $file){
            if($file->getMTime()+$ttl<time()){
                @unlink($file->getPath());
            }
        }
    }
}
