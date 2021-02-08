<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("/produits", name="products_")
 */
class HproductsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * show all the products
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $products = $this->getDoctrine()
            ->getRepository(Products::class)
            ->findAll();

        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();



        $form = $this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // We created mail
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
            // We send the mail
            $mailer->send($email);

            // confirm and redirect
            $this->addFlash('message', 'Votre e-mail a bien été envoyé');
            return $this->redirectToRoute('home');
        }


        return $this->render('hproducts/index.html.twig', [
            'products' => $products, 'categories' => $categories,
            'form' => $form->createView(),

        ]);
    }


    /**
     * @Route("/{categoryName}", name="show_category")
     * @param string $categoryName
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * show products by category
     */
    public function showByCategory(string $categoryName, Request $request, MailerInterface $mailer):Response
    {
        $category = $this->getDoctrine()->getRepository(Categories::class)
            ->findOneBy(['name' => $categoryName]);
        $products = $this->getDoctrine()->getRepository(Products::class)
            ->findBy(['categories' => $category],['id'=>'DESC']);


        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
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
                    'Mail' => $contact->get('Email')->getData(),
                    'Message' => $contact->get('Message')->getData()
                ]);
            // send mail
            $mailer->send($email);

            // confirm and redirect
            $this->addFlash('message', 'Votre e-mail a bien été envoyé');
            return $this->redirectToRoute('home');
        }

        return $this->render("hproducts/category.html.twig",
            ['products' => $products,
                'categories' => $categories,
                'form' => $form->createView(),
            ]);
    }
}
