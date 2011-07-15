<?php
/**
 * Database Exception
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Db
 * @version		$Id$
 */
class Db_Exception extends Exception {
    public function  __construct($message, $code, $previous = NULL) {
        parent::__construct($message, $code, $previous);
    }
}
