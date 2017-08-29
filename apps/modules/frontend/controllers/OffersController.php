<?php

namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Offers;

class OffersController extends ControllerBase
{
    public function beforeExecuteRoute()
    {
        if(!$this->session->has('auth_id')) {
            $this->response->redirect('/my/profile/');
            return false;
        }        
    }
    
    public function listAction()
    {
        $offers = Offers::findByToUserId(
            $this->session->get('auth_id')
        );
        
        $this->view->offers = $offers;   
    }
    
    public function viewAction($offerId)
    {
        $offer = Offers::findFirst([
            'conditions' => 'to_user_id = :user_id: AND id = :id:',
            'bind'       => [
                'user_id' => $this->session->get('auth_id'),
                'id'      => $offerId
            ]
        ]);
        
        $this->view->offer = $offer;   
    }
}
