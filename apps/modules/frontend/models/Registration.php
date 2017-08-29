<?php

namespace Multiple\Frontend\Models;

class Registration extends \Phalcon\Mvc\Model
{   
    /** 
     * Method return model table name 
     * @param none
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    
}