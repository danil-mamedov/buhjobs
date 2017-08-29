<?php 

use Phalcon\Mvc\Router;

$router = new Router(false);        

$router->add("/", 
    [
        'module'     => 'frontend',
        'controller' => 'index',
        'action'     => 'index',
    ]
);

include 'routers/registrations.php';
include 'routers/login.php';
include 'routers/vacancies.php';
include 'routers/messages.php';
include 'routers/profile.php';
include 'routers/offers.php';

return $router;