<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/restaurant/{slug}', name:'restaurant_show')]
    public function show(?Restaurant $restaurant): Response
    {
        if (!$restaurant) {
            return $this->redirectToRoute('app_home');
        }
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant
        ]);
    }
}
