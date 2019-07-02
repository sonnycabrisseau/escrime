<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetitionRepository")
 */
class Competition
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
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\utilisateur", inversedBy="competitions")
     */
    private $competitionUtilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\competionUtilisateur", mappedBy="competition")
     */
    private $competitionResultat;

    public function __construct()
    {
        
        $this->competitionResultat = new ArrayCollection();
    }

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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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

 

    /**
     * @return Collection|competionUtilisateur[]
     */
    public function getCompetitionResultat(): Collection
    {
        return $this->competitionResultat;
    }

    public function addCompetitionResultat(competionUtilisateur $competitionResultat): self
    {
        if (!$this->competitionResultat->contains($competitionResultat)) {
            $this->competitionResultat[] = $competitionResultat;
            $competitionResultat->setCompetition($this);
        }

        return $this;
    }

    public function removeCompetitionResultat(competionUtilisateur $competitionResultat): self
    {
        if ($this->competitionResultat->contains($competitionResultat)) {
            $this->competitionResultat->removeElement($competitionResultat);
            // set the owning side to null (unless already changed)
            if ($competitionResultat->getCompetition() === $this) {
                $competitionResultat->setCompetition(null);
            }
        }

        return $this;
    }
}
