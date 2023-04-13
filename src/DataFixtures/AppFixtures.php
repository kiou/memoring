<?php

namespace App\DataFixtures;

use App\Entity\CarteQr;
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
        // Utilisateur
        /*$user = new User();
        $user->setEmail('pinelli.luc@outlook.fr');
        $user->setNom('Pinelli');
        $user->setPrenom('Luc');

        $password = $this->hasher->hashPassword($user, 'pinelliluc38');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();*/

        // Carte QR orange cg
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "cg" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('orange');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR orange hist
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "hist" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('orange');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR orange sci
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "sci" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('orange');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR bleu cg
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "cg" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('bleu');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR bleu hist
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "hist" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('bleu');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR bleu sci
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "sci" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('bleu');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR vert cg
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "cg" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('vert');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }

        // Carte QR vert his
        for ($i = 1; $i <= 100; $i++) {
            $numero = str_pad($i, 3, '0', STR_PAD_LEFT);
            $idcarte = "his" . $numero;

            $carte = new CarteQr();
            $carte->setTitre('Carte '.$idcarte);
            $carte->setCouleur('vert');
            $carte->setContenu('Le contenu');
            $carte->setIdcarte($idcarte);

            $manager->persist($carte);
            $manager->flush();
        }
    }
}

?>