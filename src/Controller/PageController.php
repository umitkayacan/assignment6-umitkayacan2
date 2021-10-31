<?php


namespace App\Controller;

use App\Entity\Academician;
use App\Entity\Lesson;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="anasayfa")
     */
    public function index(): Response
    {
        $entityManager=$this->getDoctrine()->getManager();


        $entityManager=$this->getDoctrine();
        $akademisyen=$entityManager->getRepository(Academician::class);   
        $ders=$entityManager->getRepository(Lesson::class);   
        $ogrenci=$entityManager->getRepository(Student::class);   


        return $this->render('sayfalar/index.html.twig', [
            'title' =>"Anasayfa ",
            'akademisyenAdet' =>$akademisyen->toplamAdet()["adet"],
            'dersAdet' =>$ders->toplamAdet()["adet"],
            'ogrenciAdet' =>$ogrenci->toplamAdet()["adet"]
        ]);
    }
}
