<?php

// change the following paths if necessary
$yiic=dirname(__FILE__).'/../framework/yiic.php';
$config=dirname(__FILE__).'/config/console.php';

define('WEBROOT', dirname(__FILE__).'/..');

define('YII_ROOT', dirname(__FILE__));
set_include_path(YII_ROOT . "/includes" . PATH_SEPARATOR . get_include_path());
require_once('shortcuts.php');

require_once($yiic);
