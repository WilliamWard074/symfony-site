<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Contact;
use App\Form\ContactType;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact-us/", name="contact_us")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {

		$contact = new Contact();

		$form = $this->createForm(ContactType::class, $contact);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
		    $contact = $form->getData();

		    $entityManager = $this->getDoctrine()->getManager();
		    $entityManager->persist($contact);
		    $entityManager->flush();

            $message = (new \Swift_Message('Hello Email'))
                ->setFrom($contact->getEmail())
                ->setTo(getenv(MAILER_CONTACT_ADDRESS))
                ->setBody(
                    $this->renderView(
                        // templates/emails/registration.html.twig
                        'email/partial/contact.html.twig',
                        ['name' => $contact->getName()]
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);

		    return $this->redirectToRoute('contact_us_success');
		}
		
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
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
