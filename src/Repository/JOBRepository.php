<?php

namespace App\Repository;

use App\Entity\JOB;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JOB|null find($id, $lockMode = null, $lockVersion = null)
 * @method JOB|null findOneBy(array $criteria, array $orderBy = null)
 * @method JOB[]    findAll()
 * @method JOB[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JOBRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JOB::class);
    }

    // /**
    //  * @return JOB[] Returns an array of JOB objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JOB
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
