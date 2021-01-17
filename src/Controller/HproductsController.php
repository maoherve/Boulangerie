<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("/products", name="products_")
 */
class HproductsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()
            ->getRepository(Products::class)
            ->findAll();

        return $this->render('hproducts/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/productDetails/{id}", name="Details")
     * @return Response
     *
     * show details of an article
     */
    public function show(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Products::class)
            ->find($id);



        return $this->render('hproducts/productDetails/productDetails.html.twig', [
            'product' => $product,
        ]);
    }
}
