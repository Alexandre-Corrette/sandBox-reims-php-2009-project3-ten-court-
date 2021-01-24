<?php

namespace App\Repository;

use App\Entity\TennisCourt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TennisCourt|null find($id, $lockMode = null, $lockVersion = null)
 * @method TennisCourt|null findOneBy(array $criteria, array $orderBy = null)
 * @method TennisCourt[]    findAll()
 * @method TennisCourt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TennisCourtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TennisCourt::class);
    }

    // /**
    //  * @return TennisCourt[] Returns an array of TennisCourt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TennisCourt
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
