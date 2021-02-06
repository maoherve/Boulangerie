<?php

namespace App\Repository;

use App\Entity\HomeTexte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HomeTexte|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeTexte|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeTexte[]    findAll()
 * @method HomeTexte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeTexteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HomeTexte::class);
    }

    // /**
    //  * @return HomeTexte[] Returns an array of HomeTexte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HomeTexte
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
