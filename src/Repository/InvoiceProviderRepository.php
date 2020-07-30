<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\InvoiceProvider;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    
    public function findNextNum(User $user){
        return $this->createQueryBuilder("invoice")
                    ->select("invoice.invoiceProviderNum")
                    ->join("invoice.invoiceProviderName", "p")
                    ->where("p.user = :user")
                    ->setParameter("user", $user)
                    ->orderBy("invoice.invoiceProviderNum", "DESC")
                    ->setMaxResults(1)
                    ->getQuery()
                    ->getSingleScalarResult() + 1;


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
