<?php
/**
 * Ajax helper
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Ajax {
    const PARAMS = '?';
    const PATH = '/';
    /**
     * Form ajax request via params
     * 
     * @param array $params 
     * @return string
     */
    public static function link($params,$prefix = self::PARAMS){
        return '#'.$prefix.http_build_query($params);
    }
    /**
     * Check if the ajax request has been caught
     * 
     * @return boolean
     */
    public static function is(){
        $cogear = getInstance();
        return $cogear->request->isAjax();
    }
    /**
     * Get ajax param
     * 
     * @param   string|array  $name
     * $param   mixed   $default
     */
    public static function get($name,$default = NULL){
        if(is_array($name)){
            $result = array();
            foreach($name as $value){
                $result[$value] = self::get($value);
            }
            return $result;
        }
        if(self::is() && isset($_GET[$name])){
            return $_GET[$name];
        }
        return $default;
    }
    
    /**
     * Send JSON response
     * 
     * @param array $data 
     */
    public static function json($data) {
        echo json_encode($data);
        $cogear = getInstance();
        $cogear->clear();
        exit();
    }
}