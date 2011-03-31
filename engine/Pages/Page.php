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
class Pages_Page extends Db_ORM {
    const PATH_DELIM = '.';
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
        // Event call
        event('page.save.before',$this);
        parent::save();
        // Generate hierarchy path
        $this->genPath();
        // Update object data
        $this->update();
        // Event call
        event('page.save.after',$this);
    }
    /**
     * Generate materialized path
     */
    private function genPath(){
        // If parent page id is defined
        if($this->pid){
            $page = new self();
            // If parent page is found
            if($page->where('id',$this->pid)->find()){
                $this->path = $this->makePath($page->id.self::PATH_DELIM.$this->pid);
            }
            // Otherwise
            else {
                $this->path = $this->makePath($this->id);
            }
        }
        else {
            $this->path = $this->makePath($this->id);
        }
    }
    /**
     * Make path
     * 
     * @param string $path 
     * @return  string
     */
    private function makePath($path){
        return str_pad($path, 255, ' ', STR_PAD_LEFT);
    }
    /**
     * Get url
     * 
     * @return  string
     */
    public function getUrl(){
        if($this->url){
            $link = str_replace(array('<id>','<url>'),array($this->id,$this->url),config('pages.url',Pages_Gear::DEFAULT_PAGE_URL));
        }
        else {
            $link = Url::gear('pages').'show/'.$this->id;
        }
        return $link;
    }
}