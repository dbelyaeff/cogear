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

    /**
     * Connect to database
     *
     * @return boolean
     */
    public function connect() {
        $this->connection = mysql_connect($this->config['host'] . ':' . $this->config['port'], $this->config['user'], $this->config['pass']);
        mysql_select_db($this->config['database']);
        $this->query('SET NAMES utf8;');
        return $this->connection ? TRUE : FALSE;
    }

    /**
     * Disconnect from database
     *
     * @return boolean
     */
    public function disconnect() {
        return mysql_close($this->connection);
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
        if (!$this->result = mysql_query($query, $this->connection)) {
            $this->silent OR $this->errors[] = mysql_errno();
        }
        $this->clear();
        self::stop($query);
        return $this->errors ? FALSE : $this;
    }

    /**
     * Get fields from table
     *
     * @param string $table
     * @return object
     */
    public function getFieldsQuery($table) {
        return $this->query('SHOW COLUMNS FROM ' . $table) ? $this->result() : NULL;
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
            $select = sizeof($select) < 1 ? '*' : implode(', ', $select);
            $query[] = 'SELECT ' . $select;
            $query[] = ' FROM ' . $this->prepareTableName($from);
        }
        $join && $query[] = implode(' ', $join);
        if ($where) {
            $where = $this->filterFields($from, $where);
            $where && $query[] = ' WHERE ' . $this->argsToString($where, ' = ');
        }
        if ($or_where) {
            $or_where = $this->filterFields($from, $or_where);
            $or_where && $query[] = 'OR ' . $this->argsToString($or_where, ' = ');
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
            while ($row = mysql_fetch_assoc($this->result)) {
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
        return $this->result ? Core_ArrayObject::transform(mysql_fetch_assoc($this->result)) : NULL;
    }

    /**
     * Prepare variable for statement
     *
     * @param string $value
     * @return string
     */
    public function escape($value) {
        return mysql_real_escape_string($value);
    }

    /**
     * Get last insert id
     *
     * @return int
     */
    public function getInsertId() {
        return mysql_insert_id();
    }

    /**
     * Start transaction
     */
    public function transaction() {
        $this->query('SET AUTOCOMMIT=0');
        $this->query('START TRANSACTION');
    }

    /**
     * Commit transaction
     */
    public function commit() {
        $this->query('COMMIT');
        $this->query('SET AUTOCOMMIT=1');
    }

}