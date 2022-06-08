<?php

namespace App\Repository;

use App\Entity\TarifsCoiffage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TarifsCoiffage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifsCoiffage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifsCoiffage[]    findAll()
 * @method TarifsCoiffage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifsCoiffageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifsCoiffage::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TarifsCoiffage $entity, bool $flush = true): void
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
    public function remove(TarifsCoiffage $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return TarifsCoiffage[] Returns an array of TarifsCoiffage objects
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
    public function findOneBySomeField($value): ?TarifsCoiffage
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