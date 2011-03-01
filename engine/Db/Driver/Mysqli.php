<?php
/**
 * MySQLi Database Driver
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Db
 * @version		$Id$
 */
class Db_Driver_Mysqli extends Db_Driver_Mysql {
    protected $methods = array(
        'connect' => 'mysqli_connect',
        'select_db' => 'mysqli_select_db',
        'disconnect' => 'mysqli_close',
        'query' => 'mysqli_query',
        'error' => 'mysqli_error',
        'fetch' => 'mysqli_fetch_assoc',
        'escape' => 'mysqli_real_escape_string',
        'insert_id' => 'mysqli_insert_id'

    );
}