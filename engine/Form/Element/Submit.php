<?php
/**
 *  Form Element Submit
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Form
 * @version		$Id$
 */
class Form_Element_Submit extends Form_Element_Abstract{
    protected $type = 'submit';
    protected $wrapper = FALSE;
    /**
     * Buttons data shouldn't be in result
     *
     * @return NULL
     */
    public function result(){
        return NULL;
    }
}
