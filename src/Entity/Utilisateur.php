<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 * @ApiResource()
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Entrainement", mappedBy="entrainementUtilisateur")
     */
    private $entrainements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lesson", mappedBy="libelleUtilisateur")
     */
    private $lessons;

    /*a supp @ORM\ManyToMany(targetEntity="App\Entity\Competition", mappedBy="CompetionUtilisateur")*/

    private $competitions;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objectif", mappedBy="utilisateur")
     */
    private $utilisateurObjectif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompetionUtilisateur", mappedBy="resultatUtilisateur")
     */
    private $CompetionUtilisateurs;

    public function __construct()
    {
        $this->entrainements = new ArrayCollection();
        $this->lessons = new ArrayCollection();
        $this->competitions = new ArrayCollection();
        $this->utilisateurObjectif = new ArrayCollection();
        $this->CompetionUtilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $competition->addCompetionUtilisateur($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competitions->contains($competition)) {
            $this->competitions->removeElement($competition);
            $competition->removeCompetionUtilisateur($this);
        }

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
        return $this->username;
    }

    /**
     * @return Collection|CompetionUtilisateur[]
     */
    public function getCompetionUtilisateurs(): Collection
    {
        return $this->CompetionUtilisateurs;
    }

    public function addCompetionUtilisateur(CompetionUtilisateur $CompetionUtilisateur): self
    {
        if (!$this->CompetionUtilisateurs->contains($CompetionUtilisateur)) {
            $this->CompetionUtilisateurs[] = $CompetionUtilisateur;
            $CompetionUtilisateur->setResultatUtilisateur($this);
        }

        return $this;
    }

    public function removeCompetionUtilisateur(CompetionUtilisateur $CompetionUtilisateur): self
    {
        if ($this->CompetionUtilisateurs->contains($CompetionUtilisateur)) {
            $this->CompetionUtilisateurs->removeElement($CompetionUtilisateur);
            // set the owning side to null (unless already changed)
            if ($CompetionUtilisateur->getResultatUtilisateur() === $this) {
                $CompetionUtilisateur->setResultatUtilisateur(null);
            }
        }

        return $this;
    }

    public function getRoles(): array
        {
            $roles = $this->roles;
            // guarantee every user at least has ROLE_USER
            $roles[] = 'ROLE_USER';

            return array_unique($roles);
        }

    

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }
}
