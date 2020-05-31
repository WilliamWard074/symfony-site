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

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('contact_us');
	        $page->setSlug('contact-us');
	        $page->setShowInSitemap(true);
	        $page->setTitle('Contact Us');
	        $page->setMetaTitle('Contact us today');
	        $page->setMetaDescription('Have an enquiry or need to get in contact with us?');
        $manager->persist($page);

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('contact_us_success');
	        $page->setSlug('contact-us/success');
	        $page->setShowInSitemap(false);
	        $page->setTitle('Contact form received');
	        $page->setMetaTitle('Thank you! Contact form received');
	        $page->setMetaDescription('Thank you, we have recievied your submission');
        $manager->persist($page);

        $manager->flush();
    }
}
