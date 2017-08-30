<?php

namespace Multiple\Frontend\Components;

use Phalcon\Acl as AccessControlList;
use Phalcon\Acl\Adapter\Memory as AclMemory;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Mvc\User\Component;

class Acl extends Component
{   
    private $acl;
        
    public function getAcl()
    {        
        if(!$this->acl) {            
            $this->acl = new AclMemory();         
            $this->acl->setDefaultAction(AccessControlList::DENY);               
            foreach ($this->config->permissons as $permisson) {                
				$this->acl->addRole(new Role($permisson['role']));                
                $this->acl->addResource(new Resource($permisson['resource']), $permisson['action']);
                $this->acl->allow($permisson['role'], $permisson['resource'], $permisson['action']);
			}            
        }        
        return $this->acl;
    }
}