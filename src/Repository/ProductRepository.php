<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

       /**
        * @return Product[] Returns an array of Product objects
        */
       public function findByEntityId($value): array
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.entity_id = :val')
               ->setParameter('val', $value)
               ->orderBy('p.id', 'ASC')
               ->setMaxResults(10)
               ->getQuery()
               ->getResult()
           ;
       }

       public function findOneByEntityId($value): ?Product
       {
           return $this->createQueryBuilder('p')
               ->andWhere('p.entity_id = :val')
               ->setParameter('val', $value)
               ->getQuery()
               ->getOneOrNullResult()
           ;
       }
}
