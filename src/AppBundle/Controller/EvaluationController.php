<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Form\EvaluationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EvaluationController extends controller
{
	public function evaluationAction()
 	{
 		$em = $this->getDoctrine()->getManager();
 		$evaluations = $em->getRepository(Evaluation::class)->findAll();

 		return $this->render('AppBundle:Evaluation:evaluation.html.twig', 
			['evaluations' => $evaluations]);
 	}

 	public function ajouterAction(Request $request)
 	{
 		$evaluation = new evaluation;
 		$em = $this->getDoctrine()->getManager();
 	
 		$form = $this->createForm(EvaluationType::class, $evaluation);

 		$form->handleRequest($request);
 		if($form->isSubmitted() and $form->isValid()) 
 		{
 			$em = $this->getDoctrine()->getManager();
 			$em->persist($evaluation);
 			$em->flush();
 			return $this->redirectToRoute('Presentation');
 		}

 		return $this->render('AppBundle:Evaluation:ajouter.html.twig', ['form' => $form->createView()]);
 	}
 }