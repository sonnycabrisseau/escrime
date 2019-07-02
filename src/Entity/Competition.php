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

    public function __construct()
    {
        $this->competitionUtilisateur = new ArrayCollection();
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
     * @return Collection|utilisateur[]
     */
    public function getCompetitionUtilisateur(): Collection
    {
        return $this->competitionUtilisateur;
    }

    public function addCompetitionUtilisateur(utilisateur $competitionUtilisateur): self
    {
        if (!$this->competitionUtilisateur->contains($competitionUtilisateur)) {
            $this->competitionUtilisateur[] = $competitionUtilisateur;
        }

        return $this;
    }

    public function removeCompetitionUtilisateur(utilisateur $competitionUtilisateur): self
    {
        if ($this->competitionUtilisateur->contains($competitionUtilisateur)) {
            $this->competitionUtilisateur->removeElement($competitionUtilisateur);
        }

        return $this;
    }
}
