<?php

use PimpleSingleton\Container;


function getRouteURL($route, $params = [], $full = true)
{
  $dir = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

  /** @var \Slim\App $app */
  $app = Container::getContainer()['app'];
  /** @var \Slim\Router $router */
  $router = $app->getContainer()->get('router');
  $url = $router->pathFor($route, $params);

  // removing the leading dir
  $url = substr($url, strlen($dir) + 1);

  if ($full) {
    $url = Container::getContainer()['base_url'] . '/' . $url;
  }

  return $url;
}
