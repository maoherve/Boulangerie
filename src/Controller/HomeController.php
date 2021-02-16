<?php

namespace App\Controller;

use App\Entity\Carousel;
use App\Entity\HomeTexte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * homepage of the site
     * @return Response
     */
    public function index(): Response
    {
        $carousel = $this->getDoctrine()
            ->getRepository(Carousel::class)
            ->findAll();

        $homeTexte = $this->getDoctrine()
            ->getRepository(HomeTexte::class)
            ->findAll();




            return $this->render('home/index.html.twig', [
            'carousel' => $carousel,
            'homeTexte' => $homeTexte,
        ]);
    }
}
