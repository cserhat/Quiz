<?php

require_once '../App/Autoloader.php' ;

App\Autoloader::register();
if(isset($_GET['url'])){
$router = new App\Routes\Router($_GET['url']);

}
else
{
    header('location:/home');
}

ob_start();

$router->get('', function(){require '../App/Views/home.php';});
$router->get('/', function(){require '../App/Views/home.php';});

$router->get('/home', function(){require '../App/Views/home.php';});
$router->post('/home', function(){require '../App/Views/home.php';});

$router->get('/quiz', function(){require '../App/Views/quiz.php';});
$router->post('/quiz', function(){require '../App/Views/quiz.php';});

$router->get('/score', function(){require '../App/Views/scoreboard.php';});

$router->run();

ob_end_flush();