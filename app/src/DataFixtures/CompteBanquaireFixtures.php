<?php

namespace App\DataFixtures;

use App\Entity\CompteBanquaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CompteBanquaireFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $compte1 = new CompteBanquaire();
        $compte1->setIBAN("IBAN1")
            ->setBIC('BIC1')
            ->setBalance(1500)
            ->setIdCompteFourni(1)
            ->setUtilisateur($this->getReference("utilisateur1"))
        ;

        $compte2 = new CompteBanquaire();
        $compte2->setIBAN("IBAN2")
            ->setBIC('BIC2')
            ->setBalance(500)
            ->setIdCompteFourni(2)
            ->setUtilisateur($this->getReference("utilisateur1"))
        ;

        $compte3 = new CompteBanquaire();
        $compte3->setIBAN("IBAN3")
            ->setBIC('BIC3')
            ->setBalance(500)
            ->setIdCompteFourni(3)
            ->setUtilisateur($this->getReference("utilisateur2"))
        ;

        $compte4 = new CompteBanquaire();
        $compte4->setIBAN("IBAN4")
            ->setBIC('BIC4')
            ->setBalance(200)
            ->setIdCompteFourni(4)
            ->setUtilisateur($this->getReference("utilisateur3"))
        ;

        $compte5 = new CompteBanquaire();
        $compte5->setIBAN("IBAN5")
            ->setBIC('BIC5')
            ->setBalance(200)
            ->setIdCompteFourni(5)
            ->setUtilisateur($this->getReference("utilisateur4"))
        ;

        $compte6 = new CompteBanquaire();
        $compte6->setIBAN("IBAN6")
            ->setBIC('BIC6')
            ->setBalance(200)
            ->setIdCompteFourni(6)
            ->setUtilisateur($this->getReference("utilisateur5"))
        ;

        $compte7 = new CompteBanquaire();
        $compte7->setIBAN("IBAN7")
            ->setBIC('BIC7')
            ->setBalance(200)
            ->setIdCompteFourni(7)
            ->setUtilisateur($this->getReference("utilisateur6"))
        ;

        $this->addReference("compte1", $compte1);

        $manager->persist($compte1);
        $manager->persist($compte2);
        $manager->persist($compte3);
        $manager->persist($compte4);
        $manager->persist($compte5);
        $manager->persist($compte6);
        $manager->persist($compte7);
        $manager->remove($this->getReference('utilisateur6'));
        $manager->flush();

        $manager->remove($compte7);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UtilisateurFixtures::class,
        ];
    }
}
