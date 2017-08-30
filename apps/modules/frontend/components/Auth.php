<?php

namespace Multiple\Frontend\Components;

use Phalcon\Mvc\User\Component;
use Multiple\Frontend\Models\Users;
use Multiple\Frontend\Models\LoginLogs;

class Auth extends Component
{   
    /** 
     * @var string 
     */
    CONST ALIAS = 'auth';
    
    /** 
     * Login user in system 
     * @param array $params
     * @return bool
     */
    public function login(array $params = [])
    {
        if(!isset($params['email']) || !isset($params['password'])) {
            return false;
        }
        $loginLogs = new LoginLogs();
        $user = Users::findFirstByEmail($params['email']);
        echo $this->request->getClientAddress(); exit();
        if($user) {
            if($this->security->checkHash($params['password'] . $user->salt, $user->password)) {                
                $this->session->set(self::ALIAS, [
                    'id'   => $user->id,
                    'name' => $user->name,
                    'role' => 'Guest'
                ]);  
                $loginLogs->saveSuccessLogin($user->id);
                return true;
            } else {
                $loginLogs->saveFieldLogin($user->id, 'Field password');
                return false;
            }
        } else {
            $loginLogs->saveFieldLogin();
            return false;
        }        
    }
   
    public function logout()
    {
        $this->session->destroy(); 
    }
    
    public function id()
    {
        $data = $this->session->get(self::ALIAS);
        return $data['id'];
    }
    
    public function check()
    {
        return $this->session->has(self::ALIAS);
    }

    public function role()
    {
        $data = $this->session->get(self::ALIAS);
        return $data['role'];
    }
}