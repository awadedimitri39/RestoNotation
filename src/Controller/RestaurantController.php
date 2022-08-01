<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/restaurant', name: 'restaurant_list')]
    public function index(RestaurantRepository $repo): Response
    {

        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $repo->findAll()
        ]);
    }

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
