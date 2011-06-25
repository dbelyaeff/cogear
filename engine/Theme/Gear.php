<?php

/**
 * Theme gear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Theme
 * @version		$Id$
 */
class Theme_Gear extends Gear {

    protected $name = 'Theme gear';
    protected $description = 'Manage themes';
    protected $type = Gear::CORE;
    protected $package = '';
    protected $order = 0;

    /**
     * Init
     */
    public function init() {
        parent::init();
        $cogear = getInstance();
        if($favicon = $cogear->get('theme.favicon')){
            hook('theme.head.meta.after',array($this,'renderFavicon'));
        }
    }
    
    public function renderFavicon(){
        echo '<link rel="shortcut icon" href="'.Url::toUri(UPLOADS).cogear()->get('theme.favicon').'" />'."\n";
    }

    /**
     * Default dispatcher
     * 
     * @param string $type 
     */
    public function admin($action = '', $subaction = NULL) {
        $form = new Form('Admin.theme');

        if ($form->is_ajaxed) {
            if ($form->elements->logo->is_ajaxed) {
                $cogear->set('theme.logo', '');
            }
            if ($form->elements->favicon->is_ajaxed) {
                $cogear->set('theme.favicon', '');
            }
        } else {
            $form->setValues(array(
                'logo' => config('theme.logo'),
                'favicon' => config('theme.favicon'),
            ));
        }
        if ($result = $form->result()) {
            $result->logo && $cogear->set('theme.logo', $result->logo);
            $result->favicon && $cogear->set('theme.favicon', $result->favicon);
        }
        append('content', $form->render());
    }
}