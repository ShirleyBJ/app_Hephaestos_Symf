<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RenovationAutoController extends AbstractController
{
    #[Route('/renovation/auto', name: 'renovation_auto')]
    public function index(): Response
    {
        return $this->render('renovation_auto/index.html.twig', [
            'controller_name' => 'RenovationAutoController',
        ]);
    }
}
