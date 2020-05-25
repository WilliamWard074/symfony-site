<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

	private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@test.com');
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '$argon2id$v=19$m=65536,t=4,p=1$0SsjmsKPJwq4AJKmANEV2w$YnejlnYWA2vD2h0Pi91KlZ2XVKLuFyD58WmGoOj4a2g'
        ));

        $manager->persist($user);
        $manager->flush();
    }
}
