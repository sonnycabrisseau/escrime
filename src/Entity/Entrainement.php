<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrainementRepository")
 */
class Entrainement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $lieu;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", inversedBy="entrainements")
     */
    private $entrainementUtilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lesson", mappedBy="lessonEntrainement")
     */
    private $lessons;

    public function __construct()
    {
        $this->entrainementUtilisateur = new ArrayCollection();
        $this->lessons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection|utilisateur[]
     */
    public function getEntrainementUtilisateur(): Collection
    {
        return $this->entrainementUtilisateur;
    }

    public function addEntrainementUtilisateur(utilisateur $entrainementUtilisateur): self
    {
        if (!$this->entrainementUtilisateur->contains($entrainementUtilisateur)) {
            $this->entrainementUtilisateur[] = $entrainementUtilisateur;
        }

        return $this;
    }

    public function removeEntrainementUtilisateur(utilisateur $entrainementUtilisateur): self
    {
        if ($this->entrainementUtilisateur->contains($entrainementUtilisateur)) {
            $this->entrainementUtilisateur->removeElement($entrainementUtilisateur);
        }

        return $this;
    }

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setLessonEntrainement($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getLessonEntrainement() === $this) {
                $lesson->setLessonEntrainement(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->lieu;
    }
    
}
