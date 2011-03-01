<?php

/**
 * Meta gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Meta_Gear extends Gear {

    protected $name = 'Meta';
    protected $description = 'Meta information handler.';
    protected $order = -10;
    public $info = array(
        'title' => array(),
        'keywords' => array(),
        'description' => array(),
    );

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->info = Core_ArrayObject::transform($this->info);
        Template::bindGlobal('meta', $this->info);
    }
    /**
     * Init
     */
    public function init(){
        parent::init();
        $cogear = getInstance();
        title(t($cogear->get('site.name',SITE_URL)));
    }

}
function title($text) {
    $cogear = getInstance();
    $cogear->meta->info->title->prepend($text);
}
function keywords($text) {
    strpos($text,',') && $text = explode(',',$text);
    if (is_array($text)) {
        foreach ($text as $value) {
            keywords(trim($value));
        }
        return;
    }
    $cogear = getInstance();
    $cogear->meta->info->title->append($text);
}

function description($text) {
    $cogear = getInstance();
    $cogear->meta->info->description->append($text);
}