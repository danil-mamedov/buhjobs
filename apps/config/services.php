<?php

use Phalcon\DI\FactoryDefault;

//use Phalcon\Mvc\Url as UrlResolver;
//use Phalcon\Session\Adapter\Files as SessionAdapter;

$di = new FactoryDefault();

$di->set('router', function () {    
    return require_once 'routers.php';
});


//$di["url"] = function () {
//    $url = new UrlResolver();
//    $url->setBaseUri("/mvc/multiple-volt/");
//    return $url;
//};

//$di["session"] = function () {
//    $session = new SessionAdapter();
//    $session->start();
//    return $session;
//};
