<?php

namespace App\Repository;

use App\Entity\Measures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Measures|null find($id, $lockMode = null, $lockVersion = null)
 * @method Measures|null findOneBy(array $criteria, array $orderBy = null)
 * @method Measures[]    findAll()
 * @method Measures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeasuresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Measures::class);
    }

    // /**
    //  * @return Measures[] Returns an array of Measures objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Measures
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
