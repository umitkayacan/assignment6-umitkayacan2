<?php

namespace App\Controller;
use App\Entity\Lesson;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LessonsController extends AbstractController
{
    /**
     * @Route("/lessons", name="lessons")
     */
    public function index(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Lesson::class);
        $dersler=$repo->findAll();
        return $this->render('sayfalar/dersler.html.twig',[
            'dersler'=>$dersler,
            'title' =>"Dersler ",
        ]);
    }

    /**
     * @Route("/lessons/add", name="lessonsAdd")
     */
    public function lessonsAdd(): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        
        $ders1=new Lesson();
        $ders1->setCoursename("Kurs Adı");
        $ders1->setLessoncode(78541);
        $ders1->setLessondesc("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");

        $ogrenci1=new Student();
        $ogrenci1->setName('Öğrenci Adı');
        $ogrenci1->setSurname('Soyadı');
        $ogrenci1->setNumber(8410);

        $ders1->addStudent($ogrenci1);
        $ogrenci1->addLesson($ders1);



        $entityManager->persist($ders1);
        $entityManager->persist($ogrenci1);
        $entityManager->flush();
        return new Response("Öğrenci ve Ders Eklendi, Birbiri ile İlişkilendirildi");
    }



     /**
     * @Route("/lessons/assign/{dersId}/{ogrenciId}", name="lessonsAssign")
     */
    public function lessonsAssign($dersId,$ogrenciId): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        $ders=$entityManager->getRepository(Lesson::class)->find($dersId);
        $ogrenci=$entityManager->getRepository(Student::class)->find($ogrenciId);
        $ders->addStudent($ogrenci);
        $ogrenci->addLesson($ders);
        $entityManager->persist($ogrenci);
        $entityManager->persist($ders);
        $entityManager->flush();
        return new Response("Öğrenciye'e Ders Atandı ");
    }



    /**
     * @Route("/lessons/detail/{id}", name="lessonsDetail")
     */
    public function lessonsDetail(Lesson $ders): Response
    {
        $ogrenciler=$ders->getStudents();
        $akademisyenBilgisi=$ders->getAcademician();

        return $this->render('sayfalar/dersDetay.html.twig', [
            'dersBilgisi' =>$ders,
            'ogrenciler' =>$ogrenciler,
            'akademisyenBilgisi' =>$akademisyenBilgisi
        ]);
    }
}
