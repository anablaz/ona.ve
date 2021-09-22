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
                    ->add('first_name', TextType::class, [
                        'label' => 'Ime',
                    ])
                    ->add('last_name', TextType::class, [
                        'label' => 'Priimek',
                    ])
                    ->add('email', EmailType::class, [
                        'label' => 'E-pošta',
                    ])
                    ->add('plainPassword', PasswordType::class, [
                        'label' => 'Geslo',
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
                    ->add('institution', TextType::class, [
                        'label' => 'Ustanova',
                    ])
                    ->add('phone', TelType::class, [
                        'label' => 'Telefonska številka',
                    ])
                    ->add('cv', TextareaType::class, [
                        'label' => 'Nekaj stavkov o meni',
                    ])
                    ->add('photo', FileType::class, [
                        'label' => 'Moja fotografija',
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
                    ->add('languages', TextType::class, [
                        'label' => 'Jeziki',
                    ])
                    ->add('keywords', TextType::class, [
                        'label' => 'Ključne besede',
                    ])
                    ->add('agreePrivacy', CheckboxType::class, [
                        'label' => 'Strinjam se s politiko zasebnosti.',
                            'mapped' => false,
                            'constraints' => [
                                new IsTrue([
                                    'message' => 'Strinjam se s politiko zasebnosti.',
                                ]),
                            ],
                        ])
                    ->add('agreeTerms', CheckboxType::class, [
                        'label' => 'Strinjam se s pogoji uporabe.',
                        'mapped' => false,
                        'constraints' => [
                            new IsTrue([
                                'message' => 'Strinjam se s pogoji uporabe.',
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
