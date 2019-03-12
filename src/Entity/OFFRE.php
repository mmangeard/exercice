<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OFFRERepository")
 */
class OFFRE
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CONTRAT", inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idContrat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\JOB", inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idJob;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CANDIDATURE", mappedBy="idOffre")
     */
    private $candidatures;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\COMPETENCE", inversedBy="oFFREs")
     */
    private $competences;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getIdContrat(): ?CONTRAT
    {
        return $this->idContrat;
    }

    public function setIdContrat(?CONTRAT $idContrat): self
    {
        $this->idContrat = $idContrat;

        return $this;
    }

    public function getIdJob(): ?JOB
    {
        return $this->idJob;
    }

    public function setIdJob(?JOB $idJob): self
    {
        $this->idJob = $idJob;

        return $this;
    }

    /**
     * @return Collection|CANDIDATURE[]
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(CANDIDATURE $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setIdOffre($this);
        }

        return $this;
    }

    public function removeCandidature(CANDIDATURE $candidature): self
    {
        if ($this->candidatures->contains($candidature)) {
            $this->candidatures->removeElement($candidature);
            // set the owning side to null (unless already changed)
            if ($candidature->getIdOffre() === $this) {
                $candidature->setIdOffre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|COMPETENCE[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(COMPETENCE $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(COMPETENCE $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
        }

        return $this;
    }
}
