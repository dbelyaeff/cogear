<?php

/**
 * Template
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Template_File extends Template_Abstract {
    /**
     * Constructor
     * 
     * @param string $name
     */
    public function __construct($name) {
        $this->name = $name;
        $this->path = Gear::preparePath($this->name, 'templates') . EXT;
        if(file_exists($this->path)){
            $this->code = file_get_contents($this->path);
            ini_get('short_open_tag') OR $this->code = str_replace('<?=','<?php echo',$this->code);
        }
        else {
            error(t('Template <b>%s</b> is not found by path <u>%s</u>.','Errors',$this->name,$this->path));
        }
    }
}
