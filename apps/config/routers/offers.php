<?php 

$router->addGet("/offers[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'offers',
        'action'     => 'list',
    ]
);

$router->addGet("/offers/(\d+)[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'offers',
        'action'     => 'view',
        'id'         => 1
    ]
);


