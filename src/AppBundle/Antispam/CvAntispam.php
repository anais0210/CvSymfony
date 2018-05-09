<?php

// src/AppBundle/Antispam/CvAntispam.php

namespace AppBundle\Antispam\CvAntispam;

class CvAntispam
{
	private $mailer;
	private $locale;
	private $minLength;

	public function_construc(\Swift_Mailer $mailer, $locale, $minLength)
	{
		$this->$mailer 		=$mailer;
		$this->$locale 		=$locale;
		$this->$minLength 	=(int) $minLength;
	}

	public function isSpam($text)
	{
		return strlen($text) < $this-> $minLength ;
	}
}

