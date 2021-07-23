<?php


namespace App\DataFixtures;


use App\Entity\CarteBanquaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CarteBanquaireFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cb1 = new CarteBanquaire();
        $cb1->setNumeroCarte(1111)
            ->setDateExpiration(new \DateTime('2021-12'))
            ->setIdCarte(1)
            ->setStatut(CarteBanquaire::ACTIVE)
            ->setCompteBanquaire($this->getReference('compte1'))
        ;

        $manager->persist($cb1);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CompteBanquaireFixtures::class,
        ];
    }
}
