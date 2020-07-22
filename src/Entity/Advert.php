<?php

namespace App\Entity;

use App\Repository\AdvertRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 */
class Advert
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * in centimes
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sellPrice;

    /**
     * in centimes
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rentPrice;

    /**
     * @ORM\ManyToOne(targetEntity=AdvertKind::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $advertKind;

    public function __toString()
    {
        return (string) $this->getTitle();
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

    /*
     * in centimes
     */
    public function getSellPrice(): ?int
    {
        return $this->sellPrice;
    }

    public function setSellPrice(?int $sellPrice): self
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    /*
     * in centimes
     */
    public function getRentPrice(): ?int
    {
        return $this->rentPrice;
    }

    public function setRentPrice(?int $rentPrice): self
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    public function getAdvertKind(): ?AdvertKind
    {
        return $this->advertKind;
    }

    public function setAdvertKind(?AdvertKind $advertKind): self
    {
        $this->advertKind = $advertKind;

        return $this;
    }
}
