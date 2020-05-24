<?php

namespace App\Repository;

use App\Entity\HomepageSlider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HomepageSlider|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomepageSlider|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomepageSlider[]    findAll()
 * @method HomepageSlider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomepageSliderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HomepageSlider::class);
    }
    
    public function findAll()
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.active = :active')
            ->setParameter('active', true)
            ->getQuery()
            ->getResult()
        ;
    }
}
