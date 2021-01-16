<?php

namespace App\Entity;

use App\Repository\AbonnementRepository;
use DateInterval;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbonnementRepository::class)
 */
class Abonnement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", options={"default":"CURRENT_TIMESTAMP"})
     */
    private $dateAbonnement;

    /**
     * @ORM\Column(type="datetime", options={"default":"CURRENT_TIMESTAMP"})
     */
    private $dateLastRenouvellement;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="abonnements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Ouvrage::class, inversedBy="abonnements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ouvrage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAbonnement(): ?\DateTimeInterface
    {
        return $this->dateAbonnement;
    }

    public function setDateAbonnement(\DateTimeInterface $dateAbonnement): self
    {
        $this->dateAbonnement = $dateAbonnement->add(new DateInterval('P1Y'));
;

        return $this;
    }

    public function getDateLastRenouvellement(): ?\DateTimeInterface
    {
        return $this->dateLastRenouvellement;
    }

    public function setDateLastRenouvellement(\DateTimeInterface $dateLastRenouvellement): self
    {
        $this->dateLastRenouvellement = $dateLastRenouvellement;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
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
}
