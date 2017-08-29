<?php

namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Users;
use Multiple\Frontend\Forms\RegistrationForm;
use Multiple\Frontend\Forms\ConfirmRegistrationForm;

class RegistrationController extends ControllerBase
{
    public function beforeExecuteRoute()
    {
        if($this->session->has('auth_id')) {
            $this->response->redirect('/my/profile/');
            return false;
        }        
    }

    public function formAction()
    {
        $this->view->registration = new RegistrationForm();   
    }

    public function confirmFormAction()
    {
        $this->view->registration = new ConfirmRegistrationForm();        
    }
  
    public function registrationAction()
    {     
        $form = new RegistrationForm();        
        $form->bind($this->request->getPost(), null); 
        
        if (!$form->isValid()) {            
            $this->view->errors = $form->getMessages();               
        } 
        else {
            $params             = $this->request->getPost();
            $params['salt']     = $this->security->getSaltBytes();
            $params['password'] = $this->security->hash($params['password'] . $params['salt']); 
            $user = Users::createUser($params);
            $this->session->set('auth_id', $user->id);      
        }  
        
        $this->dispatcher->forward([
            "controller" => "registration",
            "action"     => "form",
        ]);
    }
}
