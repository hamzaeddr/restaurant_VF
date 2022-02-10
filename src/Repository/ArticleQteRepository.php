<?php

namespace App\Repository;

use App\Entity\ArticleQte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleQte|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleQte|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleQte[]    findAll()
 * @method ArticleQte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleQteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleQte::class);
    }

    // /**
    //  * @return ArticleQte[] Returns an array of ArticleQte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleQte
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
