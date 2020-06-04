<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\PageRepository;

class DefaultController extends AbstractController
{
	protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    } 

    public function header()
    {
    	$menuPages = $this->pageRepository->getMenuPages();

        return $this->render('header.html.twig', [
        	'menuPages' => $menuPages 
        ]);
    }

    /**
     * @Route("/terms-and-conditions", name="terms-and-conditions")
     * @Route("/privacy-policy", name="privacy-policy")
     */
    public function index(Request $request)
    {
        $page = $this->pageRepository->getDefaultPageByRoute($request->attributes->get('_route'));

        return $this->render('default/default.html.twig', [
            'page' => $page 
        ]);
    }
}
