<?php

namespace Multiple\Frontend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\Between;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;


class VacancyForm extends Form
{       
    public function initialize()
    {        
        $this->setTitleField();       
        $this->setSalaryField();
        $this->setDescription();
        $this->setPublishedStatusId();
    } 

    
    private function setPublishedStatusId()
    {
        $field = new Select('published_status_id', 
            [
                0 => 'Да, опубликовать',
                1 => 'Нет, скрыть'
            ]
        );
        
        $field->addValidator(new Between(
            [
                "minimum" => '0',
                "maximum" => '1',
                "message" => 'Не верно указан статус публикации',
            ]
        )); 
        
        $this->add($field);
    }
    
    private function setDescription()
    {
        $field = new TextArea('description', [
            'placeholder' => 'Укажите опиание вакансии',
            'required'    => true,
            'rows'        => 10,
            'cols'        => 50,
            'resize'      => 'none'
        ]);
        
        $field->addValidator(new PresenceOf(
            [
                'message' => 'Описание вакансии обязательно к заполнению',
            ]
        ));
        
        $this->add($field);
    }
    
    private function setTitleField()
    {
        $field = new Text('title', [
            'maxlength'   => 150,
            'minlength'   => 3,
            'placeholder' => 'Название вакансии, например Главный бухгалтер',
            'required'    => true
        ]);

        $field->addValidator(new PresenceOf(
            [
                'message' => 'Название вакансии обязательно к заполнению',
            ]
        ));
        
        $field->addValidator(new StringLength(
            [
                'max'            => 150,
                'messageMaximum' => 'Слишком длинное название акансии',
                'min'            => 3,
                'messageMinimum' => 'Слишком короткое название акансии',
            ]
        ));

        $this->add($field);
    }
    
    private function setSalaryField()
    {
        $field = new Numeric('salary', [
            'maxlength'   => 50,
            'minlength'   => 1,
            'placeholder' => 'ЗП в грн.',
            'required'    => true
        ]);

        $field->addValidator(new PresenceOf(
            [
                'message' => 'ЗП обязательно к заполнению',
            ]
        ));
        
        $field->addValidator(new Numericality(
            [
                'message' => 'не верный формат числа',
            ]
        ));

        $field->addValidator(new StringLength(
            [
                'max'            => 50,
                'messageMaximum' => 'Слишком длинное ЗП',
                'min'            => 1,
                'messageMinimum' => 'Слишком короткое ЗП',
            ]
        ));

        $this->add($field);
    }
    
    
    
}