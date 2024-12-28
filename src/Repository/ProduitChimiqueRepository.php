<?php

namespace App\Repository;

use App\Entity\ProduitChimique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProduitChimique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitChimique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitChimique[]    findAll()
 * @method ProduitChimique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitChimiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitChimique::class);
    }

    // /**
    //  * @return ProduitChimique[] Returns an array of ProduitChimique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProduitChimique
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
