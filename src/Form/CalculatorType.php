<?php

/*
 * This file is a part of the simple emoji calculator for symfony learning app.
 *
 * Copyright (c) 2022-2023, AHAD NOOR ALAM <https://www.linkedin.com/in/ahadnoor/>
 */

namespace App\Form;

use App\DataMapper\CalculatorDataMapper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'operandA',
                NumberType::class,
                [
                    'attr' => ['class' => 'form-control'],
                    'label' => false,
                ]
            )
            ->add(
                'operandB',
                NumberType::class,
                [
                    'attr' => ['class' => 'form-control'],
                    'label' => false,
                ]
            )
        ->add(
            'add',
            SubmitType::class,
            [
                'label' => 'Add',
                'attr' => [
                    'class' => 'btn btn-outline-secondary',
                    'title' => 'Add',
                ],
            ]
        )
        ->add(
            'subtract',
            SubmitType::class,
            [
                'label' => 'Subtract',
                'attr' => [
                    'class' => 'btn btn-outline-secondary',
                    'title' => 'Subtract',
                ],
            ]
        )
        ->add(
            'divide',
            SubmitType::class,
            [
                'label' => 'Divide',
                'attr' => [
                    'class' => 'btn btn-outline-secondary',
                    'title' => 'Divide',
                ],
            ]
        )
        ->add(
            'multiply',
            SubmitType::class,
            [
            'label' => 'Multiply',
            'attr' => [
                'class' => 'btn btn-outline-secondary',
                'title' => 'Multiply',
            ],
        ]
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => CalculatorDataMapper::class,
                'attr' => [
                    'id' => 'calculator-form',
                    'novalidate' => 'novalidate',
                ],
            ]
        );
    }
}
