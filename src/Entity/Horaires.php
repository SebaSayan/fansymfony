<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HorairesRepository::class)
 */
class Horaires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ouverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fermeture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getOuverture(): ?string
    {
        return $this->ouverture;
    }

    public function setOuverture(string $ouverture): self
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    public function getFermeture(): ?string
    {
        return $this->fermeture;
    }

    public function setFermeture(string $fermeture): self
    {
        $this->fermeture = $fermeture;

        return $this;
    }
}
