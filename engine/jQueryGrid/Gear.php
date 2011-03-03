<?php
/**
 * Add jQGrid support to Cogear
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		jQueryGrid
 * @subpackage
 * @version		$Id$
 */
class jQueryGrid_Gear extends Gear {
    protected $name = 'jQuery Grid';
    protected $description = 'Add jqgrid support to cogear.';
    protected $package = 'jQuery';
    /**
     * Preserve autoload of huge amount of scripts
     */
    public function init(){
        
    }
}
