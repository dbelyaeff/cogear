<?php
/**
 * Structure gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          
 * @version		$Id$
 */
class Structure_Gear extends Gear {

    protected $name = 'Structure';
    protected $description = 'Provide site structure API';

    /**
     * Init
     */
    public function init() {
        parent::init();
    }
    
    public function index(){
        $page = new Pages_Page();
        $page->find(1);
    }
    
    public function addNode($table){
        $node = new Structure_Node();
        //$node->path = 
    }
}