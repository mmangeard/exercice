<?php

namespace App\Repository;

use App\Entity\CONTRAT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CONTRAT|null find($id, $lockMode = null, $lockVersion = null)
 * @method CONTRAT|null findOneBy(array $criteria, array $orderBy = null)
 * @method CONTRAT[]    findAll()
 * @method CONTRAT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CONTRATRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CONTRAT::class);
    }

    // /**
    //  * @return CONTRAT[] Returns an array of CONTRAT objects
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
    public function findOneBySomeField($value): ?CONTRAT
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
