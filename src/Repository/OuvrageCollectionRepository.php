<?php

namespace App\Repository;

use App\Entity\OuvrageCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OuvrageCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method OuvrageCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method OuvrageCollection[]    findAll()
 * @method OuvrageCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OuvrageCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OuvrageCollection::class);
    }

    // /**
    //  * @return OuvrageCollection[] Returns an array of OuvrageCollection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OuvrageCollection
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
