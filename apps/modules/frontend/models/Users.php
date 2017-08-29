<?php

namespace Multiple\Frontend\Models;

class Users extends \Phalcon\Mvc\Model
{    
    public function getSource()
    {
        return 'users';
    }
    
    public function onConstruct()
    {

    }
    
    public function getUser() 
    {
        
    }
    
    /** 
     * Method create new user in system 
     * @param array $params
     * return bool|array
     */
    public static function createUser(array $params = [])
    {
        $user = new Users();
        
        $user->save($params, [
            'email',    
            'name', 
            'phone',
            'password', 
            'salt',
            'type_id'
        ]);
        
        return $user;
    } 
}