<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section extends ElementFavorisable
{
    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="sections")
     * @ORM\JoinColumn(nullable=true)
     */
    private $section;

    /**
     * @ORM\OneToMany(targetEntity=Section::class, mappedBy="section", orphanRemoval=true)
     */
    private $sections;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitre::class, inversedBy="sections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

    public function __construct()
    {
        parent::__construct();
        $this->sections = new ArrayCollection();
    }

    public function getSection(): ?self
    {
        return $this->section;
    }

    public function setSection(?self $section): self
    {
        $this->section = $section;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(self $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setSection($this);
        }

        return $this;
    }

    public function removeSection(self $section): self
    {
        if ($this->sections->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getSection() === $this) {
                $section->setSection(null);
            }
        }

        return $this;
    }

    public function getChapitre(): ?Chapitre
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitre $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }

    public function __toString(){

        return $this->getTitre();
    }
}
