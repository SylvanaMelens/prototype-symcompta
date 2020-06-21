<?php

namespace App\Repository;

use App\Entity\VatDeclaration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VatDeclaration|null find($id, $lockMode = null, $lockVersion = null)
 * @method VatDeclaration|null findOneBy(array $criteria, array $orderBy = null)
 * @method VatDeclaration[]    findAll()
 * @method VatDeclaration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VatDeclarationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VatDeclaration::class);
    }

    // /**
    //  * @return VatDeclaration[] Returns an array of VatDeclaration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VatDeclaration
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
