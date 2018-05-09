<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PresentationController extends Controller
{
	public function indexAction()
	{
		return $this->render('AppBundle:default:index.html.twig');
    }

    public function experienceAction()
    {
    	return $this->render('AppBundle:Presentation:experience.html.twig');
    }

    public function formationAction()
    {
    	return $this->render('AppBundle:Presentation:formation.html.twig');
    }

    public function rechercheAction()
    {
    	return $this->render('AppBundle:Presentation:recherche.html.twig');
    }

    public function addAction(Request $request)
 	{
		$antispam = $this->container->get('app.antispam');
		$text = '...';
		if ($antispam->isSpam($text)) 
		{
			throw new \Exception('Votre message a été détecté comme spam !');
		}
 	}

}



