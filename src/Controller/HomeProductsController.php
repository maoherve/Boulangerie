<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("/produits", name="products_")
 */
class HomeProductsController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * show all the products
     * @return Response
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()
            ->getRepository(Products::class)
            ->findProductsByASC();


        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();

        return $this->render('homeProducts/index.html.twig', [
            'products' => $products, 'categories' => $categories,
        ]);
    }


    /**
     * @Route("/{categoryName}", name="show_category")
     * @param string $categoryName
     * @return Response
     * show products by category
     */
    public function showByCategory(string $categoryName):Response
    {
        $category = $this->getDoctrine()->getRepository(Categories::class)
            ->findOneBy(['name' => $categoryName]);
        $products = $this->getDoctrine()->getRepository(Products::class)
            ->findBy(['categories' => $category],['name'=>'ASC']);


        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();


        return $this->render("homeProducts/category.html.twig",
            ['products' => $products,
                'categories' => $categories,
            ]);
    }
}
