<?php 

$router->addGet("/my/profile[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'profile',
        'action'     => 'main',
    ]
);

$router->addPost("/my/profile[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'profile',
        'action'     => 'update',
    ]
);

$router->addGet("/my/profile/contacts[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'profile',
        'action'     => 'main',
    ]
);

$router->addGet("/my/profile/main[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'profile',
        'action'     => 'main',
    ]
);

$router->addGet("/my/profile/address[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'profile',
        'action'     => 'main',
    ]
);

