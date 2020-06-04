<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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

        $breadcrumbs[] = [
            'url'       => $this->generateUrl($request->attributes->get('_route'), [], UrlGeneratorInterface::ABSOLUTE_URL),
            'position'  => 2, //we use 2 as the homepage is poition 1
            'name'      => $page->getTitle()
        ];

        return $this->render('default/default.html.twig', [
            'page'          => $page,
            'breadcrumbs'   => $breadcrumbs,
        ]);
    }
}
