<?php

namespace Multiple\Frontend\Components;

use Phalcon\Mvc\User\Component;

class Auth extends Component
{   
    public function id()
    {
        return $this->session->get('auth_id');
    }
    
    public function check()
    {
        return $this->session->has('auth_id');
    }
    
    public function set($name = null, $param = null)
    {
        $this->session->set($name, $param);
    }
  
}