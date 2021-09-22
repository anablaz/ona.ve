<?php

namespace App\Form;

use Craue\FormFlowBundle\Form\FormFlow;

class RegistrationFlow extends FormFlow
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