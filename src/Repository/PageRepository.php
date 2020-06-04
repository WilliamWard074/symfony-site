<?php

namespace App\Repository;

use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Page|null find($id, $lockMode = null, $lockVersion = null)
 * @method Page|null findOneBy(array $criteria, array $orderBy = null)
 * @method Page[]    findAll()
 * @method Page[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function getSitemapPages()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.active = :active')
            ->setParameter('active', true)
            ->andWhere('p.showInSitemap = :showInSitemap')
            ->setParameter('showInSitemap', true)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByRoute($route)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.active = :active')
            ->setParameter('active', true)
            ->andWhere('p.route = :route')
            ->setParameter('route', $route)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }

    public function getMenuPages()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.active = :active')
            ->setParameter('active', true)
            ->andWhere('p.showInMenu = :showInMenu')
            ->setParameter('showInMenu', true)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getDefaultPageByRoute($route)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.active = :active')
            ->setParameter('active', true)
            ->andWhere('p.route = :route')
            ->setParameter('route', $route)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
}
