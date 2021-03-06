<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'AstamWEB',

        // application components
        'components'=>array(

            // uncomment the following to use a MySQL database EDIT HERE!!!

            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=astamweb',
                'emulatePrepare' => true,
                'username' => 'astamweb_user',
                'password' => 'vSVwlbP4',
                'charset' => 'utf8',
            ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
            // this is used in contact page
            'adminEmail'=>'topsuak@gmail.com',
        ),
    )
);