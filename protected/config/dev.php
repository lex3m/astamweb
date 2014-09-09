<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'name'=>'AstamWEB - DEV',

        // application components
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