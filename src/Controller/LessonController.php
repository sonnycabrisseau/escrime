<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LessonController extends AbstractController
{
    /**
     * @Route("/lesson", name="lesson")
     */
    public function index()
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'LessonController',
        ]);
    }


    /**
     * @Route("/lesson/{id}", name="lesson")
     */
    public function details($id)
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'LessonController'.$id,
        ]);
    }
}
