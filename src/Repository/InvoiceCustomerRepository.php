<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\InvoiceCustomer;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    public function findNextNum(User $user){
        return $this->createQueryBuilder("invoice")
                    ->select("invoice.invoiceCustomerNum")
                    ->join("invoice.invoiceCustomerClient", "c")
                    ->where("c.user = :user")
                    ->setParameter("user", $user)
                    ->orderBy("invoice.invoiceCustomerNum", "DESC")
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getSingleScalarResult() + 1;


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
