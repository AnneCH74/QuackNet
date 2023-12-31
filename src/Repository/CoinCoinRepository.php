<?php

namespace App\Repository;

use App\Entity\CoinCoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoinCoin>
 *
 * @method CoinCoin|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoinCoin|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoinCoin[]    findAll()
 * @method CoinCoin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoinCoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoinCoin::class);
    }

//    /**
//     * @return CoinCoin[] Returns an array of CoinCoin objects
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

//    public function findOneBySomeField($value): ?CoinCoin
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
