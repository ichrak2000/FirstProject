<?php

namespace App\Repository;

use App\Entity\Author1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Author1>
 *
 * @method Author1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Author1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Author1[]    findAll()
 * @method Author1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Author1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author1::class);
    }

//    /**
//     * @return Author1[] Returns an array of Author1 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Author1
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
