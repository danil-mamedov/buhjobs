<?php

namespace Multiple\Frontend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Multiple\Frontend\Models\Users;
use Phalcon\Validation\Validator\Email as EmailValidation;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;


class RegistrationForm extends Form
{
    public function initialize()
    {
        $this->setNameField();         
        $this->setPhoneField();
        $this->setPasswordField();   
        $this->setСonfirmPasswordField();
        $this->setRadioUser();
        $this->setRadioCompany();
        $this->setEmailField();
        $this->setBtn();
    }

    private function setNameField()
    {
        $field = new Text('name', [
            'placeholder' => 'Укажите ваше имя'
        ]);

        $field->addValidators([
            new PresenceOf([
                'message' => 'Имя обязательно к заполнению',
            ]),
            new StringLength([
                'min'            => 2,
                'messageMinimum' => 'Слишком короткое имя',
                'max'            => 64,
                'messageMaximum' => 'Слишком длиное имя',
            ])
        ]);

        $field->setLabel('Имя');
        
        $this->add($field);
    }

    private function setPhoneField()
    {
        $field = new Text('phone', [
            'placeholder' => '380',
        ]);

        $field->addValidators([
            new PresenceOf([
                'message' => 'Номер телефона обяательный к заполнению',
            ]),
            new Regex([
                'message'    => 'Не верный формат мобильного номера телефона',
                'pattern'    => '/^\s*380[0-9]{9}$/',
                'allowEmpty' => false,
            ]),
            new Uniqueness([
                "model"   => new Users(),
                "message" => "Такой телефон уже зарегистирован в системе",
                "convert" => function (array $values) {
                    $values["phone"] = trim((strtolower($values["phone"])));
                    return $values;
                }
            ])                    
        ]);

        $field->setLabel('Телефон');    
            
        $this->add($field);
    }
    
    private function setEmailField()
    {
        $field = new Email('email', [
            'placeholder' => 'Укажите Email',
        ]);
        
        $field->addValidators([
            new Uniqueness([
                "model"   => new Users(),
                "message" => "Такой Email уже зарегистирован в системе",
                "convert" => function (array $values) {
                    $values["email"] = trim((strtolower($values["email"])));
                    return $values;
                }
            ]),
            new PresenceOf([
                'message' => 'Email обязательно к заполнению',
            ]),  
            new EmailValidation([
                'message' => 'Email не верного формата',
            ]),
            new StringLength([
                'min'            => 5,
                'messageMinimum' => 'Слишком короткий Email',
                'max'            => 64,
                'messageMaximum' => 'Слишком длиный Email',
            ])                    
        ]);
            
        $field->setLabel('Email');   
        
        $this->add($field);
    }
    
    private function setPasswordField()
    {
        $field = new Password('password', [
            'placeholder' => 'Придумайте пароль',
        ]);

        $field->addValidators([
            new PresenceOf([
                'message' => 'Пароль обязательный к заполнению',
            ]),
            new StringLength([
                'min'            => 5,
                'messageMinimum' => 'Слишком короткий пароль',
                'max'            => 64,
                'messageMaximum' => 'Слишком длиный пароль',
            ]),
            new Confirmation([
                "message" => "Пароль не соответствует подтверждению",
                "with"    => "confirmPassword",
            ])            
        ]);
        
        $field->setLabel('Пароль'); 

        $this->add($field);
    }
    
    private function setСonfirmPasswordField()
    {
        $field = new Password('confirmPassword', [
            //'maxlength'   => 64,
           // 'minlength'   => 5,
            'placeholder' => 'Повторите пароль',
           // 'required'    => true
        ]);

        $field->addValidators([
            new PresenceOf([
                'message' => 'Пароль обязательный к заполнению',
            ]),
            new StringLength([
                'min'            => 5,
                'messageMinimum' => 'Слишком короткий пароль',
                'max'            => 64,
                'messageMaximum' => 'Слишком длиный пароль',
            ])            
        ]);

        $field->setLabel('Пароль ещё раз'); 
        
        $this->add($field);
    }
    
    private function setRadioUser()
    {
        $field = new Radio('radio_accountant', [
            'name'    => 'type_id',
            'value'   => 1,
            'checked' => 'checked'
        ]);
        
        $field->setLabel('Я бухгалтер — ищу предложения по работе');
        
        $this->add($field);
    }
    
    private function setRadioCompany()
    {
        $field = new Radio('radio_company', [
            'name'    => 'type_id',
            'value'   => 2
        ]);
        
        $field->setLabel('Я работодатель — ищу бухгалтера');
        
        $this->add($field);
    }

    private function setBtn()
    {
        $this->add(new Submit('btn', [
            'class' => 'btn btn-success',
            'value' => 'Зарегистироватся'
        ]));
    }

    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}