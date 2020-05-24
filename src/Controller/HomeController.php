<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\HomepageSliderRepository;

class HomeController extends AbstractController
{

	protected $homepageSliderRepository;

    public function __construct(HomepageSliderRepository $homepageSliderRepository)
    {
        $this->homepageSliderRepository = $homepageSliderRepository;
    } 

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
    	$slides = $this->homepageSliderRepository->findAll();

        return $this->render('home/home.html.twig', [
        	'slides'	=>	$slides
        ]);
    }
}
