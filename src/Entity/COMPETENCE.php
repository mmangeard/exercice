<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\COMPETENCERepository")
 */
class COMPETENCE
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
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\OFFRE", mappedBy="competences")
     */
    private $oFFREs;

    public function __construct()
    {
        $this->oFFREs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|OFFRE[]
     */
    public function getOFFREs(): Collection
    {
        return $this->oFFREs;
    }

    public function addOFFRE(OFFRE $oFFRE): self
    {
        if (!$this->oFFREs->contains($oFFRE)) {
            $this->oFFREs[] = $oFFRE;
            $oFFRE->addCompetence($this);
        }

        return $this;
    }

    public function removeOFFRE(OFFRE $oFFRE): self
    {
        if ($this->oFFREs->contains($oFFRE)) {
            $this->oFFREs->removeElement($oFFRE);
            $oFFRE->removeCompetence($this);
        }

        return $this;
    }
}
