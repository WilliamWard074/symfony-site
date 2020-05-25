<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

use App\Repository\PageRepository;
use App\Entity\Page;

class PageExtension extends AbstractExtension
{
    protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getPage', [$this, 'getPageByRoute']),
        ];
    }

    public function getPageByRoute($route): ?Page
    {

        $page = $this->pageRepository->findByRoute($route);

        return $page;
    }

}
