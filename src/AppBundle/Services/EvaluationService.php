<?php

// src/AppBundle/Services/EvaluationService.php

namespace AppBundle\Services;

use AppBundle\Entity\Evaluation;
use Doctrine\Bundle\DoctrineBundle\Repository\getRepository;
use Doctrine\ORM\EntityManagerInterface;

class EvaluationService
{
	private $em;

	public function __construct(EntityManagerInterface $em)
	{
		$this->em = $em;
	}

	public function getMoyenneEvaluation()
	{
		$evaluations = $this->em->getRepository(Evaluation::class)->findAll();

		$total = 0;

		foreach ($evaluations as $evaluation) 
		{
			$total += $evaluation->getNote();
		}

		return $total / count($evaluations);
	}
}

