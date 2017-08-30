<?php

namespace Multiple\Frontend\Models;

class LoginLogs extends \Phalcon\Mvc\Model
{   
    public function getSource()
    {
        return 'login_logs';
    }

    public function saveSuccessLogin($userId = null, $note = null)
    {
        if(!$userId) {
            return false;
        }
        
        $login = new self;
        
        $login->save([
            'user_id'    => $userId,
            'note'       => $note,
            'ip_address' => $this->request->getClientAddress()
        ]);
    }
    
    public function saveFieldLogin($userId = null, $note = null)
    {
        $login = new self;

        $login->save([
            'user_id'    => $userId,
            'status_id'  => 0,
            'note'       => $note,
            'ip_address' => $this->request->getClientAddress()
        ]);
        
        $this->sleepFieldLogin();
    }

    private function sleepFieldLogin()
    {
        $countLogins = self::count([
            'conditions' => '
                status_id = 0 
                AND ip_address = ?0 
                AND UNIX_TIMESTAMP(date) BETWEEN (UNIX_TIMESTAMP() - 300) AND UNIX_TIMESTAMP()
            ',
            'bind'       => [
                $this->request->getClientAddress()
            ]
        ]);
        
        if($countLogins > 10) {
            sleep(10);
        }        
    }
}