<?php

use PimpleSingleton\Container;


include_once __DIR__ . '/helpers.php';

function loadServices(\Slim\App $app, $dir)
{
  session_start();

  Container::getContainer()['app'] = function () use ($app) {
    return $app;
  };

  loadConfigs($dir);
  loadEnv();
  loadRoutes();
  loadFlash();
}

function loadConfigs($dir)
{
  $app_dir = $dir . '/app';

  Container::getContainer()['base_dir'] = $dir;
  Container::getContainer()['app_dir'] = $app_dir;
  Container::getContainer()['base_url'] = $_SERVER['REQUEST_SCHEME']
                                          . '://'
                                          . $_SERVER['HTTP_HOST']
                                          . str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

  Container::getContainer()['routes'] = include_once $app_dir . '/configs/routes.config.php';
}

function loadEnv()
{
  $app_dir = Container::getContainer()['app_dir'];
  $environment = null;
  if (file_exists($app_dir . '/.env')) {
    $settings = parse_ini_file('.env');

    if (isset($settings['environment'])) {
      $environment = $settings['environment'];
    }
  }

  if (is_null($environment)) {
    define('ENVIRONMENT', 'production');
  } else {
    define('ENVIRONMENT', $environment);
  }

  if (ENVIRONMENT == 'development') {
    ini_set('display_errors', 1);

    ini_set('xdebug.var_display_max_depth', '-1');
    ini_set('xdebug.var_display_max_children', '-1');
    ini_set('xdebug.var_display_max_data', '-1');
  } else {
    ini_set('display_errors', 0);
  }
}

function loadRoutes()
{
  /** @var \Slim\App $app */
  $app = Container::getContainer()['app'];
  $routes = Container::getContainer()['routes'];

  foreach ($routes as $route) {
    $new_route = $app->map($route[0], $route[1], '\\App\\Controllers\\' . $route[2] . ':' . $route[3]);
    if (isset($route[4])) {
      $new_route->setName($route[4]);
    }

    if (is_callable(['\\App\\Controllers\\' . $route[2], 'beforeAction'])) {
      $new_route->add(['\\App\\Controllers\\' . $route[2], 'beforeAction']);
    }
  }
}

function loadFlash()
{
  Container::getContainer()['flash'] = new \Slim\Flash\Messages();
}
