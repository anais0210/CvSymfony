<?php

// src/AppBundle/Services/EvaluationService.php

namespace AppBundle\Services;

class EvaluationService
{
	public function getMoyenneEvaluation()
	{
		$evaluations = [];
		$total = 0;

		foreach ($evaluations as $evaluation) 
		{
			$total += $evaluation->getNote();
		}

		return $total / count($evaluations);
	}
}

