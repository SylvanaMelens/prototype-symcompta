<?php

namespace App\Repository;

use App\Entity\InvoiceProvider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvoiceProvider|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceProvider|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceProvider[]    findAll()
 * @method InvoiceProvider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceProviderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvoiceProvider::class);
    }

    // /**
    //  * @return InvoiceProvider[] Returns an array of InvoiceProvider objects
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
    public function findOneBySomeField($value): ?InvoiceProvider
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
