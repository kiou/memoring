<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('pinelli.luc@outlook.fr');
        $user->setNom('Pinelli');
        $user->setPrenom('Luc');

        $password = $this->hasher->hashPassword($user, 'pinelliluc38');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}

?>