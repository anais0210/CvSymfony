<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
    	$contact = new contact();
    	$em = $this->getDoctrine()->getManager();
 	
 		$form = $this->createForm(ContactType::class, $contact);

 		$form->handleRequest($request);
 		if($form->isSubmitted() and $form->isValid()) 
 		{
 			$em = $this->getDoctrine()->getManager();
 			$em->persist($contact);
 			$em->flush();
 			return $this->redirectToRoute('Presentation');
 		}

        return $this->render('AppBundle:Contact:index.html.twig', ['form' => $form->createView()]);
    }
}