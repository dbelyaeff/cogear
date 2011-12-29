<?php
/**
 * Install gear
 *
 * @author		Naumov Aleksandr <inetlover@gmail.com>
 * @copyright		Copyright (c) 2011, Naumov Aleksandr
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          VizitCard
 * @version		$Id$
 */
class VizitCard_Menu extends Menu_Auto {
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct('vizitcard', 'VizitCard.menu');
        hook('sidebar',array($this,'output'));
    }
}
