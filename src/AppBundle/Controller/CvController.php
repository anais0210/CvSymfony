<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * class CvController
 */
class CvController extends Controller
{
    /**
    * @return file
    */
    public function indexAction()
    {
        $path = $this->getParameter('kernel.root_dir');

        return $this->file($path.'/../src/AppBundle/Resources/public/img/CvSparesottoAnais.pdf');
    }
}
