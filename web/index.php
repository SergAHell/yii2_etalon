<?php

mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Moscow');

// comment out the following two lines when deployed to production
if (!empty($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
	defined('YII_DEBUG') or define('YII_DEBUG', true);
	defined('YII_ENV') or define('YII_ENV', 'dev');
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');
if (is_file(__DIR__ . '/../config/web-local.php')) {
	$config = yii\helpers\ArrayHelper::merge(
		$config,
		require(__DIR__ . '/../config/web-local.php')
	);
}

(new yii\web\Application($config))->run();
