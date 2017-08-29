<?php

namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Users;
use Multiple\Frontend\Forms\ProfileForm;

class ProfileController extends ControllerBase
{   
    public function beforeExecuteRoute()
    {
        if(!$this->session->has('auth_id')) {
            $this->response->redirect('/');
            return false;
        }
        
    }
    
    public function mainAction()
    {      
        
       //var_dump($this->auth->id());
       // var_dump($this->auth);
        //echo 1; exit();
        
      // echo $this->random->number(1000);
       //exit();
        
        
        $user = Users::findFirstById( $this->session->get('auth_id') );
        
        $form = new ProfileForm();
        
        if(!$this->request->isPost()) {
            $form->setEntity($user);
        }

        $this->view->setVars($user->toArray());
        $this->view->myform = $form;
        
        
    }
    // https://github.com/phalcon/cphalcon/issues/2001
    public function updateAction()
    {        
        $user = Users::findFirstById(
            $this->session->get('auth_id')
        );
        
        $form = new ProfileForm();        
        $form->bind($this->request->getPost(), $user);
        
        if (!$form->isValid()) {
            $this->view->errors = $form->getMessages();
        } else {
            $user->save(
                $this->request->getPost(), 
                [
                    'email',
                    'name'
                ]
            );
        }

        $this->dispatcher->forward([
            "controller" => "profile",
            "action"     => "main",
        ]);
    }
}
