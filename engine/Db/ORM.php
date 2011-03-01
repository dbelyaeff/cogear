<?php

/**
 * Database ORM
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Db_ORM extends Options {

    /**
     * Table name
     *
     * @var string
     */
    protected $table;
    /**
     * Primary field name
     *
     * @var primary
     */
    protected $primary;
    /**
     * Fields
     *
     * @var array
     */
    protected $fields = array();
    /**
     * Current object
     * 
     * @var object
     */
    protected $object;

    /**
     * Constructir
     *
     * @param string $table
     * @param string $primary
     */
    public function __construct($table, $primary = '') {
        $cogear = getInstance();
        $this->table = $table;
        $this->fields = $cogear->db->getFields($table);
        $fields = array_keys($this->fields);
        $first = reset($fields);
        $this->primary = $primary ? $primary : $first;
        $this->object = new Core_ArrayObject();
    }

    /**
     * Magic __set method
     * 
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value) {
        $this->object->$name = $value;
    }

    /**
     * Magic __get method
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        return $this->object->$name;
    }

    /**
     * Magic __call method
     *
     * Simple adapter to database.
     * Example:
     * 
     * $user_orm = new Db_ORM('users');
     * $user = $user_orm->where('name','admin')->find();
     *
     * @param string $name
     * @param array $args
     * @return mixed
     */
    public function __call($name, $args) {
        $cogear = getInstance();
        if (method_exists($cogear->db, $name)) {
            return call_user_func_array(array($cogear->db, $name), $args);
        }
        return NULL;
    }
    /**
     * Get or Set current object
     *
     * @param array|ArrayObject $data
     */
    public function object($data = NULL){
        return $data ? $this->object->exchangeArray((array)$data) : $this->object;
    }
    /**
     * Find row
     *
     * @return  object/NULL
     */
    public function find() {
        $cogear = getInstance();
        if ($this->object) {
            $cogear->db->where($this->object->toArray());
        }
        if ($result = $cogear->db->get($this->table)->row()) {
            $cogear->event('Db_ORM.find',$result);
            $this->object = $result;
        }
        return $result;
    }

    /**
     * Find all
     *
     * @return object/NULL
     */
    public function findAll() {
        $cogear = getInstance();
        if ($this->object) {
            $cogear->db->where($this->object->toArray());
        }
        return $cogear->db->get($this->table)->result();
    }

    /**
     * Save
     *
     * @return boolean|int|NULL  No object|Insert|Update
     */
    public function save() {
        $cogear = getInstance();
        $primary = $this->primary;
        if (!$data = $this->object->toArray()) {
            return FALSE;
        } elseif (!isset($data[$primary]) OR !$cogear->db->get_where($this->table, array($primary => $data[$primary]))->row()) {
            return $cogear->db->insert($this->table, $data);
            $cogear->event('Db_ORM.save',$this);
        } else {
            $cogear->db->update($this->table, $data, array($primary => $data[$primary]));
            $cogear->event('Db_ORM.save',$this);
            return NULL;
        }
    }

    /**
     * Delete
     */
    public function delete() {
        $cogear = getInstance();
        $primary = $this->primary;
        $data = $this->object->toArray();
        if (!$data) {
            return;
        } elseif (!isset($data[$primary])) {
            $cogear->db->delete($this->table, $data);
        } else {
            $cogear->db->delete($this->table, array($primary => $data[$primary]));
        }
    }

    /**
     * Clear current object
     */
    public function clear() {
        $this->object = new Core_ArrayObject();
    }

}