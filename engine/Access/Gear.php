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
class Access_Gear extends Gear{
    protected $name = 'Access';
    protected $description = 'Access control gear';
    protected $rules;
    protected $refresh;
    /**
     * Desctructor
     */
    public function __destruct(){
        if($this->refresh){
            $this->reset();
            $this->clear();
        }
    }
    /**
     * Init
     */
    public function init(){
        parent::init();
        $cogear = getInstance();
        $this->setRules();
        $this->setRights();
    }
    /**
     * Check rules
     *
     * @param string $rule
     */
    public function check($rule){
        $cogear = getInstance();
        if(!in_array($rule,$this->rules)){
            $this->addRule($rule);
        }
        if($cogear->user->id == 1) return TRUE;
        return $cogear->session->access && $cogear->session->access->{$rule};
    }
    /**
     * Add new rule
     * 
     * @param string $rule 
     */
    public function addRule($rule){
        $cogear = getInstance();
        $rule = preg_replace('[^a-z0-9_]','',$rule);
        $cogear->db->silent();
        $cogear->db->insert('access_rules',array('rule'=>$rule));
        $cogear->db->silent();
        $this->refresh = TRUE;
    }
    /**
     * Set rules
     */
    public function setRules(){
        $cogear = getInstance();
        if(!$this->rules = $cogear->system_cache->read('access/rules')){
            $rules = $cogear->db->order('rule')->get('access_rules')->result();
            foreach($rules as $rule){
              $this->rules[$rule->id] = $rule->rule;
            }
            $cogear->system_cache->write('access/rules',$this->rules,array('access'));
        }
    }
    /**
     * Set rights for user
     */
    public function setRights(){
        $cogear = getInstance();
        DEVELOPMENT && $this->reset();
        if($cogear->session->access !== NULL){
            return;
        }
        if(!$access = $cogear->system_cache->read('access/user_group/'.$cogear->user->user_group)){
            if($access = $cogear->db->get_where('access',array('gid'=>$cogear->user->user_group))->result()){
                $cogear->system_cache->write('access/user_group/'.$cogear->user->user_group,$access,array('access','user_groups','access/user_groups'));
            }
        }
        if(!$user_access = $cogear->system_cache->read('access/users/'.$cogear->user->id)){
            if($user_access = $cogear->db->get_where('access',array('uid'=>$cogear->user->id))->result()){
                $cogear->system_cache->write('access/users/'.$cogear->user->id,$user_access,array('access','access/users','user/'.$cogear->user->id));
            }
        }
        $user_access && $access->mix($user_access);
        $cogear->session->access = Core_ArrayObject::transform($this->prepare($access));
    }
    /**
     * Prepare database data to be saved as access rules
     *
     * @param mixed $access
     * @return array
     */
    protected function prepare($access){
        if(!$access) return $access;
        $result = array();
        foreach($access as $rule){
            if(isset($this->rules[$rule->rid]) && $name = $this->rules[$rule->rid]){
                $result[$name] = $rule->rid;
            }
        }
        return $result;
    }

    /**
     * Public function clear
     */
    public function reset(){
        $cogear = getInstance();
        $cogear->session->remove('access');
    }
    /**
     * Clear all stored cache data
     */
    public function clear(){
        $cogear = getInstance();
        $cogear->system_cache->removeTags('access');
    }
}

function access($rule){
    $cogear = getInstance();
    return $cogear->access->check($rule);
}
