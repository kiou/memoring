<?php

namespace App\Repository;

use App\Entity\Youtube;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Youtube>
 *
 * @method Youtube|null find($id, $lockMode = null, $lockVersion = null)
 * @method Youtube|null findOneBy(array $criteria, array $orderBy = null)
 * @method Youtube[]    findAll()
 * @method Youtube[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YoutubeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Youtube::class);
    }

    public function add(Youtube $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Youtube $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getLastVideo()
    {
        $qb = $this->createQueryBuilder('y');

        $qb->andWhere('y.isActive =  :isActive')
            ->setParameter('isActive', true)
            ->orderBy('y.id', 'DESC')
            ->setMaxResults(1);
   
        return $qb->getQuery()->getResult();
    }

    public function getNextVideo()
    {
        $qb = $this->createQueryBuilder('y');

        $qb->andWhere('y.isActive =  :isActive')
            ->setParameter('isActive', true)
            ->orderBy('y.id', 'DESC')
            ->setFirstResult(1)
            ->setMaxResults(2);
   
        return $qb->getQuery()->getResult();
    }

}
