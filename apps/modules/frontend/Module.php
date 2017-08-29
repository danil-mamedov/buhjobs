<?php

namespace Multiple\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\Url;
use Phalcon\Security;
use Phalcon\Security\Random;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Http\Request;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as Volt;
use Phalcon\Forms\Manager as FormsManager;
use Multiple\Frontend\Components\Auth;


class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [
                'Multiple\Frontend\Controllers' => __DIR__ . "/controllers/",
                'Multiple\Frontend\Models'      => __DIR__ . "/models/",
                'Multiple\Frontend\Validations' => __DIR__ . "/validations/",
                'Multiple\Frontend\Forms'       => __DIR__ . "/forms/",
                'Multiple\Frontend\Libraries'   => __DIR__ . "/libraries/",
                'Multiple\Frontend\Plugins'     => __DIR__ . "/plugins/",
                'Multiple\Frontend\Components'  => __DIR__ . "/components/",
            ]
        );

        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {
        $config = include __DIR__ . "/config/config.php";
        
        $di->set('dispatcher', function() {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace("Multiple\Frontend\Controllers\\");
            return $dispatcher;
        });

        $di->set('flash', function () {
            return new FlashDirect([
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]);
        });

        $di->set('flashSession',function () {
                return new FlashSession([
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]);
        });
        
        $di->set('request', function() {
            return new Request();
        });
        
        $di->set('auth', function() {
            return new Auth();
        });
        
        $di->set('view', function() {
            $view = new View();
            $view->setViewsDir(__DIR__ . "/views/");
            $view->registerEngines([
                '.volt' => function ($view, $di) {
                    $volt = new Volt($view, $di);
                    $volt->setOptions([
                        'compiledPath'      => __DIR__ . '/views/compiled-templates/',
                        'compiledExtension' => '.compiled',
                        'compiledSeparator' => '_'
                    ]);
                    return $volt;
                }
            ]);         
            return $view;
        });
        
        $di->set('forms', function () {
            return new FormsManager();
        });
        
        $di->set('session', function () {
            $session = new Session();
            $session->start();
            return $session;
        });	

        $di->set('url', function () {
            $url = new Url();
            $url->setBaseUri('/');
            return $url;
        });
            
        $di->set('security', function () {
            return new Security();
        });
            
        $di->set('random', function () {
            return new Random();
        });
 
        $di->set('response', function () {
            return new Response();
        });	
        
        $di->set('db', function () use ($config) {
            return new Response();
        });

        $di->set('db', function () use ($config) {
            return new DbAdapter([
                "host"     => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname"   => $config->database->name,
            ]);
        });
    }
}
