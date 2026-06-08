<?php

namespace App\Entity;

use App\Repository\StoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoreRepository::class)]
class Store
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $location_city = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 8, nullable: true)]
    private ?string $location_lat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 11, scale: 8, nullable: true)]
    private ?string $location_long = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $location_adress = null;

    /**
     * @var Collection<int, Price>
     */
    #[ORM\OneToMany(targetEntity: Price::class, mappedBy: 'relation')]
    private Collection $prices;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getLocationCity(): ?string
    {
        return $this->location_city;
    }

    public function setLocationCity(string $location_city): static
    {
        $this->location_city = $location_city;

        return $this;
    }

    public function getLocationLat(): ?string
    {
        return $this->location_lat;
    }

    public function setLocationLat(?string $location_lat): static
    {
        $this->location_lat = $location_lat;

        return $this;
    }

    public function getLocationLong(): ?string
    {
        return $this->location_long;
    }

    public function setLocationLong(?string $location_long): static
    {
        $this->location_long = $location_long;

        return $this;
    }

    public function getLocationAdress(): ?string
    {
        return $this->location_adress;
    }

    public function setLocationAdress(?string $location_adress): static
    {
        $this->location_adress = $location_adress;

        return $this;
    }

    /**
     * @return Collection<int, Price>
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function addPrice(Price $price): static
    {
        if (!$this->prices->contains($price)) {
            $this->prices->add($price);
            $price->setRelation($this);
        }

        return $this;
    }

    public function removePrice(Price $price): static
    {
        if ($this->prices->removeElement($price)) {
            // set the owning side to null (unless already changed)
            if ($price->getRelation() === $this) {
                $price->setRelation(null);
            }
        }

        return $this;
    }
}
