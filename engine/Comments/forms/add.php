<?php
return array(
    'name' => 'comment',
    'elements' => array(
        'body' => array(
            'type' => 'textarea',
            'validators' => array('Required',array('Length',5)),
            'filters' => array('strip_tags'),
        ),
        'submit' => array(
            'type' => 'submit',
            'label' => t('Post'),
        ),
    )
);
