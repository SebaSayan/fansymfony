<?php

namespace App\Repository;

use App\Entity\TarifsEnfant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TarifsEnfant|null find($id, $lockMode = null, $lockVersion = null)
 * @method TarifsEnfant|null findOneBy(array $criteria, array $orderBy = null)
 * @method TarifsEnfant[]    findAll()
 * @method TarifsEnfant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TarifsEnfantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TarifsEnfant::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TarifsEnfant $entity, bool $flush = true): void
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
    public function remove(TarifsEnfant $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return TarifsEnfant[] Returns an array of TarifsEnfant objects
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
    public function findOneBySomeField($value): ?TarifsEnfant
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
