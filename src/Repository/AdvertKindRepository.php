<?php

namespace App\Repository;

use App\Entity\AdvertKind;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdvertKind|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdvertKind|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdvertKind[]    findAll()
 * @method AdvertKind[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertKindRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdvertKind::class);
    }

    // /**
    //  * @return AdvertKind[] Returns an array of AdvertKind objects
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
    public function findOneBySomeField($value): ?AdvertKind
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
