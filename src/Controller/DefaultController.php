<?php

/*
 * This file is a part of the simple emoji calculator for symfony learning app.
 *
 * Copyright (c) 2022-2023, AHAD NOOR ALAM <https://www.linkedin.com/in/ahadnoor/>
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
