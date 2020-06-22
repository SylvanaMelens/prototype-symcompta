<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceProviderRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=InvoiceProviderRepository::class)
 * @ApiResource
 */
class InvoiceProvider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="invoiceProviders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $invoiceProviderName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $invoiceProviderDescription;

    /**
     * @ORM\Column(type="datetime")
     */
    private $invoiceProviderDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $invoiceProviderStatus;

    /**
     * @ORM\Column(type="float")
     */
    private $invoiceProviderAmountBase;

    /**
     * @ORM\ManyToMany(targetEntity=VatRate::class, inversedBy="invoiceProviders")
     */
    private $invoiceProviderVatRate;

    /**
     * @ORM\Column(type="float")
     */
    private $invoiceProviderTotalAmount;

    /**
     * @ORM\Column(type="integer")
     */
    private $invoiceProviderNum;

    public function __construct()
    {
        $this->invoiceProviderVatRate = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceProviderName(): ?Provider
    {
        return $this->invoiceProviderName;
    }

    public function setInvoiceProviderName(?Provider $invoiceProviderName): self
    {
        $this->invoiceProviderName = $invoiceProviderName;

        return $this;
    }

    public function getInvoiceProviderDescription(): ?string
    {
        return $this->invoiceProviderDescription;
    }

    public function setInvoiceProviderDescription(string $invoiceProviderDescription): self
    {
        $this->invoiceProviderDescription = $invoiceProviderDescription;

        return $this;
    }

    public function getInvoiceProviderDate(): ?\DateTimeInterface
    {
        return $this->invoiceProviderDate;
    }

    public function setInvoiceProviderDate(\DateTimeInterface $invoiceProviderDate): self
    {
        $this->invoiceProviderDate = $invoiceProviderDate;

        return $this;
    }

    public function getInvoiceProviderStatus(): ?string
    {
        return $this->invoiceProviderStatus;
    }

    public function setInvoiceProviderStatus(string $invoiceProviderStatus): self
    {
        $this->invoiceProviderStatus = $invoiceProviderStatus;

        return $this;
    }

    public function getInvoiceProviderAmountBase(): ?float
    {
        return $this->invoiceProviderAmountBase;
    }

    public function setInvoiceProviderAmountBase(float $invoiceProviderAmountBase): self
    {
        $this->invoiceProviderAmountBase = $invoiceProviderAmountBase;

        return $this;
    }

    /**
     * @return Collection|VatRate[]
     */
    public function getInvoiceProviderVatRate(): Collection
    {
        return $this->invoiceProviderVatRate;
    }

    public function addInvoiceProviderVatRate(VatRate $invoiceProviderVatRate): self
    {
        if (!$this->invoiceProviderVatRate->contains($invoiceProviderVatRate)) {
            $this->invoiceProviderVatRate[] = $invoiceProviderVatRate;
        }

        return $this;
    }

    public function removeInvoiceProviderVatRate(VatRate $invoiceProviderVatRate): self
    {
        if ($this->invoiceProviderVatRate->contains($invoiceProviderVatRate)) {
            $this->invoiceProviderVatRate->removeElement($invoiceProviderVatRate);
        }

        return $this;
    }

    public function getInvoiceProviderTotalAmount(): ?float
    {
        return $this->invoiceProviderTotalAmount;
    }

    public function setInvoiceProviderTotalAmount(float $invoiceProviderTotalAmount): self
    {
        $this->invoiceProviderTotalAmount = $invoiceProviderTotalAmount;

        return $this;
    }

    public function getInvoiceProviderNum(): ?int
    {
        return $this->invoiceProviderNum;
    }

    public function setInvoiceProviderNum(int $invoiceProviderNum): self
    {
        $this->invoiceProviderNum = $invoiceProviderNum;

        return $this;
    }
}
