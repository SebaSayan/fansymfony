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

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => false,
                'disabled' => true,
                'attr' => [
                    'class' => 'p-3',
                ]
            ])
            //->add('roles')
            ->add('firstName', TextType::class, [
                'label' => false,
                'disabled' => true,
                'attr' => [
                    'class' => 'p-3',
                ]
            ])
            ->add('lastName', TextType::class, [
                'label' => false,
                'disabled' => true,
                'attr' => [
                    'class' => 'p-3',
                ]
            ])
            ->add('oldPassword', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'p-3',
                    'placeholder' => 'Mon mot de passe actuel'
                ]
            ])
            ->add('newPassword', PasswordType::class,  [
                'label' => false,
                'attr' => [
                    'class' => 'p-3',
                    'placeholder' => "Nouveau mot de passe"
                ]
            ])
            ->add('confirmNewPassword', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'p-3',
                    'placeholder' => "Confirmation nouveau mot de passe"
                ]
            ])
            ->add('submit', SubmitType::class, ['label' => 'Modifier le mot de passe', 'attr' => ['class' => 'btn btn-dark']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}