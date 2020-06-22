<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProviderRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 * @ApiResource
 */
class Provider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $providerFirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerLastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerAddress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerPostCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerCity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerCountry;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerVatNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $providerEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $providerPhone;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceProvider::class, mappedBy="invoiceProviderName")
     */
    private $invoiceProviders;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userProviders")
     */
    private $user;

    public function __construct()
    {
        $this->invoiceProviders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProviderFirstName(): ?string
    {
        return $this->providerFirstName;
    }

    public function setProviderFirstName(?string $providerFirstName): self
    {
        $this->providerFirstName = $providerFirstName;

        return $this;
    }

    public function getProviderLastName(): ?string
    {
        return $this->providerLastName;
    }

    public function setProviderLastName(string $providerLastName): self
    {
        $this->providerLastName = $providerLastName;

        return $this;
    }

    public function getProviderAddress(): ?string
    {
        return $this->providerAddress;
    }

    public function setProviderAddress(string $providerAddress): self
    {
        $this->providerAddress = $providerAddress;

        return $this;
    }

    public function getProviderPostCode(): ?string
    {
        return $this->providerPostCode;
    }

    public function setProviderPostCode(string $providerPostCode): self
    {
        $this->providerPostCode = $providerPostCode;

        return $this;
    }

    public function getProviderCity(): ?string
    {
        return $this->providerCity;
    }

    public function setProviderCity(string $providerCity): self
    {
        $this->providerCity = $providerCity;

        return $this;
    }

    public function getProviderCountry(): ?string
    {
        return $this->providerCountry;
    }

    public function setProviderCountry(string $providerCountry): self
    {
        $this->providerCountry = $providerCountry;

        return $this;
    }

    public function getProviderVatNumber(): ?string
    {
        return $this->providerVatNumber;
    }

    public function setProviderVatNumber(string $providerVatNumber): self
    {
        $this->providerVatNumber = $providerVatNumber;

        return $this;
    }

    public function getProviderEmail(): ?string
    {
        return $this->providerEmail;
    }

    public function setProviderEmail(string $providerEmail): self
    {
        $this->providerEmail = $providerEmail;

        return $this;
    }

    public function getProviderPhone(): ?string
    {
        return $this->providerPhone;
    }

    public function setProviderPhone(?string $providerPhone): self
    {
        $this->providerPhone = $providerPhone;

        return $this;
    }

    /**
     * @return Collection|InvoiceProvider[]
     */
    public function getInvoiceProviders(): Collection
    {
        return $this->invoiceProviders;
    }

    public function addInvoiceProvider(InvoiceProvider $invoiceProvider): self
    {
        if (!$this->invoiceProviders->contains($invoiceProvider)) {
            $this->invoiceProviders[] = $invoiceProvider;
            $invoiceProvider->setInvoiceProviderName($this);
        }

        return $this;
    }

    public function removeInvoiceProvider(InvoiceProvider $invoiceProvider): self
    {
        if ($this->invoiceProviders->contains($invoiceProvider)) {
            $this->invoiceProviders->removeElement($invoiceProvider);
            // set the owning side to null (unless already changed)
            if ($invoiceProvider->getInvoiceProviderName() === $this) {
                $invoiceProvider->setInvoiceProviderName(null);
            }
        }

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
}
