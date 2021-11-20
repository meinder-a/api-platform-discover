<?php

namespace App\Repository;

use App\Entity\ExtensionType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExtensionType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExtensionType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExtensionType[]    findAll()
 * @method ExtensionType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExtensionTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExtensionType::class);
    }

    // /**
    //  * @return ExtensionType[] Returns an array of ExtensionType objects
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
    public function findOneBySomeField($value): ?ExtensionType
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
