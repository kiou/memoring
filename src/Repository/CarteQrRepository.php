<?php

namespace App\Repository;

use App\Entity\CarteQr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarteQr>
 *
 * @method CarteQr|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteQr|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteQr[]    findAll()
 * @method CarteQr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteQrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteQr::class);
    }

    public function save(CarteQr $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CarteQr $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CarteQr[] Returns an array of CarteQr objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function findOrange($idcarte, $couleur)
    {
        $qb = $this->createQueryBuilder('c');

        $qb->andWhere('c.idcarte = :idcarte')
        ->setParameter('idcarte', $idcarte);

        $qb->andWhere('c.couleur = :couleur')
        ->setParameter('couleur', $couleur);

        return $qb->getQuery()->getSingleResult();
    
    }
}
