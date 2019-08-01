<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/services.php';

$app = new \Slim\App(include_once __DIR__ . '/app/configs/config.php');

loadServices($app, __DIR__);

$app->run();
