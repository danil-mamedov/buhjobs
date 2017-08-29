<?php 
// список моих вакансий
$router->addGet("/my/vacancies[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'list',
    ]
);

// добавить вакансию
$router->addGet("/my/vacancies/add[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'form',
    ]
);

$router->addPost("/my/vacancies/add[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'add',
    ]
);

$router->addGet("/my/vacancies/(\d+)[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'one',
        'id'         => 1
    ]
);

$router->addPost("/my/vacancies/delete/(\d+)[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'delete',
        'id'         => 1
    ]
);

$router->addPost("/my/vacancies/(\d+)[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'update',
        'id'         => 1
    ]
);

// все вакансии
$router->addGet("/vacancies[/]?", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'all',
        'page'       => 1
    ]
);

$router->addGet("/vacancies/vacancy-(\d+).html", 
    [
        'module'     => 'frontend',
        'controller' => 'vacancies',
        'action'     => 'view',
        'id'       => 1
    ]
);