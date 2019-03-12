<?php

namespace App\Repository;

use App\Entity\COMPETENCE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method COMPETENCE|null find($id, $lockMode = null, $lockVersion = null)
 * @method COMPETENCE|null findOneBy(array $criteria, array $orderBy = null)
 * @method COMPETENCE[]    findAll()
 * @method COMPETENCE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class COMPETENCERepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, COMPETENCE::class);
    }

    // /**
    //  * @return COMPETENCE[] Returns an array of COMPETENCE objects
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
    public function findOneBySomeField($value): ?COMPETENCE
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
