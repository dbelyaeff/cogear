<?php

/**
 * Access control gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Access
 * @version		$Id$
 */
class Access_Gear extends Gear {

    protected $name = 'Access';
    protected $description = 'Access control gear';
    protected $rules;
    protected $refresh_flag;
    protected $order = -100;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->rules = new Core_ArrayObject();
    }

    /**
     * Init
     */
    public function init() {
        parent::init();
        $this->setRules();
        $this->setRights();
        hook('done', array($this, 'save'));
    }

    /**
     * Reset access data
     * 
     * @param string $action 
     */
    public function index($action = NULL) {
        if ($this->user->id != 1) {
            back();
        }
        switch ($action) {
            case 'reset':
                $this->clear();
                flash_success(t('Access rights have been reseted successfully!', 'Access'));
                back();
                break;
        }
    }

    /**
     * Check rules
     *
     * @param string $rule
     * @return boolean
     */
    public function check($rule) {
        if (!$this->rules->offsetExists($rule)) {
            $this->rules->offsetSet($rule, TRUE);
            $this->refresh_flag = TRUE;
        }
        if ($this->user->id == 1) {
            return TRUE;
        }
        if(!$this->session->access ){
            return FALSE;
        }
        return $this->session->access->{$rule};
    }

    /**
     * Get rules
     * 
     * @return Core_ArrayObject
     */
    public function getRules() {
        if ($rules = $this->system_cache->read('access/rules', TRUE)) {
            $this->rules->mix($rules);
        }
        return $this->rules;
    }

    /**
     * Get rights for user and his user_group
     */
    public function getRights() {
//        DEVELOPMENT && $this->reset();
        if ($this->session->access !== NULL) {
            return;
        }
        $access = new Core_ArrayObject();
        if ($group_access = $this->getUserGroupRights($this->user->user_group)) {
            $access->mix($group_access);
        }
        if ($user_access = $this->getUserRights($this->user->id)) {
            $access->mix($user_access);
        }
        $this->session->access = Core_ArrayObject::transform($access);
    }

    /**
     * Get rights for user
     * 
     * @param int $uid
     * @return mixed 
     */
    public function getUserRights($uid) {
        return $this->system_cache->read('access/users/' . $uid, TRUE);
    }

    /**
     * Set rights for user
     * 
     * @param   int $uid
     * @param   array   $rights
     */
    public function addUserRights($rights, $uid=NULL) {
        $uid OR $uid = $this->user->id;
        !is_array($rights) && $rights = (array) $rights;
        $access = $this->getUserRights($uid) OR $access = new Core_ArrayObject();
        foreach ($rights as $right) {
            $access->offsetExists($right) OR $access->offsetSet($right, TRUE);
        }
        $this->system_cache->write('access/users/' . $uid, $access);
    }

    /**
     * Remove rights from user
     * 
     * @param   int $uid
     * @param   array   $rights
     */
    public function removeUserRights($rights, $uid=NULL) {
        $uid OR $uid = $this->user->id;
        !is_array($rights) && $rights = (array) $rights;
        $access = $this->getUserRights($uid) OR $access = new Core_ArrayObject();
        foreach ($rights as $right) {
            $access->offsetExists($right) && $access->offsetUnset($right);
        }
        $this->system_cache->write('access/users/' . $uid, $access);
    }

    /**
     * Get rights for group
     * 
     * @param int $gid
     * @return mixed 
     */
    public function getUserGroupRights($gid) {
        return $this->system_cache->read('access/user_group/' . $gid, TRUE);
    }

    /**
     * Set rights for user_group
     * 
     * @param   int $user_group
     * @param   array   $rights
     */
    public function addUserGroupRights($rights, $user_group=NULL) {
        $user_group OR $user_group = $this->user->user_group;
        !is_array($rights) && $rights = (array) $rights;
        $access = $this->getUserGroupRights($user_group) OR $access = new Core_ArrayObject();
        foreach ($rights as $right) {
            $access->offsetExists($right) OR $access->offsetSet($right, TRUE);
        }
        $this->system_cache->write('access/user_group/' . $user_group, $access);
    }

    /**
     * Remove rights from user_group
     * 
     * @param   int $uid
     * @param   array   $rights
     */
    public function removeUserGroupRights($rights, $uid=NULL) {
        $uid OR $uid = $this->user_group->id;
        !is_array($rights) && $rights = (array) $rights;
        $access = $this->getUserGroupRights($user_group) OR $access = new Core_ArrayObject();
        foreach ($rights as $right) {
            $access->offsetExists($right) && $access->offsetUnset($right);
        }
        $this->system_cache->write('access/user_group/' . $user_group, $access);
    }

    /**
     * Public function clear
     */
    public function reset() {
        $this->session->remove('access');
    }

    /**
     * Clear all stored cache data
     */
    public function clear() {
        $this->system_cache->removeTags('access');
    }

    /**
     * Save rules
     */
    public function save() {
        if ($this->refresh_flag) {
            $this->system_cache->write('access/rules', $this->rules, array('access'));
        }
    }

    /**
     * 
     */
    public function _403() {
        $this->response->header('Status', '403 ' . Response::$codes[403]);
        exit(t('You don\'t have enought permissions to access this page.'));
    }

}

function access($rule) {
    return cogear()->access->check($rule);
}

function page_access($rule) {
    $cogear = getInstance();
    if (access($rule)) {
        return TRUE;
    } else {
        return _403();
    }
}

function _403() {
    $cogear = getInstance();
    $cogear->router->exec(array($cogear->access, '_403'));
}