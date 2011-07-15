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
     * Init
     */
    public function init(){
        parent::init();
    }

    /**
     * Load elFinder
     */
    public function load() {
        if(!self::$is_loaded){
            js($this->folder.'/elfinder-1.1/js/elfinder.min.js');
            css($this->folder.'/elfinder-1.1/css/elfinder.css');
            self::$is_loaded = TRUE;
        }
    }

    /**
     * Handle elFinder requests
     */
    public function index_action() {
        $path = UPLOADS . DS . 'files' . DS . cogear()->user->id;
        $opts = array(
            'root' => Filesystem::makeDir($path), // path to root directory
            'URL' => Url::toUri($path).'/', // root directory URL
            'rootAlias' => 'Home', // display this instead of root directory name
                //'uploadAllow'   => array('images/*'),
                //'uploadDeny'    => array('all'),
                //'uploadOrder'   => 'deny,allow'
                // 'disabled'     => array(),      // list of not allowed commands
                // 'dotFiles'     => false,        // display dot files
                // 'dirSize'      => true,         // count total directories sizes
                // 'fileMode'     => 0666,         // new files mode
                // 'dirMode'      => 0777,         // new folders mode
                // 'mimeDetect'   => 'auto',       // files mimetypes detection method (finfo, mime_content_type, linux (file -ib), bsd (file -Ib), internal (by extensions))
                // 'uploadAllow'  => array(),      // mimetypes which allowed to upload
                // 'uploadDeny'   => array(),      // mimetypes which not allowed to upload
                // 'uploadOrder'  => 'deny,allow', // order to proccess uploadAllow and uploadAllow options
                // 'imgLib'       => 'auto',       // image manipulation library (imagick, mogrify, gd)
                // 'tmbDir'       => '.tmb',       // directory name for image thumbnails. Set to "" to avoid thumbnails generation
                // 'tmbCleanProb' => 1,            // how frequiently clean thumbnails dir (0 - never, 100 - every init request)
                // 'tmbAtOnce'    => 5,            // number of thumbnails to generate per request
                // 'tmbSize'      => 48,           // images thumbnails size (px)
                // 'fileURL'      => true,         // display file URL in "get info"
                // 'dateFormat'   => 'j M Y H:i',  // file modification date format
                // 'logger'       => null,         // object logger
                // 'defaults'     => array(        // default permisions
                // 	'read'   => true,
                // 	'write'  => true,
                // 	'rm'     => true
                // 	),
                // 'perms'        => array(),      // individual folders/files permisions    
                // 'debug'        => true,         // send debug to client
                // 'archiveMimes' => array(),      // allowed archive's mimetypes to create. Leave empty for all available types.
                // 'archivers'    => array()       // info about archivers to use. See example below. Leave empty for auto detect
                // 'archivers' => array(
                // 	'create' => array(
                // 		'application/x-gzip' => array(
                // 			'cmd' => 'tar',
                // 			'argc' => '-czf',
                // 			'ext'  => 'tar.gz'
                // 			)
                // 		),
                // 	'extract' => array(
                // 		'application/x-gzip' => array(
                // 			'cmd'  => 'tar',
                // 			'argc' => '-xzf',
                // 			'ext'  => 'tar.gz'
                // 			),
                // 		'application/x-bzip2' => array(
                // 			'cmd'  => 'tar',
                // 			'argc' => '-xjf',
                // 			'ext'  => 'tar.bz'
                // 			)
                // 		)
                // 	)
        );

        $fm = new elFinder_Adapter($opts);
        $fm->run();
    }

}
