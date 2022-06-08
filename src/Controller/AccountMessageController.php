<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Message;
use App\Form\MessageType;
use App\Services\ServiceMail;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountMessageController extends AbstractController
{
    /**
     * @Route("/compte/message", name="account_message")
     */
    public function index(MessageRepository $repo): Response
    {
        $message = $repo->findAll();

        return $this->render('account/message.html.twig', [
            'message' => $message,
        ]);
    }

    /**
     * @Route("/compte/repondre/{id}", name="account_message_reply")
     */
    public function reply(ServiceMail $mail, EntityManagerInterface $manager, Request $request, Message $messages): Response
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Envoi le mail de réponse au client
            $title = '<h1>Vous avez reçu une réponse de FAN\'COIFFURE</h1><br>';
            $content = $title . $message->getContent();
            $mail->sendMail($message->getEmail(), $message->getName(), $message->getSubject(), $content = trim(stripslashes(nl2br($content))));

            // Envoi une copie du mail à l'admin
            $titleAdmin = '<h1>Copie de votre réponse</h1><br>';
            $contentAdmin = $titleAdmin . $message->getContent();
            $mail->sendMail($this->getParameter('webmaster_email'), $message->getName(), $message->getSubject(), $contentAdmin = trim(stripslashes(nl2br($contentAdmin))) . '<br><br>' . 'Email du client: ' . $message->getEmail());

            $messages->setAnswered(1);
            $manager->flush();

            $this->addFlash(
                'success',
                "Le message a été envoyé avec succés"
            );
            return $this->redirectToRoute('account_message');
        }


        return $this->render('account/reply.html.twig', [
            'form' => $form->createView(),
            'message' => $messages,


        ]);
    }

    /**
     * @Route("/compte/supprimer-un-message/{id}", name="account_message_delete")
     */
    public function delete(EntityManagerInterface $manager, Message $message): Response
    {
        $manager->remove($message);
        $manager->flush();

        $this->addFlash(
            'success',
            "Le message a bien été supprimée"
        );
        return $this->redirectToRoute('account_message');
    }

    /**
     * @Route("/compte/nouveau_message", name="account_new_message")
     */
    public function new(ServiceMail $mail, EntityManagerInterface $manager, Request $request, UserInterface $user): Response
    {

        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Envoi le mail de réponse au client
            $title = '<h1>' . $user->getFirstName() . ' vous a envoyé un message </h1><br>';
            $content = $title . $message->getContent();
            $mail->sendMail($message->getEmail(), $message->getName(), $message->getSubject(), $content = trim(stripslashes(nl2br($content))));

            // Envoi une copie du mail à l'admin
            $titleAdmin = '<h1>Copie de votre message</h1><br>';
            $contentAdmin = $titleAdmin . $message->getContent();
            $mail->sendMail($this->getParameter('webmaster_email'), $message->getName(), $message->getSubject(), $contentAdmin = trim(stripslashes(nl2br($contentAdmin))) . '<br><br>' . 'Email du client: ' . $message->getEmail());

            $manager->flush();

            $this->addFlash(
                'success',
                "Le message a été envoyé avec succés, une copie vous sera envoyé par mail."
            );
            return $this->redirectToRoute('account_message');
        }


        return $this->render('account/new.html.twig', [
            'form' => $form->createView(),


        ]);
    }
}