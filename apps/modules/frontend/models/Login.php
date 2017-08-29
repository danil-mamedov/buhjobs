<?php

namespace Multiple\Frontend\Models;

class Login extends \Phalcon\Mvc\Model
{   
    public function getSource()
    {
        return 'users';
    }

    public function onConstruct()
    {

    }

    public function login(array $params = [])
    {
        $user = (new Users())->getUserByEmail($params['email']);  
    }
    
    
    

}