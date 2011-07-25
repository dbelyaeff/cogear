<?php
/**
 * Assets harvester class
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Assets
 * @version		$Id$
 */
class Harvester{
    /**
     * Scripts
     *
     * @var Core_ArrayObject
     */
    private $scripts;
    /**
     * Styles
     *
     * @var Core_ArrayObject
     */
    private $styles;
    /**
     * Constructor
     */
    public function __construct(){
        $this->clear();
        Template::bindGlobal('scripts',$this->scripts);
        Template::bindGlobal('styles',$this->styles);
        hook('head',array($this,'output'));
    }

    /**
     * Add script
     *
     * @param   string  $path
     * @param   string  $group
     */
    public function addScript($path,$group = 'default'){
       if(Filesystem::getExtension($path) == 'js'){
           isset($this->scripts->$group) OR $this->scripts->$group = new Core_ArrayObject();
           $this->scripts->$group->$path = HTML::script(self::preparePath($path));
       }
    }
    /**
     * Add directory with scripts
     *
     * @param   string  $path
     * @param   string  $group
     */
    public function addScriptsFolder($path,$group = 'default'){
        if(is_dir($path) && $files = glob($path.DS.'*.js')){
            foreach($files as $file){
                $this->addScript($file,$group);
            }
        }
    }
    /**
     * Add style
     *
     * @param   string  $path
     */
    public function addStyle($path,$media = 'screen'){
       if(Filesystem::getExtension($path) == 'css'){
           isset($this->styles->$media) OR $this->styles->$media = new Core_ArrayObject();
           $this->styles->$media->$path = HTML::style(self::preparePath($path),array('media'=>$media));
       }
    }
    /**
     * Add directory with styles
     *
     * @param   string  $path
     * @param   string  $media
     */
    public function addStylesFolder($path,$media = 'screen'){
        if(is_dir($path) && $files = glob($path.DS.'*.css')){
            foreach($files as $file){
                $this->addStyle($file,$media);
            }
        }
    }
    /**
     * Prepare path to be valid like url
     *
     * @param   string  $path
     * @return  string
     */
    public static function preparePath($path){
       if(strpos($path,ROOT) !== FALSE){
           $path = str_replace(ROOT,'',$path);
           $path = Gear::normalizePath($path);
       }
       return Url::link($path);
    }
    /**
     * Get scripts
     *
     * @return string
     */
    public function getScripts(){
        return $this->scripts->__toString()."\n";
    }
    /**
     * Get styles
     *
     * @return string
     */
    public function getStyles(){
        return $this->styles->__toString()."\n";
    }
    /**
     * Get assets = scripts + styles
     *
     * @return string
     */
    public function getAssets(){
        return $this->getScripts()."\n".$this->getStyles()."\n";
    }
    /**
     * Output 
     */
    public function output(){
        echo $this->getAssets();
    }
    /**
     * Reset styles and scripts
     */
    public function clear(){
        $this->scripts = new Core_ArrayObject();
        $this->styles = new Core_ArrayObject();
    }
}

function css($url,$region='content'){
    append($region,HTML::style($url));
}
function js($url,$region='content'){
    append($region,HTML::script($url));
}

function inline_js($code,$region='content'){
    append($region,HTML::script($code, array(),TRUE));
}