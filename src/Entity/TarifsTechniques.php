<?php

namespace App\Entity;

use App\Repository\TarifsTechniquesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifsTechniquesRepository::class)
 */
class TarifsTechniques
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
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $priceMax;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fromTo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceMax(): ?string
    {
        return $this->priceMax;
    }

    public function setPriceMax(string $priceMax): self
    {
        $this->priceMax = $priceMax;

        return $this;
    }

    public function getFromTo(): ?bool
    {
        return $this->fromTo;
    }

    public function setFromTo(bool $fromTo): self
    {
        $this->fromTo = $fromTo;

        return $this;
    }
}