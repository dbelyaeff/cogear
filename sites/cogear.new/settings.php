<?php
return array(
    'database' => array(
        'dsn' => 'mysqli://root@localhost/cogear',
    ),
    'permitted_uri_chars' => 'а-яa-z0-9\s_\.',
    'cache' => array(
        'adapter' => 'Cache_Adapter_File',
        'enabled' => TRUE,
        'path' => SITE . DS . 'cache',
    ),
    // Secret key
    'key' => 'asdlmk1;2u3192y23uhsdhhabgkjahsdgkjghasd',
    'development' => TRUE,
    'site' => array(
        'name' => 'cogear',
        'locale' => 'ru',
    ),
);

