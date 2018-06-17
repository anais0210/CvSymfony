<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use AppBundle\Services\CvAntispam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * class ContactController
 */
class ContactController extends Controller
{
    /**
     * @param Request $request
     * @return render
     */
    public function indexAction(Request $request)
    {
        $contact = new contact();
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            if ($this->get(CvAntispam::class)->isSpam($contact->getMessage())) {
                throw new \Exception('Vous avez été considéré comme un spam!');
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('Presentation');
        }

        return $this->render('AppBundle:Contact:index.html.twig', ['form' => $form->createView()]);
    }
}
