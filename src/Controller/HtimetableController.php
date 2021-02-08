<?php

namespace App\Controller;

use App\Entity\Timetable;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class HtimetableController extends AbstractController
{
    /**
     * @Route("/horaires", name="timetable")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $timetables = $this->getDoctrine()
            ->getRepository(Timetable::class)
            ->findAll();


        $form = $this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // create mail
            $email = (new TemplatedEmail())
                ->from($contact->get('Email')->getData())
                ->to(new Address('maoherve8@gmail.com'))
                ->subject('Commande client.')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'Demande' => $contact->get('Demande')->getData(),
                    'Numero' => $contact->get('Numero')->getData(),
                    'mail' => $contact->get('Email')->getData(),
                    'message' => $contact->get('Message')->getData()
                ]);
            // send mail
            $mailer->send($email);

            // Confirm and  redirect
            $this->addFlash('message', 'Votre e-mail a bien été envoyé');
            return $this->redirectToRoute('timetable');
        }

        return $this->render('Htimetable/index.html.twig', [
            'timetables' => $timetables,
            'form' => $form->createView(),
            ])
        ;
    }
}
