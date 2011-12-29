<?php

return array(
    'name' => 'vizitcard-site',
    'elements' => array(
        'sitename' => array(
            'type' => 'text',
            'label' => t('Site name').' *',
            'validators' => array('Required')
        ),
        'key' => array(
            'type' => 'text',
            'label' => t('Secret key').' *',
            'validators' => array('Required')
        ),
        'database' => array(
            'type' => 'text',
            'label' => t('Database connection'),
            'description' => t('Example: mysql://root:password@localhost/database'),
            'value' => config('database.dsn')
        ),
        'save' => array(
            'type' => 'submit',
            'label' => t('Next')
        )
    )
);
