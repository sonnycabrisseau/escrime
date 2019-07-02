<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\utilisateur", inversedBy="lessons")
     */
    private $libelleUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\entrainement", inversedBy="lessons")
     */
    private $lessonEntrainement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getLibelleUtilisateur(): ?utilisateur
    {
        return $this->libelleUtilisateur;
    }

    public function setLibelleUtilisateur(?utilisateur $libelleUtilisateur): self
    {
        $this->libelleUtilisateur = $libelleUtilisateur;

        return $this;
    }

    public function getLessonEntrainement(): ?entrainement
    {
        return $this->lessonEntrainement;
    }

    public function setLessonEntrainement(?entrainement $lessonEntrainement): self
    {
        $this->lessonEntrainement = $lessonEntrainement;

        return $this;
    }
}
