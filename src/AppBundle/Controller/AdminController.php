<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class AdminController 
 */
class AdminController extends Controller
{
    /**
     * @Route("/admin")
     * 
     * @return Response
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }
}
