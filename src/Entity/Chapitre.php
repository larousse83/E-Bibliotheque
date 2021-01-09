<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
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

    public function getOuvrage(): ?Ouvrage
    {
        return $this->ouvrage;
    }

    public function setOuvrage(?Ouvrage $ouvrage): self
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }
}
