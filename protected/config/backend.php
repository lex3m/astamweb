<?php
$webRoot = dirname(__FILE__);

// uncomment the following to define a path alias
 Yii::setPathOfAlias('bootstrap', dirname($webRoot).'/extensions/bootstrap');
//print_r(Yii::getPathOfAlias('bootstrap.widgets.TbHeroUnit')); exit;
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Админпанель AstamWEB',
    'theme'=>'bootstrap',
    'homeUrl'=>array('admin/index'),
    'language'=>'ru',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
    ),

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

    // application components
    'components'=>array(
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            'class' => 'WebUser',
            'loginUrl'=>array('admin/login'),
        ),
        'authManager' => array(
            'class' => 'PhpAuthManager',
            'defaultRoles' => array('guest'),
        ),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=astamweb',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => 'tbl_'
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

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    //application behaviors
    'behaviors'=>array(
        'runEnd'=>array(
            'class'=>'application.behaviors.WebApplicationEndBehavior',
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'lex24@ukr.net',
    ),
);