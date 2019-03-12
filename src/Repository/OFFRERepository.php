<?php

namespace App\Repository;

use App\Entity\OFFRE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OFFRE|null find($id, $lockMode = null, $lockVersion = null)
 * @method OFFRE|null findOneBy(array $criteria, array $orderBy = null)
 * @method OFFRE[]    findAll()
 * @method OFFRE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OFFRERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OFFRE::class);
    }

    // /**
    //  * @return OFFRE[] Returns an array of OFFRE objects
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
    public function findOneBySomeField($value): ?OFFRE
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
