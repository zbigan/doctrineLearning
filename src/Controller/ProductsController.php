<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Products;
use App\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    /**
     * @Route("/products", name="products")
     */
    public function addProduct()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Products();
        $product->setTitle("Nike Air");
        $product->setPrice(200);
        $product->setActive(1);

        $category = new Categories();
        $category->setTitle("sneakers");
        $category->addProduct($product);

        $entityManager->persist($category);
        $entityManager->flush();

        return new Response('New product saved '.$product->getTitle().' in category: '. $category->getTitle());
    }
}
