<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}
