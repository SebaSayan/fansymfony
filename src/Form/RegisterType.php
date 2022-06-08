<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre prénom', 'title' => 'Prénom avec un minim
        un de 3 caractères et au maximum 20 caractères']])
            ->add('lastName', TextType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre nom', 'title' => 'Nom avec un minim
            un de 3 caractères et au maximum 20 caractères']])
            ->add('email', EmailType::class, ['attr' => ['class' => 'p-3']])
            // ->add('roles')
            ->add('password', PasswordType::class, ['attr' => ['class' => 'p-3']])
            ->add('password_confirm', PasswordType::class, ['attr' => ['class' => 'p-3']])
            ->add('submit', SubmitType::class, ['label' => 'S\'inscrire', 'attr' => ['class' => 'col-2 btn btn-dark']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}