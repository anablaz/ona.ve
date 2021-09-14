<?php

namespace App\Form;

class RegistrationFlow extends \Craue\FormFlowBundle\Form\FormFlow
{
    protected function loadStepsConfig()
    {
        return [
            [
                'label' => 'step1',
                'form_type' => RegistrationFormType::class,
            ],
            [
                'label' => 'step2',
                'form_type' => RegistrationFormType::class,
            ],
            [
                'label' => 'step3',
                'form_type' => RegistrationFormType::class,
            ]
        ];
    }
}