<?php

return array(
    'database' => array(
      'dsn'=> 'mysql://root@localhost/cogear'
      ),
    'cache' => array(
        'adapter' => Cache::FILE,
        'enabled' => TRUE,
        'path' => SITE . DS . 'cache',
    ),
    // Secret key
    'key' => 'asdlmk1;2u3192y23uhsdhhabgkjahsdgkjghasd',
    'development' => TRUE,
);

