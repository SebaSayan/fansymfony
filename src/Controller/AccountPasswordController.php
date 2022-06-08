<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AccountPasswordController extends AbstractController
{
    /**
     * @Route("/compte/modifier_motdepasse", name="account_password")
     */
    public function index(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$passwordHasher->isPasswordValid($user, $user->getOldPassword())) {
                $this->addFlash(
                    'danger',
                    "L'ancien mot de passe est incorrect"
                );
            } else {

                $newPassword = $user->getNewPassword();
                $pass_encoded = $passwordHasher->hashPassword($user, $newPassword);
                $user->setPassword($pass_encoded);

                $manager->persist($user);
                $manager->flush();

                $this->addFlash(
                    'Success',
                    "Votre mot de passe a bien été modifié"
                );
                return  $this->redirectToRoute('account');
            }
        }


        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}