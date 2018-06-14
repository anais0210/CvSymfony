<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Form\EvaluationType;
use AppBundle\Services\EvaluationService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

    /**
     * class EvalautionController
     */
class EvaluationController extends controller
{
    /**
     * @return render
     */
    public function evaluationAction()
    {
        $evaluations = $this->getDoctrine()->getManager()->getRepository(Evaluation::class)->findAll();
        $moyenne = $this->get(EvaluationService::class)->getMoyenneEvaluation();

        return $this->render(
            'AppBundle:Evaluation:evaluation.html.twig',
            ['evaluations' => $evaluations, 'moyenne' => $moyenne]
        );
    }

    /**
     * @param Request $request
     * @return render
     * 
     */
    public function ajouterAction(Request $request)
    {
        $evaluation = new Evaluation();

        $form = $this->createForm(EvaluationType::class, $evaluation);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evaluation);
            $em->flush();

            return $this->redirectToRoute('Ajouter');
        }

        return $this->render('AppBundle:Evaluation:ajouter.html.twig', ['form' => $form->createView()]);
    }
}
