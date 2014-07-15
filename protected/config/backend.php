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

        //backend modules
        'modules'=>array(
            'gii'=>array(
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
        ),
    )
);