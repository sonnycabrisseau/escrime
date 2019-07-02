<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ObjectifsController extends AbstractController
{
    /**
     * @Route("/objectif/{id}", name="objectif")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'ObjectifsController',
        ]);
    }
}
