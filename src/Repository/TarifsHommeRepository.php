<?php

namespace App\Repository;

use App\Entity\TarifsHomme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TarifsHomme|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifsHomme|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifsHomme[]    findAll()
 * @method TarifsHomme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifsHommeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifsHomme::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TarifsHomme $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TarifsHomme $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return TarifsHomme[] Returns an array of TarifsHomme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TarifsHomme
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
