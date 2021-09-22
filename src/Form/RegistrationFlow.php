<?php

namespace App\Form;

class RegistrationFlow extends \Craue\FormFlowBundle\Form\FormFlow
{
    protected function loadStepsConfig()
    {
        return [
            [
                'label' => 'Korak 1',
                'form_type' => RegistrationFormType::class,
            ],
            [
                'label' => 'Korak 2',
                'form_type' => RegistrationFormType::class,
            ],
            [
                'label' => 'Korak 3',
                'form_type' => RegistrationFormType::class,
            ]
        ];
    }
}