<?php
/**
 * Cache interface
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2010, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
interface Interface_Cache {
    public function read($name,$force=NULL);
    public function write($name,$value,$tags=NULL,$ttl=NULL);
    public function remove($name);
    public function removeTags($name);
    public function clear();
}