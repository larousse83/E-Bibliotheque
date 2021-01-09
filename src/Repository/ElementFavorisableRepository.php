<?php

namespace App\Repository;

use App\Entity\ElementFavorisable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ElementFavorisable|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementFavorisable|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementFavorisable[]    findAll()
 * @method ElementFavorisable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementFavorisableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElementFavorisable::class);
    }

    // /**
    //  * @return ElementFavorisable[] Returns an array of ElementFavorisable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElementFavorisable
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
