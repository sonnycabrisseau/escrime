<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RoleUser", inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $keyRoleUser;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Entrainement", mappedBy="entrainementUtilisateur")
     */
    private $entrainements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lesson", mappedBy="libelleUtilisateur")
     */
    private $lessons;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Competition", mappedBy="competitionUtilisateur")
     */
    private $competitions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objectif", mappedBy="utilisateur")
     */
    private $utilisateurObjectif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompetionUtilisateur", mappedBy="resultatUtilisateur")
     */
    private $competionUtilisateurs;

    public function __construct()
    {
        $this->entrainements = new ArrayCollection();
        $this->lessons = new ArrayCollection();
        $this->competitions = new ArrayCollection();
        $this->utilisateurObjectif = new ArrayCollection();
        $this->competionUtilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getKeyRoleUser(): ?roleUser
    {
        return $this->keyRoleUser;
    }

    public function setKeyRoleUser(?roleUser $keyRoleUser): self
    {
        $this->keyRoleUser = $keyRoleUser;

        return $this;
    }

    /**
     * @return Collection|Entrainement[]
     */
    public function getEntrainements(): Collection
    {
        return $this->entrainements;
    }

    public function addEntrainement(Entrainement $entrainement): self
    {
        if (!$this->entrainements->contains($entrainement)) {
            $this->entrainements[] = $entrainement;
            $entrainement->addEntrainementUtilisateur($this);
        }

        return $this;
    }

    public function removeEntrainement(Entrainement $entrainement): self
    {
        if ($this->entrainements->contains($entrainement)) {
            $this->entrainements->removeElement($entrainement);
            $entrainement->removeEntrainementUtilisateur($this);
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
            $lesson->setLibelleUtilisateur($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->contains($lesson)) {
            $this->lessons->removeElement($lesson);
            // set the owning side to null (unless already changed)
            if ($lesson->getLibelleUtilisateur() === $this) {
                $lesson->setLibelleUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competition[]
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions[] = $competition;
            $competition->addCompetitionUtilisateur($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->contains($competition)) {
            $this->competitions->removeElement($competition);
            $competition->removeCompetitionUtilisateur($this);
        }

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection|objectif[]
     */
    public function getUtilisateurObjectif(): Collection
    {
        return $this->utilisateurObjectif;
    }

    public function addUtilisateurObjectif(objectif $utilisateurObjectif): self
    {
        if (!$this->utilisateurObjectif->contains($utilisateurObjectif)) {
            $this->utilisateurObjectif[] = $utilisateurObjectif;
            $utilisateurObjectif->setUtilisateur($this);
        }

        return $this;
    }

    public function removeUtilisateurObjectif(objectif $utilisateurObjectif): self
    {
        if ($this->utilisateurObjectif->contains($utilisateurObjectif)) {
            $this->utilisateurObjectif->removeElement($utilisateurObjectif);
            // set the owning side to null (unless already changed)
            if ($utilisateurObjectif->getUtilisateur() === $this) {
                $utilisateurObjectif->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection|CompetionUtilisateur[]
     */
    public function getCompetionUtilisateurs(): Collection
    {
        return $this->competionUtilisateurs;
    }

    public function addCompetionUtilisateur(CompetionUtilisateur $competionUtilisateur): self
    {
        if (!$this->competionUtilisateurs->contains($competionUtilisateur)) {
            $this->competionUtilisateurs[] = $competionUtilisateur;
            $competionUtilisateur->setResultatUtilisateur($this);
        }

        return $this;
    }

    public function removeCompetionUtilisateur(CompetionUtilisateur $competionUtilisateur): self
    {
        if ($this->competionUtilisateurs->contains($competionUtilisateur)) {
            $this->competionUtilisateurs->removeElement($competionUtilisateur);
            // set the owning side to null (unless already changed)
            if ($competionUtilisateur->getResultatUtilisateur() === $this) {
                $competionUtilisateur->setResultatUtilisateur(null);
            }
        }

        return $this;
    }
}
