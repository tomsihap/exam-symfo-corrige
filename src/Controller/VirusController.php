<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VirusController extends AbstractController
{
    /**
     * @Route("/virus", name="virus")
     */
    public function index()
    {
        return $this->render('virus/index.html.twig', [
            'controller_name' => 'VirusController',
        ]);
    }
}
