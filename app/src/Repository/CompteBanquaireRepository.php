<?php

namespace App\Repository;

use App\Entity\CompteBanquaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompteBanquaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteBanquaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteBanquaire[]    findAll()
 * @method CompteBanquaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteBanquaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteBanquaire::class);
    }

    // /**
    //  * @return CompteBanquaire[] Returns an array of CompteBanquaire objects
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
    public function findOneBySomeField($value): ?CompteBanquaire
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
