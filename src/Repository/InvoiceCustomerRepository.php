<?php

namespace App\Repository;

use App\Entity\InvoiceCustomer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvoiceCustomer|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceCustomer|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceCustomer[]    findAll()
 * @method InvoiceCustomer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceCustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvoiceCustomer::class);
    }

    // /**
    //  * @return InvoiceCustomer[] Returns an array of InvoiceCustomer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InvoiceCustomer
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
