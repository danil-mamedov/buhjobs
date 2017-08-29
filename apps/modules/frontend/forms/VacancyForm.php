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
        $field = new Select('published_status_id', [
            0 => 'Да, опубликовать',
            1 => 'Нет, скрыть'
        ]);
        
        $field->addValidators([
            new Between([
                "minimum" => '0',
                "maximum" => '1',
                "message" => 'Не верно указан статус публикации',
            ])
        ]); 
        
        $this->add($field);
    }
    
    private function setDescription()
    {
        $field = new TextArea('description', [
            'placeholder' => 'Укажите опиание вакансии',
            'rows'        => 10,
            'cols'        => 50,
        ]);        
        $field->addValidators([
            new PresenceOf([
                'message' => 'Описание вакансии обязательно к заполнению',
            ])
        ]);        
        $field->setLabel('Описание');        
        $this->add($field);
    }

    private function setTitleField()
    {
        $field = new Text('title', [
            'placeholder' => 'Название вакансии, например Главный бухгалтер',
        ]);

        $field->addValidators([
            new PresenceOf([
                'message' => 'Название вакансии обязательно к заполнению',
            ]),
            new StringLength([
                'max'            => 150,
                'messageMaximum' => 'Слишком длинное название акансии',
                'min'            => 3,
                'messageMinimum' => 'Слишком короткое название акансии',
            ])            
        ]);  
        
        $field->setLabel('Название');     
        
        $this->add($field);
    }

    private function setSalaryField()
    {
        $field = new Numeric('salary', [
            'placeholder' => 'в грн',
        ]);

        $field->addValidators([
            new PresenceOf([
                'message' => 'Заработная плата обязательно к заполнению',
            ]),
            new Numericality([
                'message' => 'Не верный формат числа',
            ]),
            new StringLength([
                'max'            => 50,
                'messageMaximum' => 'Слишком длинное ЗП',
                'min'            => 1,
                'messageMinimum' => 'Слишком короткое ЗП',
            ])
        ]);
        $field->setLabel('ЗП');  
        $this->add($field);
    }
}