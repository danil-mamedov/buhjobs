<?php

namespace Multiple\Frontend\Controllers;


use Multiple\Frontend\Models\Vacancies;
use Multiple\Frontend\Forms\VacancyForm;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;

class VacanciesController extends ControllerBase
{
    // все вакансии
    //var_dump( $this->request->getQuery() ); exit();
    //$vacancies = Vacancies::find();
    //$this->view->vacancies = $vacancies;
    public function viewAction($id)
    {
        $vacancy = (new Vacancies())->view($id);
        
        if($vacancy) {
            $this->view->vacancy = $vacancy;
        } else {
            
        }
    }
    
    
    
    
    public function allAction($page)
    {
        $vacancies = Vacancies::getAll();

        $paginator = new PaginatorModel([
            'data'  => $vacancies,
            'limit' => 5,
            'page'  => $page,
        ]);

        $this->view->page = $paginator->getPaginate();
    }
    
    // список собственных вакансий
    public function listAction()
    {
        $vacancies = Vacancies::findByUserCreateId(
            $this->auth->id()
        );
        
        $this->view->vacancies = $vacancies;
    }
    
    // редактирование
    public function oneAction($id)
    {
        $vacancy = Vacancies::findFirstById($id);
        $form    = new VacancyForm();
        
        if(!$this->request->isPost()) {
            $form->setEntity($vacancy);
        }

        $this->view->vacancy = $vacancy;
        $this->view->form    = $form;
        
       // $this->flashSession->success('The post was correctly saved!');
    }
 
    public function deleteAction($id)
    {
        $vacancy = Vacancies::find([
            'conditions'  => 'user_create_id = :user_id: and id = :id:',
            'bind'        => [
                'user_id' => $this->auth->id(),
                'id'      => $id
            ]
        ]);
        
        if($vacancy) {
            $vacancy->update([
                'is_delete' => 1
            ]);
        }
        
        $this->response->redirect("my/vacancies/");
    }
    
    public function updateAction($id)
    {
        $vacancy = Vacancies::find([
            'conditions'  => 'user_create_id = :user_id: and id = :id:',
            'bind'        => [
                'user_id' => $this->auth->id(),
                'id'      => $id
            ]
        ]);
        
        $form = new VacancyForm();        
        $form->bind($this->request->getPost(), $vacancy);
        
        if($vacancy && $form->isValid()) {            
            $vacancy->update($this->request->getPost());
        } else {
            foreach($form->getMessages() as $message){
                $this->flashSession->error($message);
            }
            //$this->flashSession->success('The post was correctly saved!');
            //$this->view->errors = ;
        }
//        
//        $this->dispatcher->forward([
//            'controller' => 'vacancies',
//            'action'     => 'one',
//        ]);
        //
        $this->response->redirect("my/vacancies/{$id}/");
    }

    /** 
     * Action get create vacancies form 
     */
    public function formAction()
    {
        $form = new VacancyForm();        
        $this->view->form = $form;
    }
    
    public function addAction()
    {
        $vacancy = new Vacancies();
        $form    = new VacancyForm();       
        $form->bind($this->request->getPost(), $vacancy);        
        if(!$form->isValid()) {             
            $this->view->errors = $form->getMessages();             
            return $this->dispatcher->forward([
                "controller" => "vacancies",
                "action"     => "form",
            ]);
        } else {            
            $save = $this->request->getPost();
            $save['user_create_id'] = $this->session->get('auth_id');            
            $vacancy->save($save, [
                'title', 'salary', 'description', 'published_status_id', 'user_create_id'
            ]);
            $this->response->redirect("/my/vacancies/");
        }
    }
}
