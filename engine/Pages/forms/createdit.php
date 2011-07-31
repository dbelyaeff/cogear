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
        'body' => array(
            'type' => 'editor',
            'label' => t('Text'),
            'validators' => array(array('Length', 10),'Required'),
        ),
        'submit' => array(
            'type' => 'submit',
            'label' => t('Save'),
        )
    ),
);