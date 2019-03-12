<?php

namespace App\Repository;

use App\Entity\CANDIDATURE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CANDIDATURE|null find($id, $lockMode = null, $lockVersion = null)
 * @method CANDIDATURE|null findOneBy(array $criteria, array $orderBy = null)
 * @method CANDIDATURE[]    findAll()
 * @method CANDIDATURE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CANDIDATURERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CANDIDATURE::class);
    }

    // /**
    //  * @return CANDIDATURE[] Returns an array of CANDIDATURE objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CANDIDATURE
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
