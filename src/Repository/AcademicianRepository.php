<?php

namespace App\Repository;

use App\Entity\Academician;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Academician|null find($id, $lockMode = null, $lockVersion = null)
 * @method Academician|null findOneBy(array $criteria, array $orderBy = null)
 * @method Academician[]    findAll()
 * @method Academician[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcademicianRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Academician::class);
    }

    // /**
    //  * @return Academician[] Returns an array of Academician objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Academician
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function toplamAdet()
    {
        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as adet FROM academician");
        $sonuc=$stmt->executeQuery(array())->fetchAllAssociative();         
        return $sonuc[0];
    }



}
