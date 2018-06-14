<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * class PresentationController
 */
class PresentationController extends Controller
{
    /**
     * @return render
     */
    public function indexAction()
    {
        return $this->render('AppBundle:default:index.html.twig');
    }
    /**
     * @return render
     */
    public function experienceAction()
    {
        return $this->render('AppBundle:Presentation:experience.html.twig');
    }
    /**
     * @return render
     */
    public function formationAction()
    {
        return $this->render('AppBundle:Presentation:formation.html.twig');
    }
    /**
     * @return render
     */
    public function rechercheAction()
    {
        return $this->render('AppBundle:Presentation:recherche.html.twig');
    }
    /**
     * @param Request $request
     */
    public function addAction(Request $request)
    {
        $antispam = $this->container->get('app.antispam');
        $text = '...';
        if ($antispam->isSpam($text)) {
            throw new \Exception('Votre message a été détecté comme spam !');
        }
    }
    /**
     * @return render
     */
    public function competencesAction()
    {
        return $this->render('AppBundle:Presentation:competences.html.twig');
    }
}
