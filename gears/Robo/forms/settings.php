<?php

return array(
    'name' => 'robo-settings',
    'elements' => array(
        'header' => array(
            'type' => 'div',
            'value' => HTML::paired_tag('h1', t('Robo settings')),
        ),
        'ip' => array(
            'type' => 'text',
            'label' => t('IP: '),
            'description' => t('Please, input robot IP.'),
            'value' => config('robo.adapter.IP', '192.168.0.1'),
            'validators' => array('Required'),
        ),
        'adapter' => array(
            'type' => 'select',
            'label' => t('Choose adapter: '),
            'description' => t('Choose an adapter for controlled robot.'),
            'values' => Robo_Gear::$adapters,
            'value' => config('robo.adapter.default', 'rovio'),
            'validators' => array('Required'),
        ),
        'save' => array(
            'type' => 'submit',
            'label' => t('Save'),
        )
    ),
);