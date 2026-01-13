<?php

class Router{

  public function display(){
      $url = filter_var($_GET['path'] ?? 'auth' , FILTER_SANITIZE_URL);
      $url = explode('/' , trim($url , "/"));
      $controllerName = ucfirst($url[0]) . "Controller";
      $method = $url[1] ?? 'index';
      $controllerPath = "../app/controllers/$controllerName.php";
    
      if(!file_exists($controllerPath)){
          require_once __DIR__ . "/../controllers/NotfoundController.php";
          $error = new NotfoundController();
          $error->index();
          return;
          }
          require $controllerPath;
          $controller = new $controllerName();

      if(!method_exists($controllerName,$method)){
          require_once __DIR__ . "/../controllers/NotfoundController.php";
          $error = new NotfoundController();
          $error->index();
          return;
      }
          $controller->$method();
      }
}

?>