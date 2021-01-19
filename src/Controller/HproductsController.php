<?php

namespace App\Controller;

use App\Entity\Categories;
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

        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();


        return $this->render('hproducts/index.html.twig', [
            'products' => $products, 'categories' => $categories,
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

    /**
     * @Route("/category/{categoryName}", name="show_category")
     * @param string $categoryName
     * @return Response
     *
    public function showByCategory(string $categoryName):Response
    {
        $category = $this->getDoctrine()->getRepository(Products::class)
            ->findBy(['name' => $categoryName]);
            ->distinct(true)


        return $this->render("hproducts/categorie.html.twig",['category' => $category]);
    }*/


}
