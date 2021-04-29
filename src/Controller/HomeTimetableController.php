<?php

namespace App\Controller;

use App\Entity\Timetable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeTimetableController extends AbstractController
{
    /**
     * @Route("/horaires", name="timetable")
     * @return Response
     */
    public function index(): Response
    {

        $timetables = $this->getDoctrine()
            ->getRepository(Timetable::class)
            ->findAll();

        return $this->render('homeTimetable/index.html.twig', [
            'timetables' => $timetables,
            ])
        ;
    }
}
