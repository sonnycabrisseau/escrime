<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 *  @ApiResource()
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="lessons")
     */
    private $libelleUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="lessons")
     */
    private $libelleMaitreArme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entrainement", inversedBy="lessons")
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

    public function __toString()
    {
        return $this->libelle;
    }

    /**
     * Get the value of libelleMaitreArme
     */ 
    public function getLibelleMaitreArme()
    {
        return $this->libelleMaitreArme;
    }

    /**
     * Set the value of libelleMaitreArme
     *
     * @return  self
     */ 
    public function setLibelleMaitreArme($libelleMaitreArme)
    {
        $this->libelleMaitreArme = $libelleMaitreArme;

        return $this;
    }
}
