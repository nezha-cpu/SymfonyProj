<?php

namespace App\Form;

use App\Entity\Pay;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FullName',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Full Name"
                ]
            ])
            ->add('Email',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Email"
                ]
            ])
            ->add('Address',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Address"
                ]
            ])
            ->add('city',TextType::class , [
                'attr'=>[
                    'placeholder'=>"City"
                ]
            ])
            ->add('nameC',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Name on card"
                ]
            ])
            ->add('CN',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Card number"
                ]
            ])
            ->add('ExpM',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Exp month"
                ]
            ])
            ->add('ExpY',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Exp year"
                ]
            ])
            ->add('CVV',TextType::class , [
                'attr'=>[
                    'placeholder'=>"Card Verification Value"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pay::class,
        ]);
    }
}
