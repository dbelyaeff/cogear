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
        $fields = array_keys((array)$this->fields);
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
            event('Db_ORM.find',$result);
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
        if (!$data = $this->object->toArray()) {
            return FALSE;
        } elseif (!isset($data[$this->primary]) OR !$cogear->db->get_where($this->table, array($this->primary => $data[$this->primary]))->row()) {
            event('Db_ORM.insert.before',$this);
            $this->object->{$this->primary} = $this->insert($data);
            event('Db_ORM.insert.after',$this);
            return $this->object->{$this->primary};
        } else {
            event('Db_ORM.update.before',$this);
            $this->update($data);
            event('Db_ORM.update.after',$this);
            return NULL;
        }
    }
    /**
     * Insert
     * 
     * @param   array   $data
     * @return 
     */
    public function insert($data = NULL){
        $data OR $data = $this->object->toArray();
        if(!$data) return;
        $cogear = getInstance();
        event('Db_ORM.insert',$this);
        return $cogear->db->insert($this->table, $data);
    }
    
    /**
     * Simple update
     * 
     * @param   array   $data
     * 
     */
    public function update($data = NULL){
        $data OR $data = $this->object->toArray();
        if(!$data OR !isset($data[$this->primary])) return;
        $cogear = getInstance();
        event('Db_ORM.update',$this);
        if(isset($data[$this->primary])){
            $primary = $data[$this->primary];
            unset($data[$this->primary]);
        }
        return $cogear->db->update($this->table, $data, array($this->primary => $primary));
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
            event('Db_ORM.delete.before',$this);
            $cogear->db->delete($this->table, $data);
        } else {
            event('Db_ORM.delete.before',$this);
            $cogear->db->delete($this->table, array($primary => $data[$primary]));
        }
        event('Db_ORM.delete.after',$this);
    }
    /**
     * Merge existing object with new data
     * 
     * @param array $data 
     */
    public function merge($data = array()){
        $data && $this->object->mix($data);
    }
    /**
     * Clear current object
     */
    public function clear() {
        $this->object = new Core_ArrayObject();
    }

}