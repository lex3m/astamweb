<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__).'/backend-local.php'),
    array(
        // backend production application components
        'components'=>array(
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=astamweb',
                'emulatePrepare' => true,
                'username' => 'astamweb_user',
                'password' => 'vSVwlbP4',
                'charset' => 'utf8',
            ),
        ),
    )
);