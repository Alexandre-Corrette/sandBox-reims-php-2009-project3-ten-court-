<?php

namespace App\Form;

use App\Entity\TennisCourt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TennisCourtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('courtName', TextType::class, [
                'label' => 'Nom du court',
                'attr' => [
                    'placeholder' => 'ex: Central',
                    ]                
                ]
            )
            ->add('groundType', ChoiceType::class, [
                'label' => 'Type de terrain',
                'choices' => ['Terre battue extérieur' => 'Terre battue extérieur',
                'Terre battue intérieur' => 'Terre battue intérieur',
                'moquette intérieur' => 'moquette intérieur',
                'gazon' => 'gazon',
                'Dur extérieur' => 'Dur extérieur',
                'Dur intérieur' => 'Dur intérieur',
                ]
            ]
            )
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'attr' => ['placeholder' => 'Ex: rue de la Paix'],
            ]
            )
            ->add('zipcode', TextType::class, [
                'label' => 'Code Postal',
                'attr' => ['placeholder' => 'Ex: 75016']
            ]
            )
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => ['placeholder' => 'Ex: Paris']
            ]
            )
            ->add('availableDate',DateType::class, [
                'label' => 'Réservation disponible le : ',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('startBookingHour', TimeType::class, [
                'label' => 'Heure de début',
                'widget' => 'single_text',
                ]
            )
            ->add('endBookingHour', TimeType::class, [
                'label' => 'Heure de début',
                'widget' => 'single_text',
                ]
            )
            ->add('isAvailable', CheckboxType::class, [
                'label'    => 'Terrain disponible',
                'required' => false,
            ])
            ->add('owner',TextType::class, [
                'label' => 'propriétaire',
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TennisCourt::class,
        ]);
    }
}
