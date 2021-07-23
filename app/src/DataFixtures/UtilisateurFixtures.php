<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Utilisateur;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Utilisateur 1
        $utilisateur1 = new Utilisateur();
        $utilisateur1->setNom('Riccardo')
            ->setPrenom('Daniel')
            ->setDateNaissance(new \DateTime('1989-07-01'))
            ->setEmail('honey.badger@fia.com')
            ->setTelephone('0637225013')
        ;

        //Utilisateur 2
        $utilisateur2 = new Utilisateur();
        $utilisateur2->setNom('Gasly')
            ->setPrenom('Pierre')
            ->setDateNaissance(new \DateTime('1996-02-07'))
            ->setEmail('pierrot-monza2020@fia.com')
            ->setTelephone('0637225013')
        ;

        //Utilisateur 3
        $utilisateur3 = new Utilisateur();
        $utilisateur3->setNom('Vettel')
            ->setPrenom('Sebastien')
            ->setDateNaissance(new \DateTime('1987-07-03'))
            ->setEmail('babyschumy@fia.com')
            ->setTelephone('0637225013')
        ;

        //Utilisateur 4
        $utilisateur4 = new Utilisateur();
        $utilisateur4->setNom('Alonso')
            ->setPrenom('Fernando')
            ->setDateNaissance(new \DateTime('1981-07-29'))
            ->setEmail('nando@fia.com')
            ->setTelephone('0637225013')
        ;

        //Utilisateur 5
        $utilisateur5 = new Utilisateur();
        $utilisateur5->setNom('Lando')
            ->setPrenom('Norris')
            ->setDateNaissance(new \DateTime('1999-11-13'))
            ->setEmail('nono@fia.com')
            ->setTelephone('0637225013')
        ;

        //Utilisateur 6
        $utilisateur6 = new Utilisateur();
        $utilisateur6->setNom('Grosjean')
            ->setPrenom('Romain')
            ->setDateNaissance(new \DateTime('1986-04-17'))
            ->setEmail('r8g@fia.com')
            ->setTelephone('0637225013')
        ;

        //Creation d'alias afin de pouvoir utilisé ces donner dans les fixtures CompteBanquaire
        $this->addReference('utilisateur1',$utilisateur1);
        $this->addReference('utilisateur2',$utilisateur2);
        $this->addReference('utilisateur3',$utilisateur3);
        $this->addReference('utilisateur4',$utilisateur4);
        $this->addReference('utilisateur5',$utilisateur5);
        $this->addReference('utilisateur6',$utilisateur6);

        $manager->persist($utilisateur1);
        $manager->persist($utilisateur2);
        $manager->persist($utilisateur3);
        $manager->persist($utilisateur4);
        $manager->persist($utilisateur5);
        $manager->persist($utilisateur6);
        $manager->flush();
    }
}
