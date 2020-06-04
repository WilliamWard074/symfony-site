<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AboutController extends AbstractController
{
    /**
     * @Route("/about-us", name="about_us")
     */
    public function index()
    {
    	$breadcrumbs[] = [
    		'url'		=> $this->generateUrl('about_us', [], UrlGeneratorInterface::ABSOLUTE_URL),
    		'position'	=> 2, //we use 2 as the homepage is poition 1
    		'name'		=> 'About Us'
    	];

        return $this->render('about/about.html.twig', [
        	'breadcrumbs'	=> $breadcrumbs
        ]);
    }
}
