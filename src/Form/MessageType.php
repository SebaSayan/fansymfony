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
            ->add('name', TextType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre nom', 'title' => 'Vous devez renseignez un nom']])
            ->add('email', EmailType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre email', 'title' => 'Vous devez renseignez un email']])
            ->add('subject', TextType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Le sujet', 'title' => 'Vous devez renseignez un sujet']])
            ->add('content', TextareaType::class, ['label' => false, 'attr' => ['class' => 'p-3', 'placeholder' => 'Votre message', 'title' => 'Vous devez insérer un message']])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer', 'attr' => ['class' => 'btn btn-dark']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}