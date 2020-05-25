<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use App\Repository\PageRepository;

class SitemapController extends AbstractController
{
	protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * @Route("/sitemap.{_format}", name="sitemap", defaults={"_format"="xml"})
     */
    public function index()
    {
    	$pages = $this->getPages();

        return $this->render('sitemap/sitemap.xml.twig', [
            'pages' => $pages,
        ]);
    }

    public function getPages () {

    	// Get Page entity 
    	$pages = $this->pageRepository->getSitemapPages();

    	foreach ($pages as $page) {

    		// build the sitemap
            $output['loc']        = $this->generateUrl($page->getRoute(), [], UrlGeneratorInterface::ABSOLUTE_URL);
            $output['lastmod']    = $page->getUpdatedAt();
            $output['changefreq'] = 'weekly';
            $output['priority']   = '0.5';

            // merge output to the return array
            $allPages[]           = $output;
        }

        return $allPages;
    }
}
