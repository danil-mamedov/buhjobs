<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
    public function beforeExecuteRoute(Dispatcher $dispatcher) 
    {
        $controllerName = $dispatcher->getControllerName();
        $actionName = $dispatcher->getActionName();

        $acl =$this->acl->getAcl();
        
        $access = $acl->isAllowed('accountant', 'profile', 'edit');
        // 
//                $dispatcher->forward([
//                    'controller' => 'index',
//                    'action' => 'index'
//                ]);
        
    }
}
