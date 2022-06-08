<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResetPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('newPassword', PasswordType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Nouveau Mot de passe']])
            ->add('confirmNewPassword', PasswordType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Confirmation Nouveau Mot de passe']])
            ->add('submit', SubmitType::class, ['label' => "Modifier le mot de passe", 'attr' => ['class' => 'btn btn-dark']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}