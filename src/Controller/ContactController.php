<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Entity\Contact;
use App\Form\ContactType;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact-us/", name="contact_us")
     */
    public function index(Request $request)
    {

		$contact = new Contact();

		$form = $this->createForm(ContactType::class, $contact);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
		    $contact = $form->getData();

		    $entityManager = $this->getDoctrine()->getManager();
		    $entityManager->persist($contact);
		    $entityManager->flush();

		    return $this->redirectToRoute('contact_us_success');
		}

        $breadcrumbs[] = [
            'url'       => $this->generateUrl('contact_us', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'position'  => 2, //we use 2 as the homepage is poition 1
            'name'      => 'Contact Us'
        ];
		
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
            'breadcrumbs'   => $breadcrumbs
        ]);
    }

    /**
     * @Route("/contact-us/success", name="contact_us_success")
     */
    public function complete()
    {
        return $this->render('contact/success.html.twig', [
        ]);
    }
}
