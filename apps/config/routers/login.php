<?php 

$router->addGet("/login[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'login',
        'action'     => 'form',
    ]
);

$router->addGet("/logout[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'login',
        'action'     => 'logout',
    ]
);

$router->addPost("/login[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'login',
        'action'     => 'login',
    ]
);
