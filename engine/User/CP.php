<?php
/**
 * User Control Panel
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          User
 * @version		$Id$
 */
class User_CP extends Core_ArrayObject{
    /**
     * Render control panel
     * 
     * @return string 
     */
    public function render(){
        event('user_cp.render.before',$this);
        $tpl = new Template('User.control_panel');
        $tpl->data = $this;
        return $tpl->render();
    }
    /**
     * Show output
     */
    public function output(){
        echo $this->render();
    }
}
