<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Product;
use App\Form\MessageType;
use App\Services\ServiceMail;
use App\Repository\EventRepository;
use App\Repository\ProductRepository;
use App\Repository\CarouselRepository;
use App\Repository\HorairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TarifsHommeRepository;
use App\Repository\TarifsEnfantRepository;
use App\Repository\TarifsCoiffageRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TarifsTechniquesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CarouselRepository $repoCa, TarifsCoiffageRepository $repoTC, TarifsTechniquesRepository $repoTT, TarifsHommeRepository $repoTH, TarifsEnfantRepository $repoTE, EventRepository $repoEvent, ProductRepository $repoProduct, HorairesRepository $repoHoraires, EntityManagerInterface $manager, ServiceMail $mail, Request $request): Response
    {

        $carousel = $repoCa->findAll();
        $tarifsC = $repoTC->findAll();
        $tarifsT = $repoTT->findAll();
        $tarifsH = $repoTH->findAll();
        $tarifsE = $repoTE->findAll();
        $event = $repoEvent->findAll();
        $product = $repoProduct->findAll();
        $horaires = $repoHoraires->findAll();

        $message = new Message();
        $message->setCreatedAt(new \DateTime());
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $message->setAnswered(0);
            $manager->persist($message);
            $manager->flush();

            // Envoie le mail aux admins
            $title = '<h1>Formulaire de contact</h1><br>';
            $content = trim(stripslashes(nl2br($title . 'Bonjour, voici le message qui vous a été envoyé.<br><br><br>' .
                'Sujet : ' . $message->getSubject() . '<br><br>' . $message->getContent() . '<br><br>' . 'Nom : ' . $message->getName() . '<br>' . 'Email : ' . $message->getEmail())));
            $mail->sendMail($this->getParameter('webmaster_email'), $message->getName(), "Message du formulaire", $content = trim(stripslashes(nl2br($content))));

            // Envoie le mail accusé de réception au client
            $titleUser = '<h1>Votre message a bien été envoyé</h1><br>';
            $contentUser = trim(stripslashes(nl2br($titleUser . 'Bonjour ' . $message->getName() . ' ceci est un accusé de réception, merci de ne pas répondre<br><br><br>
            Voici le message que vous avez envoyé :<br><br>' . 'Sujet : ' . $message->getSubject() . '<br><br>' . $message->getContent())));
            $mail->sendMail($message->getEmail(), $message->getName(), "FAN'COIFFURE - Contact", $contentUser = trim(stripslashes(nl2br($contentUser))));

            $this->addFlash(
                'success',
                'Le message a bien été envoyé, vous allez recevoir un mail de confirmation.'
            );

            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'carousel' => $carousel,
            'tarifsCoiffage' => $tarifsC,
            'tarifsTechniques' => $tarifsT,
            'tarifsHomme' => $tarifsH,
            'tarifsEnfant' => $tarifsE,
            'event' => $event,
            'product' => $product,
            'horaires' => $horaires,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/instagram", name="instagram")
     */
    public function show(): Response
    {

        return $this->render('home/instagram.html.twig', []);
    }

    /**
     * @Route("/mentions_legales", name="mentionslegales")
     */
    public function mentionslegales(): Response
    {

        return $this->render('home/mentionslegales.html.twig', []);
    }

    /**
     * @Route("/rgpd", name="rgpd")
     */
    public function rgpd(): Response
    {

        return $this->render('home/rgpd.html.twig', []);
    }

    /**
     * @Route("/product/{slug}", name="show_product")
     */
    public function product(Product $product): Response
    {

        return $this->render('home/show_product.html.twig', [
            'product' => $product
        ]);
    }
}