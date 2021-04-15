<?php

namespace App\Repository;

use App\Entity\SharedFridge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SharedFridge|null find($id, $lockMode = null, $lockVersion = null)
 * @method SharedFridge|null findOneBy(array $criteria, array $orderBy = null)
 * @method SharedFridge[]    findAll()
 * @method SharedFridge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SharedFridgeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SharedFridge::class);
    }

    // /**
    //  * @return SharedFridge[] Returns an array of SharedFridge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SharedFridge
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
