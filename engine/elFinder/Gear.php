<?php

/**
 * elFinder Gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class elFinder_Gear extends Gear {

    protected $name = 'elFinder';
    protected $description = 'Perfect file manager';
    protected static $is_loaded;

    /**
     * Load elFinder
     */
    public function load() {
        if (!self::$is_loaded) {
            js($this->folder . '/elfinder-2.0-beta/js/elfinder.full.js');
            css($this->folder . '/elfinder-2.0-beta/css/elfinder.full.css');
            css($this->folder . '/elfinder-2.0-beta/css/theme.css');
            self::$is_loaded = TRUE;
        }
    }
    /**
     * 
     */
    public function show_action(){
       $this->load();
       $tpl = new Template('elFinder.elfinder');
       $tpl->show();
    }
    /**
     * Handle elFinder requests
     */
    public function connector_action() {
        $path = $this->dir.DS.'files'.DS;//this->user->dir();
        Filesystem::makeDir($path);
        $opts = array(
            'path' => Filesystem::makeDir($path), // path to root directory
            'URL' => Url::toUri($path) . '/', // root directory URL
            'driver' => 'LocalFileSystem',
            'accessControl' => array($this,'access'),
        );

        $fm = new elFinder_Connector(new elFinder_Object($opts));
        $fm->run();
    }
    
    public function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0   // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')  // set read+write to false, other (locked+hidden) set to true
		: ($attr == 'read' || $attr == 'write');  // else set read+write to true, locked+hidden to false
}

}
