<?php

namespace App\Controller;
use App\Entity\Student;
use App\Entity\Lesson;
use App\Entity\Academician;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentsController extends AbstractController
{
    /**
     * @Route("/students", name="students")
     */
    public function index(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Student::class);
        $ogrenciler=$repo->findAll();
        return $this->render('sayfalar/ogrenciler.html.twig',[
            'ogrenciler'=>$ogrenciler,
            'title' =>"Öğrenciler ",
        ]);
    }



     /**
     * @Route("/students/add", name="studentsAdd")
     */
    public function studentsAdd(): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        
        $ders1=new Lesson();
        $ders1->setCoursename("Kurs Adı");
        $ders1->setLessoncode(448);
        $ders1->setLessondesc("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");

        $ogrenci1=new Student();
        $ogrenci1->setName('Öğrenci Adı');
        $ogrenci1->setSurname('Soyadı');
        $ogrenci1->setNumber(45631);
        $ogrenci1->addLesson($ders1);  

        $akademisyen1=new Academician();
        $akademisyen1->setName('Akademisyen Adı');
        $akademisyen1->setSurname('Soyadı');
        $akademisyen1->setProvince("Yazılım");
        $akademisyen1->addLesson($ders1);  

        $entityManager->persist($ders1);
        $entityManager->persist($ogrenci1);
        $entityManager->persist($akademisyen1);

        $entityManager->flush();
        return new Response("Öğrenci  Eklendi");
    }


    /**
     * @Route("/students/detail/{id}", name="studentsDetail")
     */
    public function studentsDetail(Student $ogrenci): Response
    {
        $entityManager=$this->getDoctrine();
        $repo=$entityManager->getRepository(Student::class);       

        $dersler=$ogrenci->getLesson();
        return $this->render('sayfalar/ogrenciDetay.html.twig', [
            'ogrenciBilgisi' =>$ogrenci,
            'dersler' =>$dersler,
            'adet' =>$repo->adet($ogrenci->getId())["adet"]

        ]);
    }
}
