<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flow_step']) {
            case 1:
                $builder
                    ->add('first_name', TextType::class)
                    ->add('last_name', TextType::class)
                    ->add('email', EmailType::class)
                    ->add('plainPassword', PasswordType::class, [
                        'attr' => ['autocomplete' => 'new-password'],
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Please enter a password',
                            ]),
                            new Length([
                                'min' => 9,
                                'minMessage' => 'Your password should be at least {{ limit }} characters',
                                // max length allowed by Symfony for security reasons
                                'max' => 4096,
                            ]),
                        ],
                    ]);
                break;
            case 2:
                $builder
                    ->add('institution', TextType::class)
                    ->add('phone', TelType::class)
                    ->add('cv', TextareaType::class)
                    ->add('photo', FileType::class, [
                        'constraints' => [
                            new File([
                                'maxSize' => '1023k',
                                'mimeTypes' => [
                                    'image/jpeg', 'image/png', 'image/webp'
                                ],
                                'mimeTypesMessage' => 'Please, upload a valid format (.jpeg, .jpg, .png, .webp)',
                            ])
                        ]
                    ]);
                break;
            case 3:
                $builder
                    ->add('languages', TextType::class)
                    ->add('keywords', TextType::class)
                    ->add('agreePrivacy', CheckboxType::class, [
                            'mapped' => false,
                            'constraints' => [
                                new IsTrue([
                                    'message' => 'You should agree to our privacy policy.',
                                ]),
                            ],
                        ])
                    ->add('agreeTerms', CheckboxType::class, [
                        'mapped' => false,
                        'constraints' => [
                            new IsTrue([
                                'message' => 'You should agree to our terms and conditions.',
                            ]),
                        ],
                    ]);
                break;
        }


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
