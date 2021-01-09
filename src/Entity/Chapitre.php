<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapitreRepository::class)
 */
class Chapitre extends ElementFavorisable
{
    /**
     * @ORM\ManyToOne(targetEntity=Ouvrage::class, inversedBy="chapitres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ouvrage;

    /**
     * @ORM\OneToMany(targetEntity=Section::class, mappedBy="chapitre", orphanRemoval=true)
     */
    private $sections;

    public function __construct()
    {
        parent::__construct();
        $this->sections = new ArrayCollection();
    }

    public function getOuvrage(): ?Ouvrage
    {
        return $this->ouvrage;
    }

    public function setOuvrage(?Ouvrage $ouvrage): self
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setChapitre($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getChapitre() === $this) {
                $section->setChapitre(null);
            }
        }

        return $this;
    }

    public function __toString(){

        return $this->getTitre();
    }
}
