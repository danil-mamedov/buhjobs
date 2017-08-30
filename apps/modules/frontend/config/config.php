<?php

use Phalcon\Config;

return new Config(
    [
        "database" => [
            "adapter"  => "Mysql",
            "host"     => "localhost",
            "username" => "root",
            "password" => "",
            "name"     => "buhjob",
        ],
        "application" => [
            "controllersDir" => __DIR__ . "/../controllers/",
            "modelsDir"      => __DIR__ . "/../models/",
            "viewsDir"       => __DIR__ . "/../views/",
        ],
        'permissons' => [
            [
                'role'     => 'accountant',
                'resource' => 'profile',
                'action'   => 'main'
            ],
            [
                'role'     => 'accountant',
                'resource' => 'profile',
                'action'   => 'edit'
            ],
            [
                'role'     => 'accountant',
                'resource' => 'profile',
                'action'   => 'edit'
            ]
        ]
    ]
);
