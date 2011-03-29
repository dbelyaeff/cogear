<?php

return array(
    'name' => 'page-createdit',
    'elements' => array(
        'name' => array(
            'type' => 'text',
            'label' => t('Name'),
            'validators' => array(array('Length', 3), 'Required'),
        ),
        'url_name' => array(
            'type' => 'text',
            'label' => t('Machine name'),
            'validators' => array(array('Length', 3)),
            'filters' => array('Core_Filters_MachineName'),
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