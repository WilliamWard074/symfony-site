<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Page;

class PageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('home');
	        $page->setSlug('/');
	        $page->setShowInSitemap(true);
	        $page->setTitle('Home');
	        $page->setMetaTitle('Welcome to my website');
	        $page->setMetaDescription('This is my new website');
        $manager->persist($page);

        $manager->flush();
    }
}
