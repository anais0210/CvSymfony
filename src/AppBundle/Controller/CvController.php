<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\file;

class CvController extends Controller 
{
	public function indexAction()
	{
		$path = $this->getParameter('kernel.root_dir');
		
		return $this->file($path.'/../src/AppBundle/Resources/public/img/CvSparesottoAnais.pdf');
	}
}