<?php

namespace App\Entity;

use App\Repository\TennisCourtRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TennisCourtRepository::class)
 */
class TennisCourt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="tennisCourts")
     */
    private $owner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startBookingHour;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endBookingHour;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAvailable;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $availableDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $groundType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $courtName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?user
    {
        return $this->owner;
    }

    public function setOwner(?user $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStartBookingHour(): ?\DateTimeInterface
    {
        return $this->startBookingHour;
    }

    public function setStartBookingHour(?\DateTimeInterface $startBookingHour): self
    {
        $this->startBookingHour = $startBookingHour;

        return $this;
    }

    public function getEndBookingHour(): ?\DateTimeInterface
    {
        return $this->endBookingHour;
    }

    public function setEndBookingHour(?\DateTimeInterface $endBookingHour): self
    {
        $this->endBookingHour = $endBookingHour;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(?bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getAvailableDate(): ?\DateTimeInterface
    {
        return $this->availableDate;
    }

    public function setAvailableDate(?\DateTimeInterface $availableDate): self
    {
        $this->availableDate = $availableDate;

        return $this;
    }

    public function getGroundType(): ?string
    {
        return $this->groundType;
    }

    public function setGroundType(?string $groundType): self
    {
        $this->groundType = $groundType;

        return $this;
    }

    public function getCourtName(): ?string
    {
        return $this->courtName;
    }

    public function setCourtName(?string $courtName): self
    {
        $this->courtName = $courtName;

        return $this;
    }
}
