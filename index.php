<?php

include './vendor/autoload.php';

use \App\Common\Environment;
use App\Controller\ErrorController;

// configutação das environmentes
Environment::load(__DIR__);


// confgiguração das routes
$url = explode('?', $_SERVER['REQUEST_URI'])[0];

$routes = include 'App/routes/index.php';

if (!isset($routes[$url])) {
  (new ErrorController())->notFoundAction();
  exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName())->$methodName();


