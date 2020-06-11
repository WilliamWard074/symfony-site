<?php

namespace App\Repository;

use App\Entity\PageFragment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PageFragment|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageFragment|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageFragment[]    findAll()
 * @method PageFragment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageFragmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageFragment::class);
    }

    // /**
    //  * @return PageFragment[] Returns an array of PageFragment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PageFragment
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
