<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Student|null find($id, $lockMode = null, $lockVersion = null)
 * @method Student|null findOneBy(array $criteria, array $orderBy = null)
 * @method Student[]    findAll()
 * @method Student[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    // /**
    //  * @return Student[] Returns an array of Student objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Student
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function adet(int $id)
    {
        $conn = $this->getEntityManager()->getConnection();
        
        $sql ="SELECT COUNT(*) as adet FROM student_lesson WHERE student_id='$id' ";

        $stmt = $conn->prepare($sql);
        $sonuc=$stmt->executeQuery(array())->fetchAllAssociative();         
        return $sonuc[0];
        
    }

    public function toplamAdet()
    {
        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) as adet FROM student");
        $sonuc=$stmt->executeQuery(array())->fetchAllAssociative();         
        return $sonuc[0];
    }

}
