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
     * @ORM\Column(type="integer")
     */
    private $sellPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $rentPrice;

    /**
     * @ORM\ManyToOne(targetEntity=AdvertType::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $advertType;

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

    public function getSellPrice(): ?int
    {
        return $this->sellPrice;
    }

    public function setSellPrice(int $sellPrice): self
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    public function getRentPrice(): ?int
    {
        return $this->rentPrice;
    }

    public function setRentPrice(int $rentPrice): self
    {
        $this->rentPrice = $rentPrice;

        return $this;
    }

    public function getAdvertType(): ?AdvertType
    {
        return $this->advertType;
    }

    public function setAdvertType(?AdvertType $advertType): self
    {
        $this->advertType = $advertType;

        return $this;
    }
}
