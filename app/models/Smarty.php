<?php

namespace App\Models;


class Smarty extends \Smarty
{


  public function __construct()
  {
    parent::__construct();

    $this->setCompileDir(dirname(__DIR__) . '/runtime/smarty/compile');
    $this->setConfigDir(dirname(__DIR__) . '/runtime/smarty/config');
    $this->setCacheDir(dirname(__DIR__) . '/runtime/smarty/cache');
  }

}

