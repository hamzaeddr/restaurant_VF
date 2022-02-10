<?php

namespace App\Repository;

use App\Entity\FamillesSous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FamillesSous|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamillesSous|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamillesSous[]    findAll()
 * @method FamillesSous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamillesSousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamillesSous::class);
    }

    // /**
    //  * @return FamillesSous[] Returns an array of FamillesSous objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamillesSous
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
