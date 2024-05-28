<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $entity_id = null;

    #[ORM\Column(length: 255)]
    private ?string $category_name = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shortdesc = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brand = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $rating = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $caffeine_type = null;

    #[ORM\Column]
    private ?int $count = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $flavored = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $seasonal = null;

    #[ORM\Column]
    private ?bool $in_stock = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $facebook = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $iskcup = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntityId(): ?int
    {
        return $this->entity_id;
    }

    public function setEntityId(int $entity_id): static
    {
        $this->entity_id = $entity_id;

        return $this;
    }

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): static
    {
        $this->category_name = $category_name;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getShortdesc(): ?string
    {
        return $this->shortdesc;
    }

    public function setShortdesc(?string $shortdesc): static
    {
        $this->shortdesc = $shortdesc;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getCaffeineType(): ?string
    {
        return $this->caffeine_type;
    }

    public function setCaffeineType(?string $caffeine_type): static
    {
        $this->caffeine_type = $caffeine_type;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }

    public function getFlavored(): ?string
    {
        return $this->flavored;
    }

    public function setFlavored(?string $flavored): static
    {
        $this->flavored = $flavored;

        return $this;
    }

    public function getSeasonal(): ?string
    {
        return $this->seasonal;
    }

    public function setSeasonal(?string $seasonal): static
    {
        $this->seasonal = $seasonal;

        return $this;
    }

    public function isInStock(): ?bool
    {
        return $this->in_stock;
    }

    public function setInStock(bool $in_stock): static
    {
        $this->in_stock = $in_stock;

        return $this;
    }

    public function getFacebook(): ?int
    {
        return $this->facebook;
    }

    public function setFacebook(?int $facebook): static
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getIskcup(): ?string
    {
        return $this->iskcup;
    }

    public function setIskcup(?string $iskcup): static
    {
        $this->iskcup = $iskcup;

        return $this;
    }
}
