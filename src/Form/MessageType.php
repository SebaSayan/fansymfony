<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre nom', 'title' => 'Prénom avec un minim
        un de 3 caractères et au maximum 20 caractères']])
            ->add('email', EmailType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre email']])
            ->add('subject', TextType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Le sujet']])
            ->add('content', TextareaType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre message']])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer', 'attr' => ['class' => 'col-2 btn btn-dark']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}