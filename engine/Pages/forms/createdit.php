<?php

return array(
    'name' => 'page-createdit',
    'elements' => array(
        'name' => array(
            'type' => 'text',
            'label' => t('Name'),
            'description' => t('Provide name of the page.'),
            'validators' => array(array('Length', 3), 'Required'),
        ),
        'url' => array(
            'type' => 'text',
            'label' => t('Url'),
            'description' => t('If you want page to have special url, you may define it here. <br/> Leave this field empty to generate url automatically.'),
            'validators' => array(array('Length', 3)),
            'filters' => array('Form_Filter_MachineName'),
        ),
        'body' => array(
            'type' => 'textarea',
            'label' => t('Text'),
            'validators' => array('Required'),
        ),
        'submit' => array(
            'type' => 'submit',
            'value' => t('Save'),
        )
    ),
);