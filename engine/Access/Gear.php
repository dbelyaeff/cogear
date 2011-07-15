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
    protected $refresh;

    /**
     * Desctructor
     */
    public function __destruct() {
        if ($this->refresh) {
            $this->reset();
            $this->clear();
        }
    }

    /**
     * Init
     */
    public function init() {
        parent::init();
        $this->setRules();
        $this->setRights();
    }

    /**
     * Check rules
     *
     * @param string $rule
     */
    public function check($rule) {
        if (!in_array($rule, $this->rules)) {
            $this->addRule($rule);
        }
        if ($this->user->id == 1){
            return TRUE;
        }
        return  !($this->session->access && $this->session->access->{$rule});
    }

    /**
     * Add new rule
     * 
     * @param string $rule 
     */
    public function addRule($rule) {
        $rule = preg_replace('[^a-z0-9_]', '', $rule);
        $this->db->silent();
        $this->db->insert('access_rules', array('rule' => $rule));
        $this->db->silent();
        $this->refresh = TRUE;
    }

    /**
     * Set rules
     */
    public function setRules() {
        if (!$this->rules = $this->system_cache->read('access/rules')) {
            if ($rules = $this->db->order('rule')->get('access_rules')->result()) {
                foreach ($rules as $rule) {
                    $this->rules[$rule->id] = $rule->rule;
                }
                $this->system_cache->write('access/rules', $this->rules, array('access'));
            }
        }
    }

    /**
     * Set rights for user
     */
    public function setRights() {
        DEVELOPMENT && $this->reset();
        if ($this->session->access !== NULL) {
            return;
        }
        if (!$access = $this->system_cache->read('access/user_group/' . $this->user->user_group)) {
            if ($access = $this->db->get_where('access', array('gid' => $this->user->user_group))->result()) {
                $this->system_cache->write('access/user_group/' . $this->user->user_group, $access, array('access', 'user_groups', 'access/user_groups'));
            }
        }
        if (!$user_access = $this->system_cache->read('access/users/' . $this->user->id)) {
            if ($user_access = $this->db->get_where('access', array('uid' => $this->user->id))->result()) {
                $this->system_cache->write('access/users/' . $this->user->id, $user_access, array('access', 'access/users', 'user/' . $this->user->id));
            }
        }
        $user_access && $access->mix($user_access);
        $this->session->access = Core_ArrayObject::transform($this->prepare($access));
    }

    /**
     * Prepare database data to be saved as access rules
     *
     * @param mixed $access
     * @return array
     */
    protected function prepare($access) {
        if (!$access)
            return $access;
        $result = array();
        foreach ($access as $rule) {
            if (isset($this->rules[$rule->rid]) && $name = $this->rules[$rule->rid]) {
                $result[$name] = $rule->rid;
            }
        }
        return $result;
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