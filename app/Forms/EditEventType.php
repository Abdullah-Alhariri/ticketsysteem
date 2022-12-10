<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class EditEventType extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT,[
                'required' => true,
                'label' => 'Naam',
                'value' => $this->data['name']
            ])
            ->add('start_date', Field::DATE,[
                'required' => true,
                'label' => 'Start datum',
                'value' => $this->data['start_date']
            ])
            ->add('end_date', Field::DATE,[
                'required' => true,
                'label' => 'Eind datum',
                'value' => $this->data['end_date']
            ])
            ->add('available_tickets', Field::NUMBER,[
                'required' => true,
                'label' => 'Beschikbare tickets',
                'value' => $this->data['tickets']
            ])
            ->add('price', Field::NUMBER,[
                'required' => true,
                'label' => 'Prijs',
                'value' => $this->data['price']
            ])
            ->add('location', Field::TEXT,[
                'required' => true,
                'label' => 'Locatie',
                'value' => $this->data['location']
            ])
            ->add('description', Field::TEXTAREA, [
                'required' => true,
                'label' => 'Omschrijving',
                'value' => $this->data['description']
            ])
            ->add('Aanmaken', Field::BUTTON_SUBMIT, [
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ]);
    }
}
