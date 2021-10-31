<?php

namespace App\Controller;
use App\Entity\Academician;
use App\Entity\Lesson;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcademiciansController extends AbstractController
{
    /**
     * @Route("/academicians", name="academicians")
     */
    public function index(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Academician::class);
        $akademisyenler=$repo->findAll();
        return $this->render('sayfalar/akademisyenler.html.twig',[
            'akademisyenler'=>$akademisyenler,
            'title' =>"Akademisyenler ",
        ]);
    }


     /**
     * @Route("/academicians/add", name="academiciansAdd")
     */
    public function academiciansAdd(): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        
        $ders1=new Lesson();
        $ders1->setCoursename("Kurs Adı");
        $ders1->setLessoncode(1234);
        $ders1->setLessondesc("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");

        $akademisyen1=new Academician();
        $akademisyen1->setName('Akademisyen Adı');
        $akademisyen1->setSurname('Soyadı');
        $akademisyen1->setProvince("Yazılım");
        $akademisyen1->addLesson($ders1);  

        $entityManager->persist($ders1);
        $entityManager->persist($akademisyen1);
        $entityManager->flush();
        return new Response("Akademisyen Eklendi");
    }


    /**
     * @Route("/academicians/assign/{akademisyenId}/{dersId}", name="academiciansAssign")
     */
    public function academiciansAssign($akademisyenId,$dersId): Response
    {
        $entityManager=$this->getDoctrine()->getManager();
        $akademisyen=$entityManager->getRepository(Academician::class)->find($akademisyenId);
        $ders=$entityManager->getRepository(Lesson::class)->find($dersId);
        $akademisyen->addLesson($ders);
        $entityManager->persist($akademisyen);
        $entityManager->flush();
        return new Response("Akademisyen'e Ders Atandı ");
    }


    /**
     * @Route("/academicians/detail/{id}", name="academiciansDetail")
     */
    public function academiciansDetail(Academician $akademisyen): Response
    {
        $dersler=$akademisyen->getLessons();
        return $this->render('sayfalar/akademisyenDetay.html.twig', [
			'akademisyenBilgisi' =>$akademisyen,
            'verdigiDersler' =>$dersler
        ]);
    }




}
