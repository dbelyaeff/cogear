<?php
/**
 * jQuery Grid object
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		jQueryGrid
 * @subpackage
 * @version		$Id$
 */
class jQueryGrid_Object {
    private static  $assets_are_loaded;
    protected $name = '';
    protected $data = array();
    protected $config = array(
        'datatype' => 'json',
        'mtype' => 'POST',
        'pager' => '#pager',
        'rowNum' => 10,
        'rowList' => array(10,20,30),
        'viewrecords' => true,
    );
    /**
     * Constructor
     */
    public function __construct($name,$config = array(),$data = array()){
        $cogear = getInstance();
        $this->config = new Core_ArrayObject($this->config);
        if(!self::$assets_are_loaded){
            $dir = $cogear->jQueryGrid->dir;
            $cogear->assets->addScript($dir.DS.'js'.DS.'i18n'.DS.'grid.locale-'.$cogear->get('site.locale','en').'.js');
            $cogear->assets->addScript($dir.DS.'js'.DS.'jquery.jqGrid.min.js');
            $cogear->assets->addStyle($dir.DS.'css'.DS.'ui.jqgrid.css');
            self::$assets_are_loaded = TRUE;
        }
        $this->name = $name;
        $config && $this->config->mix($config);
        $data && $this->setData($data);
    }
    /**
     * Set config
     * 
     * @param   array   $config 
     */
    public function setConfig($config){
        $this->config->mix($config);
    }
    /**
     * Set data
     * 
     * @param array $data 
     */
    public function setData($data){
        $this->data = $data;
    }
    /**
     * Render
     */
    public function render(){
        $this->request();
        $tpl = new Template('jQueryGrid.grid');
        $tpl->config = $this->config;
        $tpl->id = 'jqGrid-'.$this->name;
        $tpl->pager = trim($this->config->pager,'#');
        return $tpl->render();
    }
    /**
     * Catch request
     */
    public function request(){
    }
}
