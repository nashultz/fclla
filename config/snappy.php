<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => false,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
