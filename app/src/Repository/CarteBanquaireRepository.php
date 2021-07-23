<?php

namespace App\Repository;

use App\Entity\CarteBanquaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarteBanquaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteBanquaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteBanquaire[]    findAll()
 * @method CarteBanquaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteBanquaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteBanquaire::class);
    }

    // /**
    //  * @return CarteBanquaire[] Returns an array of CarteBanquaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarteBanquaire
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
