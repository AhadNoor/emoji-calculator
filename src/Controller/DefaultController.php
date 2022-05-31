<?php

/*
 * This file is a part of the simple emoji calculator for symfony learning app.
 *
 * Copyright (c) 2022-2023, AHAD NOOR ALAM <https://www.linkedin.com/in/ahadnoor/>
 */

namespace App\Controller;

use App\DataMapper\CalculatorDataMapper;
use App\Form\CalculatorType;
use App\Manager\CalculatorManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(Request $request, CalculatorManager $manager)
    {
        $calculatorRequest = new CalculatorDataMapper();
        $form = $this->createForm(CalculatorType::class, $calculatorRequest);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return new JsonResponse(
                [
                    'isSuccess' => true,
                    'result' => $manager->calculate($form->getClickedButton()->getName(), $calculatorRequest->getOperandA(), $calculatorRequest->getOperandB()),
                ]
            );
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'form' => $form->createView(),
        ]);
    }
}
