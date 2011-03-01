<?php
/**
 * Validate user email
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          User
 * @version		$Id$
 */
class User_Validate_Email extends Form_Validate_Abstract{
    /**
     * Validate user email.
     * 
     * @param string $value 
     */
    public function validate($value){
        if(!$value) return TRUE;
        $user = new Db_ORM('users');
        $user->email = $value;
        return $user->find() && $this->element->addError(t('Email is already taken!')) ? FALSE : TRUE;
    }
}