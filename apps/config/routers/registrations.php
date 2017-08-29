<?php 

$router->addGet("/registration[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'registration',
        'action'     => 'form',
    ]
)->setName("registrationForm");

$router->addPost("/registration[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'registration',
        'action'     => 'registration',
    ]
);

