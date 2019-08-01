<?php

namespace App\Controllers;


use PimpleSingleton\Container;


class Controller
{

  protected $view;
  protected $base_url;


  public function __construct()
  {
    $this->base_url = Container::getContainer()['base_url'];

    $smarty = new \App\Models\Smarty();

    $smarty->assign('base_url', $this->base_url);

    $this->view = $smarty;
  }


  /**
   * @param string $message
   * @param string $url
   * * @return mixed
   */
  public function redirectWithError($message, $url)
  {
    Container::getContainer()['flash']->addMessage('error', $message);

    $response = new \Slim\Http\Response();

    return $response->withStatus(302)->withHeader('Location', $url);
  }


  /**
   * @param string $message
   * @param string $url
   * * @return mixed
   */
  public function redirectWithSuccess($message, $url)
  {
    Container::getContainer()['flash']->addMessage('success', $message);

    $response = new \Slim\Http\Response();

    return $response->withStatus(302)->withHeader('Location', $url);
  }


  public function display404()
  {
    $response = new \Slim\Http\Response(404);

    $this->view->setTemplateDir(dirname(__DIR__) . '/views');
    $view = $this->view->fetch('404.tpl');

    return $response->withStatus(404)
                    ->withHeader('Content-Type', 'text/html')
                    ->write($view);
  }

}
