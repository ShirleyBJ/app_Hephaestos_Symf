<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutomobileController extends AbstractController
{
    #[Route('/automobile', name: 'automobile')]
    public function index(): Response
    {
        return $this->render('automobile/index.html.twig', [
            'controller_name' => 'AutomobileController',
        ]);
    }
}
