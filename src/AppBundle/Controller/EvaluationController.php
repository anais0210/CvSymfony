<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Evaluation;
use AppBundle\Form\EvaluationType;

class EvaluationController extends controller
{
	public function evaluationAction()
 	{
 		$em = $this->getDoctrine()->getManager();
 		$evaluations = $em->getRepository(Evaluation::class)->findAll();

 		return $this->render('AppBundle:Evaluation:evaluation.html.twig', 
			['evaluations' => $evaluations]);
 	}

 	public function ajouterAction()
 	{
 		$evaluation = new evaluation;
 		$em = $this->getDoctrine()->getManager();
 	
 		$form = $this->createForm(EvaluationType::class, $evaluation);

 		return $this->render('AppBundle:Evaluation:ajouter.html.twig', ['form' => $form->createView()]);
 	}
 }