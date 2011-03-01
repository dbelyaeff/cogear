<?php

/**
 * Cache
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
class Cache implements Interface_Cache {

    /**
     * Cache adapter
     *
     * @var object
     */
    private $adapter;
    /**
     * Constants
     */
    const FILE = 0;
    const MEMCACHE = 1;
    const APC = 2;
    const XCACHE = 3;
    const EACCELERATOR = 4;

    /**
     * Initiate cache
     *
     * @param array $options
     */
    public function __construct($options = array()) {
        $class = 'Cache_Adapter_';
        isset($options['adapter']) OR trigger_error('No cache adapter is defined.');
        switch ($options['adapter']) {
            case self::FILE:
                $class .= 'File';
                break;
            case self::MEMCACHE:
                $class .= 'Memcache';
                break;
            case self::APC:
                $class .= 'Apc';
                break;
            case self::XCACHE:
                $class .= 'Xcache';
                break;
            case self::EACCELERATOR;
                $class .= 'Eaccelerator';
                break;
        }
        if (class_exists($class)) {
            $this->adapter = new $class($options);
        }
    }

    /**
     * Read cache
     * 
     * @param string $name
     * @param string $force
     * @return  mixed
     */
    public function read($name, $force=FALSE) {
        return $this->adapter->read($name, $force);
    }

    /**
     * Write cache
     *
     * @param string $name
     * @param mixed $value
     * @param array $tags
     * @param int   $ttl
     */
    public function write($name, $value, array $tags = array(), int $ttl = NULL) {
        $value = $value instanceof ArrayObject ? $value->toArray() : $value;
        $this->adapter->write($name, $value, $tags, $ttl);
    }

    /**
     * Remove cache by key
     * @param string $name 
     */
    public function remove($name) {
        $this->adapter->remove($name);
    }
    /**
     * Remove cache by key
     * @param string $name
     */
    public function removeTags($name) {
        $this->adapter->removeTags($name);
    }

    /**
     * Clear cache
     */
    public function clear() {
        $this->adapter->clear();
    }
}