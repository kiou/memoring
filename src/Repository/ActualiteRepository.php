<?php

namespace App\Repository;

use App\Entity\Actualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Actualite>
 *
 * @method Actualite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actualite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actualite[]    findAll()
 * @method Actualite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actualite::class);
    }

    public function add(Actualite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Actualite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getLastActualite()
    {
        $qb = $this->createQueryBuilder('a');

        $qb->andWhere('a.isActive =  :isActive')
            ->setParameter('isActive', true)
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(1);
   
        return $qb->getQuery()->getResult();
    }

    public function getNextActualite()
    {
        $qb = $this->createQueryBuilder('a');

        $qb->andWhere('a.isActive =  :isActive')
            ->setParameter('isActive', true)
            ->orderBy('a.id', 'DESC')
            ->setFirstResult(1)
            ->setMaxResults(3);
   
        return $qb->getQuery()->getResult();
    }

}
