<?php

namespace App\Controller\Admin;

use App\Entity\HomeTexte;
use App\Form\HomeTexteType;
use App\Repository\HomeTexteRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adminHomeTexte", name="admin_homeTexte_")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class HomeTexteController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(HomeTexteRepository $homeTexteRepository): Response
    {
        return $this->render('admin/homeTexte/index.html.twig', [
            'home_textes' => $homeTexteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $homeTexte = new HomeTexte();
        $form = $this->createForm(HomeTexteType::class, $homeTexte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($homeTexte);
            $entityManager->flush();

            return $this->redirectToRoute('admin_homeTexte_index');
        }

        return $this->render('admin/homeTexte/new.html.twig', [
            'home_texte' => $homeTexte,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HomeTexte $homeTexte): Response
    {
        $form = $this->createForm(HomeTexteType::class, $homeTexte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_homeTexte_index');
        }

        return $this->render('admin/homeTexte/edit.html.twig', [
            'home_texte' => $homeTexte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, HomeTexte $homeTexte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$homeTexte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($homeTexte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_homeTexte_index');
    }
}
