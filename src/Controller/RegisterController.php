<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Services\ServiceMail;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, EntityManagerInterface $manager, ServiceMail $mail): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                $user->getPassword()
            ));

            $user->setActive(0);
            $manager->persist($user);
            $manager->flush();
            $token = sha1($user->getEmail());
            $wlc = '<h1>Bienvenue sur FAN\'COIFFURE</h1><br>';
            $content = $wlc . 'Bonjour ' . $user->getFirstName() . ', votre inscription à bien été enregistré.
            <br>
            Pour activer votre compte veuillez cliquer sur le lien ci-dessous
            <br><br>
            <button><a href="https://' . $_SERVER['HTTP_HOST'] . '/inscription/' . $user->getEmail() . '/' . $token . '">https://' . $_SERVER['HTTP_HOST'] . '/inscription/' . $user->getEmail() . '/' . $token . '</a></button>
            ';
            $mail->sendMail($user->getEmail(), $user->getFirstName(), "Inscription FAN'COIFFURE", $content);

            $this->addFlash(
                'success',
                'Le compte de ' . $user->getFirstName() . ' ' . $user->getLastName() . ' a été créé avec succès!'

            );

            return $this->redirectToRoute('home');
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/inscription/{email}/{token}", name="activation_compte")
     */
    public function activation_compte(EntityManagerInterface $manager, User $user, $token): Response
    {

        $token_verif = sha1($user->getEmail());

        if ($token_verif == $token) {


            $user->setActive(1);

            $manager->flush();

            $this->addFlash(
                'success',
                'Le compte est activé avec succès'
            );

            return $this->redirectToRoute('login');
        } else {

            $this->addFlash(
                'danger',
                'le lien d\'activation est incorrect'
            );
            return $this->redirectToRoute('home');
        }
    }
}