<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Form\EvaluationType;
use AppBundle\Services\EvaluationService;
use Doctrine\Bundle\DoctrineBundle\Repository\getRepository;
use Doctrine\Common\Persistence\getManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SecurityBundle\Debug\handleRequest;
use Symfony\Component\HttpFoundation\Request;

class EvaluationController extends controller
{
	public function evaluationAction()
 	{
 		$em = $this->getDoctrine()->getManager();
 		$evaluations = $em->getRepository(Evaluation::class)->findAll();
 		$moyenne = $this->get(EvaluationService::class)->getMoyenneEvaluation();
 		return $this->render('AppBundle:Evaluation:evaluation.html.twig', 
			['evaluations' => $evaluations,'moyenne'=>$moyenne]);
 	}

 	public function ajouterAction(Request $request)
 	{
 		$evaluation = new Evaluation();
 	
 		$form = $this->createForm(EvaluationType::class, $evaluation);

 		$form->handleRequest($request);
 		if($form->isSubmitted() and $form->isValid()) 
 		{
 			$em = $this->getDoctrine()->getManager();
 			$em->persist($evaluation);
 			$em->flush();
 			return $this->redirectToRoute('Ajouter');
 		}

 		return $this->render('AppBundle:Evaluation:ajouter.html.twig', ['form' => $form->createView()]);
 	}
 }