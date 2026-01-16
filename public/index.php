<?php
session_start();
require_once __DIR__ . "/../app/core/Controller.php";
require_once __DIR__ . "/../app/core/Router.php";
// require_once __DIR__ . "/../app/views/alerts/alert.php";
$router = new Router();
$router->display();



?>