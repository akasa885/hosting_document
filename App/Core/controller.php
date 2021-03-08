<?php

class Controller
{
  /*public function __construct()
  {

  }*/

  public function view($view, $data=[], $chnl='')
  {
      require_once'App/View/'. $view . '.php';    
  }

  public function model($model)
  {
    require_once'App/Model/'. $model . '.php';
    return new $model;
  }
}
