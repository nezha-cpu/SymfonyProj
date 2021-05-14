<?php

namespace App\Entity;

use App\Repository\PayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PayRepository::class)
 */
class Pay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $FullName;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nameC;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $CN;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $ExpM;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $ExpY;

    /**
     * @ORM\Column(type="integer")
     */
    private $CVV;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNameC(): ?string
    {
        return $this->nameC;
    }

    public function setNameC(string $nameC): self
    {
        $this->nameC = $nameC;

        return $this;
    }

    public function getCN(): ?string
    {
        return $this->CN;
    }

    public function setCN(string $CN): self
    {
        $this->CN = $CN;

        return $this;
    }

    public function getExpM(): ?string
    {
        return $this->ExpM;
    }

    public function setExpM(string $ExpM): self
    {
        $this->ExpM = $ExpM;

        return $this;
    }

    public function getExpY(): ?string
    {
        return $this->ExpY;
    }

    public function setExpY(string $ExpY): self
    {
        $this->ExpY = $ExpY;

        return $this;
    }

    public function getCVV(): ?int
    {
        return $this->CVV;
    }

    public function setCVV(int $CVV): self
    {
        $this->CVV = $CVV;

        return $this;
    }
}
