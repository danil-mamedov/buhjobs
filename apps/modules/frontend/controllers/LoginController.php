<?php

namespace Multiple\Frontend\Controllers;

class LoginController extends ControllerBase
{   
    public function formAction()
    {
        if($this->session->has('auth_id')) {
            $this->response->redirect('/my/profile/');
        }
    }
    
    public function loginAction()
    {       
        $auth = $this->auth->login($this->request->getPost());
        
        if(!$auth) {
            $this->view->status = 'Логин или пароль не верный';
        }

        $this->dispatcher->forward([
            'controller' => 'login',
            'action'     => 'form',
        ]);
    }

    public function logoutAction()
    {
        $this->auth->logout();        
        $this->response->redirect('/');
    }
}
