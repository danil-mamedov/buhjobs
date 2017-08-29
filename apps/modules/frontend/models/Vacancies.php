<?php

namespace Multiple\Frontend\Models;

class Vacancies extends \Phalcon\Mvc\Model
{   
    public function getSource()
    {
        return 'vacancies';
    }

    public function view($id)
    {
        return $this->modelsManager->createBuilder()
            ->columns('
                v.id          as vacancy_id, 
                v.title       as title, 
                v.description as description,
                v.salary      as salary,
                v.date_create as date_create,
                v.view        as view,
                CONCAT_WS(" ", u.surname, u.name, u.middle_name) as user
            ')
            ->from(['v' => 'Multiple\Frontend\Models\Vacancies'])
            ->leftJoin('Multiple\Frontend\Models\Users', 'u.id = v.user_create_id', 'u')
            ->where('v.id = :id:', ['id' => $id])
            ->getQuery()
        ->getSingleResult();
    }
    
    public static function getAll()
    {
        return self::find();        
    }
    
}







