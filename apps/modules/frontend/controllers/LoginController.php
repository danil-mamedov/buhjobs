<?php

namespace Multiple\Frontend\Controllers;

use \Multiple\Frontend\Models\Users as Users;

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
        $user = Users::findFirstByEmail(
            $this->request->getPost('email')
        );
        
        if($user && $this->security->checkHash($this->request->getPost('password') . $user->salt, $user->password)) {
            $this->session->set('auth_id', $user->id);
        } else {
            $this->view->status = 'Логин или пароль не верный';
        }

        $this->dispatcher->forward([
            'controller' => 'login',
            'action'     => 'form',
        ]);
    }

    public function logoutAction()
    {
        $this->session->destroy();        
        $this->response->redirect('/');
    }
}
