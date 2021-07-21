<?php

namespace App\Repository;

use App\Entity\ProduitCommander;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProduitCommander|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitCommander|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitCommander[]    findAll()
 * @method ProduitCommander[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitCommanderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitCommander::class);
    }

    // /**
    //  * @return ProduitCommander[] Returns an array of ProduitCommander objects
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
    public function findOneBySomeField($value): ?ProduitCommander
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
