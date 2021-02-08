<?php

namespace App\Controller;

use App\Entity\Carousel;
use App\Entity\HomeTexte;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * homepage of the site
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $carousel = $this->getDoctrine()
            ->getRepository(Carousel::class)
            ->findAll();

        $homeTexte = $this->getDoctrine()
            ->getRepository(HomeTexte::class)
            ->findAll();


        $form = $this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // created mail
            $email = (new TemplatedEmail())
                ->from($contact->get('Email')->getData())
                ->to(new Address('maoherve8@gmail.com'))
                ->subject('Commande client.')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'Demande' => $contact->get('Demande')->getData(),
                    'Numero' => $contact->get('Numero')->getData(),
                    'Mail' => $contact->get('Email')->getData(),
                    'Message' => $contact->get('Message')->getData()
                ]);
            //send mail
            $mailer->send($email);

            // confirm and redirect
            $this->addFlash('message', 'Votre e-mail a bien été envoyé');
            return $this->redirectToRoute('home');
        }

            return $this->render('home/index.html.twig', [
            'carousel' => $carousel,
            'homeTexte' => $homeTexte,
            'form' => $form->createView(),
        ]);
    }
}
