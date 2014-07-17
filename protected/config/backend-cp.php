<?php
$webRoot = dirname(__FILE__);

// uncomment the following to define a path alias
 Yii::setPathOfAlias('bootstrap', dirname($webRoot).'/extensions/bootstrap');
//print_r(Yii::getPathOfAlias('bootstrap.widgets.TbHeroUnit')); exit;
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'name'=>'Админпанель AstamWEB',
        'theme'=>'bootstrap',
        'homeUrl'=>array('admin/index'),

        //backend modules
        'modules'=>array(
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'lex',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('127.0.0.1','::1'),
                'generatorPaths'=>array(
                    'bootstrap.gii',
                ),
            ),
        ),

        // backend components
        'components'=>array(
            'user'=>array(
                'loginUrl'=>array('admin/login'),
            ),

            'bootstrap'=>array(
                'class'=>'bootstrap.components.Bootstrap',
            ),

            // uncomment the following to use a MySQL database
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname=astamweb',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
            ),

            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>array(
                    'admin'=>'admin/index',
                    'admin/<_c>'=>'<_c>',
                    'admin/<_c>/<_a>'=>'<_c>/<_a>',
                ),
            ),

            'errorHandler'=>array(
                // use 'site/error' action to display errors
                'errorAction'=>'admin/error',
            ),
        ),
    )
);