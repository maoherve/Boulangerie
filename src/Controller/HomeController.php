<?php

namespace App\Controller;

use App\Entity\Carousel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     *
     * homepage of the site
     */
    public function index(): Response
    {
        $carousel = $this->getDoctrine()
            ->getRepository(Carousel::class)
            ->findAll();

        return $this->render('home/index.html.twig', ['carousel' => $carousel,
        ]);
    }
}
