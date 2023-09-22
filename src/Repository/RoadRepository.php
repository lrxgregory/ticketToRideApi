<?php

namespace App\Repository;

use App\Entity\Road;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Road>
 *
 * @method Road|null find($id, $lockMode = null, $lockVersion = null)
 * @method Road|null findOneBy(array $criteria, array $orderBy = null)
 * @method Road[]    findAll()
 * @method Road[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Road::class);
    }

    public function save(Road $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Road $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getRoad($start, $end)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('(d.start = :start AND d.end = :end) OR (d.start = :end AND d.end = :start)')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getQuery()
            ->getResult();
    }

    public function getRoadWithStartOnly($start)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('(d.start = :start) OR (d.end = :start)')
            ->setParameter('start', $start)
            ->getQuery()
            ->getResult();
    }

    public function getRoadWithLocomitiveRequired($locomotive)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.locomotive = :locomotive')
            ->setParameter('locomotive', $locomotive)
            ->getQuery()
            ->getResult();
    }

    public function getRoadByWagonNumberValue($wagonNumber)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.wagonNumber = :wagonNumber')
            ->setParameter('wagonNumber', $wagonNumber)
            ->getQuery()
            ->getResult();
    }

    public function getRoadsByScore($score)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.score = :score')
            ->setParameter('score', $score)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Road[] Returns an array of Road objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Road
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
