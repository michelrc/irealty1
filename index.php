<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

date_default_timezone_set('UTC');

define('WEBROOT', dirname(__FILE__));

define('YII_ROOT', dirname(__FILE__).'/protected');
set_include_path(YII_ROOT . "/includes" . PATH_SEPARATOR . get_include_path());
require_once('shortcuts.php');

require_once($yii);

$app = Yii::createWebApplication($config);

$app->run();
