<?php

namespace App\Repository;

use App\Entity\MoviePersonage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MoviePersonage|null find($id, $lockMode = null, $lockVersion = null)
 * @method MoviePersonage|null findOneBy(array $criteria, array $orderBy = null)
 * @method MoviePersonage[]    findAll()
 * @method MoviePersonage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoviePersonageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MoviePersonage::class);
    }

    // /**
    //  * @return MoviePersonage[] Returns an array of MoviePersonage objects
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
    public function findOneBySomeField($value): ?MoviePersonage
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
