<?php
return array(
            'name' => 'admin-theme',
            'elements' => array(
                'logo' => array(
                    'label' => t('Logo'),
                    'type' => 'image',
                    'path' => UPLOADS.DS.'theme'.DS.'logo',
                    'rename' => 'logo',
                ),
                'submit' => array(
                    'type' => 'submit',
                    'value' => t('Update'),
                )
            )
        );