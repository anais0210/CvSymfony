<?php

namespace AppBundle\Services;

use AppBundle\Entity\Evaluation;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class EvaluationService
 */
class EvaluationService
{
    private $em;

    /**
     * EvaluationService constructeur
     * 
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @return int
     */
    public function getMoyenneEvaluation()
    {
        $evaluations = $this->em->getRepository(Evaluation::class)->findAll();

        $total = 0;

        foreach ($evaluations as $evaluation) {
            $total += $evaluation->getNote();
        }

        return count($evaluations) !== 0 ? $total / count($evaluations) : 0;
    }
}
