<?php

namespace Multiple\Frontend\Forms;

use Multiple\Frontend\Models\Users;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Between;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Date as DateValidator;

class ProfileForm extends Form
{   
    
    public function initialize()
    {        
        $this->setNameField();         
        $this->setEmailField();
        $this->setSurnameField();
        $this->setMiddleNameField();
        $this->setDateBirthdayField();
        $this->setGender();
        $this->setPhoneField();
    } 

    
    private function setGender()
    {
        $field = new Select('gender', 
            [
                1 => 'Женский',
                2 => 'Мужской'
            ]
        );
        
        $field->addValidator(new Between(
            [
                "minimum" => '1',
                "maximum" => '2',
                "message" => 'Не верно указан пол',
            ]
        )); 
        
        $this->add($field);
    }

    private function setDateBirthdayField()
    {
        $field = new Date('date_birthday', 
            [
                'max'         => date('Y-m-d', strtotime('-18 years')),
                'min'         => '1970-01-01',
                'required'    => true
            ]
        );
        
        $field->addValidator(new DateValidator(
            [
                "format"  => 'Y-m-d',
                'message' => 'Не верный формат даты'
            ]
        )); 
        
        $field->addValidator(new Between(
            [
                "minimum" => '1980-01-01',
                "maximum" => date('Y-m-d', strtotime('-18 years')),
                "message" => "Дата рождения должна быть нормальной",
            ]
        )); 
        
        $this->add($field);
    }
    
    private function setNameField()
    {
        $field = new Text('name', [
            'maxlength'   => 64,
            'minlength'   => 2,
            'placeholder' => 'Укажите ваше имя',
            'required'    => true
        ]);

        $field->addValidator(new PresenceOf(
            [
                'message' => 'Имя обязательно к заполнению',
            ]
        ));

        $field->addValidator(new StringLength(
            [
                'min'            => 10,
                'messageMinimum' => 'Слишком короткое имя',
            ]
        ));
        
        $field->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($field);
    }
    
    private function setMiddleNameField()
    {
        $field = new Text('middle_name', [
            'maxlength'   => 64,
            'minlength'   => 2,
            'placeholder' => 'Укажите отчество'
        ]);

        $field->addValidator(new StringLength(
            [
                'allowEmpty'     => true,
                'min'            => 4,
                'messageMinimum' => 'Слишком короткая фамилия',
                'max'            => 64,
                'messageMaximum' => 'Слишком длиная фамилия',
            ]
        ));

        $field->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($field);
    }
    
    private function setSurnameField()
    {
        $field = new Text('surname', [
            'maxlength'   => 64,
            'minlength'   => 2,
            'placeholder' => 'Укажите фамилию',
        ]);

        $field->addValidator(new StringLength(
            [
                'min'            => 2,
                'messageMinimum' => 'Слишком короткая фамилия',
                'max'            => 64,
                'messageMaximum' => 'Слишком длиная фамилия',
                'allowEmpty'     => true,
            ]
        ));

        $field->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($field);
    }
    
    
    
    private function setEmailField()
    {
        $field = new Text('email', [
            'maxlength'   => 64,
            'minlength'   => 5,
            'placeholder' => 'Укажите Email',
            'type'        => 'email',
            'required'    => true
        ]);

        $field->addValidator(new PresenceOf(
            [
                'message' => 'Email обязательно к заполнению',
            ]
        ));
        
        $field->addValidator(new Email(
            [
                'message' => 'Email не верного формата',
            ]
        ));
        
        $field->setFilters(
            [
                "string",
                "trim",
            ]
        );
        
        $this->add($field);
    }
    
    private function setPhoneField()
    {
        $field = new Text('phone', [
            'maxlength'   => 12,
            'minlength'   => 12,
            'placeholder' => '380',
            'required'    => true
        ]);

        $field->addValidator(new PresenceOf(
            [
                'message' => 'Номер телефона обяательный к заполнению',
            ]
        ));
        
        $field->addValidator(new Regex(
            [
                'message'    => 'Не верный формат мобильного номера телефона',
                'pattern'    => '/^\s*380[0-9]{9}$/',
                'allowEmpty' => false,
            ]
        ));
        
        $field->addValidator(new Uniqueness(
            [
                "model"   => new Users(),
                "message" => "Такой телефон уже зарегистирован в системе",
                "convert" => function (array $values) {
                    $values["phone"] = trim((strtolower($values["phone"])));
                    return $values;
                }
            ]
        ));
        
        $this->add($field);
    }
    
    
}