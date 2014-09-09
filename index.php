<?php

$webRoot = dirname(__FILE__);

// Если хост равен localhost, то включаем режим отладки и подключаем отладочную
// конфигурацию
if($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] == '192.168.10.107' ){
    define('YII_DEBUG', true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    $yii=dirname($webRoot).'/framework/YiiBase.php';
    require_once($yii);

    class Yii extends YiiBase {
        /**
         * @static
         * @return CWebApplication
         */
        public static function app()
        {
            return parent::app();
        }
    }

    $config=$webRoot.'/protected/config/local.php';
} else if ($_SERVER['SERVER_ADDR'] == '10.10.11.200') { //иначе дев сервер
    define('YII_DEBUG', true);
    // specify how many levels of call stack should be shown in each log message
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

    $yii=$webRoot.'/framework/yii.php';
    require_once($yii);

    $config=$webRoot.'/protected/config/dev.php';
}
// Иначе выключаем режим отладки и подключаем рабочую конфигурацию
else {
    define('YII_DEBUG', false);
    require_once($webRoot.'/framework/yiilite.php');
    $config=$webRoot.'/protected/config/production.php';
}

Yii::createWebApplication($config)->runEnd('frontend');

