<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__).'/backend-local.php'),
    array(

        // backend-dev components
        'components'=>array(
            // uncomment the following to use a MySQL database
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=project10',
                'emulatePrepare' => true,
                'username' => 'project10',
                'password' => 'astamproject',
                'charset' => 'utf8',
            ),
        ),
    )
);