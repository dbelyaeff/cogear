<?php
/**
 * Mysql Database Driver
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Db
 * @version		$Id$
 */
class Db_Driver_Mysql extends Db_Driver_Abstract {
    protected $methods = array(
        'connect' => 'mysql_connect',
        'select_db' => 'mysql_select_db',
        'disconnect' => 'mysql_close',
        'query' => 'mysql_query',
        'error' => 'mysql_error',
        'fetch' => 'mysql_fetch_assoc',
        'escape' => 'mysql_real_escape_string',
        'insert_id' => 'mysql_insert_id'

    );
    /**
     * Connect to database
     *
     * @return boolean
     */
    public function connect() {
        $this->connection = $this->methods['connect']($this->config['host'] . ':' . $this->config['port'], $this->config['user'], $this->config['pass']);
        $this->methods['select_db']($this->config['database']);
        return $this->connection ? TRUE : FALSE;
    }

    /**
     * Disconnect from database
     *
     * @return boolean
     */
    public function disconnect() {
        return $this->methods['disconnect']($this->connection);
    }

    /**
     * Execute query
     *
     * @param string $query
     * @return Db_Driver_Mysql
     */
    public function query($query = '') {
        if (!$query) {
            $query = $this->buildQuery();
        }
        self::start($query);
        if (!$this->result = $this->methods['query']($query, $this->connection)) {
            $this->silent OR $this->errors[] = $this->methods['error']();
        }
        $this->clear();
        self::stop($query);
        return $this;
    }

    /**
     * Get fields from table
     *
     * @param string $table
     * @return object
     */
    public function getFieldsQuery($table) {
        return $this->query('SHOW COLUMNS FROM ' . $table)->result();
    }

    /**
     * Build query
     *
     * @return string
     */
    public function buildQuery() {
        $query = array();
        extract($this->_query);
        $from = $from[0];
        if ($insert) {
            $values = $this->filterFields($from, $insert);
            $into = array_keys($values);
            $values = array_values($values);
            $query[] = 'INSERT INTO ' . $this->prepareTableName($from) . ' (' . $this->prepareValues($into, '') . ') VALUES (' . $this->prepareValues($values) . ')';
        } elseif ($update) {
            $values = $this->filterFields($from, $update);
            $query[] = 'UPDATE ' . $this->prepareTableName($from) . ' SET ' . $this->prepareValues($values);
        } elseif ($delete) {
            $query[] = 'DELETE FROM ' . $this->prepareTableName($from);
        } else {
            $select = sizeof($select) < 1 ? '*' : implode(', ',$select);
            $query[] = 'SELECT ' . $select;
            $query[] = ' FROM ' . $this->prepareTableName($from);
        }
        $join && $query[] = implode(' ', $join);
        if($where){
            $where = $this->filterFields($from,$where);
            $query[] = ' WHERE ' . $this->argsToString($where, ' = ');
        }
        $group && $query[] = ' GROUP BY ' . implode(', ', $group);
        $having && $query[] = ' HAVING ' . implode(', ', $having);
        $order && $query[] = ' ORDER BY ' . implode(', ', $order);
        $limit && $limit[0] && $query[] = ' LIMIT ' . $limit[0] . ($limit[1] ? ', ' . $limit[1] : '');
        return $this->query = implode($query);
    }

    /**
     * Result
     *
     * @return Core_ArrayObject|NULL
     */
    public function result() {
        $result = array();
        if ($this->result) {
            while ($row = $this->methods['fetch']($this->result)) {
                $result[] = $row;
            }
        }
        return $result ? Core_ArrayObject::transform($result) : NULL;
    }

    /**
     * Row
     *
     * @return Core_ArrayObject|NULL
     */
    public function row() {
        return $this->result ? Core_ArrayObject::transform($this->methods['fetch']($this->result)) : NULL;
    }

    /**
     * Prepare variable for statement
     *
     * @param string $value
     * @return string
     */
    public function escape($value) {
        return $this->methods['escape']($value);
    }

    /**
     * Get last insert id
     *
     * @return int
     */
    public function getInsertId() {
        return $this->methods['insert_id']();
    }

    /**
     * Start transaction
     */
    public function transaction() {
        $this->methods['query']('SET AUTOCOMMIT=0');
        $this->methods['query']('START TRANSACTION');
    }

    /**
     * Commit transaction
     */
    public function commit() {
        $this->methods['query']('COMMIT');
        $this->methods['query']('SET AUTOCOMMIT=1');
    }
}