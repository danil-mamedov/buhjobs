<?php 

$router->addGet("/my/messages[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'messages',
        'action'     => 'list',
    ]
);
