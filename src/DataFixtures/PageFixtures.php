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
	        $page->setShowInMenu(false);
	        $page->setTitle('Home');
	        $page->setMetaTitle('Welcome to my website');
	        $page->setMetaDescription('This is my new website');
        $manager->persist($page);

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('contact_us');
	        $page->setSlug('contact-us');
	        $page->setShowInSitemap(true);
	        $page->setShowInMenu(true);
	        $page->setTitle('Contact Us');
	        $page->setMetaTitle('Contact us today');
	        $page->setMetaDescription('Have an enquiry or need to get in contact with us?');
        $manager->persist($page);

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('contact_us_success');
	        $page->setSlug('contact-us/success');
	        $page->setShowInSitemap(false);
	        $page->setShowInMenu(false);
	        $page->setTitle('Contact form received');
	        $page->setMetaTitle('Thank you! Contact form received');
	        $page->setMetaDescription('Thank you, we have recievied your submission');
        $manager->persist($page);

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('about_us');
	        $page->setSlug('about-us');
	        $page->setShowInSitemap(true);
	        $page->setShowInMenu(true);
	        $page->setTitle('About us');
	        $page->setMetaTitle('About us');
	        $page->setMetaDescription('Learn more about us!');
        $manager->persist($page);

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('terms-and-conditions');
	        $page->setSlug('terms-and-conditions');
	        $page->setShowInSitemap(true);
	        $page->setShowInMenu(false);
	        $page->setTitle('Terms and Conitions');
	        $page->setMetaTitle('Terms and Conitions');
	        $page->setMetaDescription('Terms and conitions are really important!');
	        $page->setContent('This is my terms and conditions!');
        $manager->persist($page);

        $page = new Page();
	        $page->setActive(true);
	        $page->setRoute('privacy-policy');
	        $page->setSlug('privacy-policy');
	        $page->setShowInSitemap(true);
	        $page->setShowInMenu(false);
	        $page->setTitle('Privacy policy');
	        $page->setMetaTitle('Privacy policy');
	        $page->setMetaDescription('Privacy policy is important too!');
	        $page->setContent('This is my privacy policy!');
        $manager->persist($page);

        $manager->flush();
    }
}
