<?php

namespace App\Entity;

use App\Repository\LessonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LessonRepository::class)
 */
class Lesson
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coursename;

    /**
     * @ORM\Column(type="integer")
     */
    private $lessoncode;

    /**
     * @ORM\Column(type="text")
     */
    private $lessondesc;

    /**
     * @ORM\ManyToOne(targetEntity=Academician::class, inversedBy="lessons")
     */
    private $academician;

    /**
     * @ORM\ManyToMany(targetEntity=Student::class, mappedBy="lesson")
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursename(): ?string
    {
        return $this->coursename;
    }

    public function setCoursename(string $coursename): self
    {
        $this->coursename = $coursename;

        return $this;
    }

    public function getLessoncode(): ?int
    {
        return $this->lessoncode;
    }

    public function setLessoncode(int $lessoncode): self
    {
        $this->lessoncode = $lessoncode;

        return $this;
    }

    public function getLessondesc(): ?string
    {
        return $this->lessondesc;
    }

    public function setLessondesc(string $lessondesc): self
    {
        $this->lessondesc = $lessondesc;

        return $this;
    }

    public function getAcademician(): ?Academician
    {
        return $this->academician;
    }

    public function setAcademician(?Academician $academician): self
    {
        $this->academician = $academician;

        return $this;
    }

    /**
     * @return Collection|Student[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
            $student->addLesson($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->students->removeElement($student)) {
            $student->removeLesson($this);
        }

        return $this;
    }
}
