<?php
return array(
            'name' => 'user-profile',
            'elements' => array(
                'avatar' => array(
                    'label' => t('Avatar','User'),
                    'type' => 'image',
                    //'resize' => config('user.avatar.size','64x64'),
                    'sizecrop' => config('user.avatar.sizecrop','64x64'),
                    'path' => UPLOADS.DS.'avatars'.DS.cogear()->user->id,
                    //'rename' => cogear()->user->id,
                ),
                'login' => array(
                    'label' => t('Login','User'),
                    'type' => 'text',
                    'access' => access('user edit_login'),
                    'validators' => array(array('Length',3),'AlphaNum','Required',array('User_Validate_Login', User_Validate_Login::EXCLUDE_SELF)),
                ),
                'email' => array(
                    'label' => t('E-Mail','User'),
                    'type' => 'text',
                    'validators' => array('Email','Required',array('User_Validate_Email',  User_Validate_Email::EXCLUDE_SELF)),
                ),
                'password' => array(
                    'label' => t('Password','User'),
                    'type' => 'password',
                    'validators' => array(array('Length',3),'AlphaNum')
                ),
//                'role' => array(
//                    'label' => t('Role','User'),
//                    'type' => 'select',
//                    'validators' => array('Required'),
//                    'callback' => 'User_Gear->getRoles',
//                ),
//                'options' => array(
//                    'label' => t('Test','User'),
//                    'type' => 'checkbox',
//                ),
                'submit' => array(
                    'type' => 'submit',
                    'label' => t('Update'),
                )

            )
        );