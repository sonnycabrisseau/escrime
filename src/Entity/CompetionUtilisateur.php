<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetionUtilisateurRepository")
 * @ApiResource()
 */
class CompetionUtilisateur
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
    private $resultat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competition", inversedBy="competitionResultat")
     */
    private $competition;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\utilisateur", inversedBy="CompetionUtilisateur")
     */
    private $resultatUtilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(string $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getResultatUtilisateur(): ?utilisateur
    {
        return $this->resultatUtilisateur;
    }

    public function setResultatUtilisateur(?utilisateur $resultatUtilisateur): self
    {
        $this->resultatUtilisateur = $resultatUtilisateur;

        return $this;
    }
}
