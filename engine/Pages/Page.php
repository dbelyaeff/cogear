<?php
/**
 *  Page object 
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Pages
 * @version		$Id$
 */
class Page_Page extends Db_ORM {
    /**
     * Constructor
     * 
     * @param   boolean $autoinit
     */
    public function __construct() {
        parent::__construct('pages');
    }
    /**
     * Save page
     */
    public function save(){
        if($this->pid){
            $this->genPath();
        }
    }
    /**
     * Generate materialized path
     */
    private function getPath(){
        
    }
    /**
     * Get url
     */
    public function getUrl(){
        
    }
}