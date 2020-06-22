<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VatRateRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=VatRateRepository::class)
 * @ApiResource
 */
class VatRate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $rate;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceCustomer::class, mappedBy="invoiceCustomerVatRate")
     */
    private $invoiceCustomers;

    /**
     * @ORM\ManyToMany(targetEntity=InvoiceProvider::class, mappedBy="invoiceProviderVatRate")
     */
    private $invoiceProviders;

    public function __construct()
    {
        $this->invoiceCustomers = new ArrayCollection();
        $this->invoiceProviders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return Collection|InvoiceCustomer[]
     */
    public function getInvoiceCustomers(): Collection
    {
        return $this->invoiceCustomers;
    }

    public function addInvoiceCustomer(InvoiceCustomer $invoiceCustomer): self
    {
        if (!$this->invoiceCustomers->contains($invoiceCustomer)) {
            $this->invoiceCustomers[] = $invoiceCustomer;
            $invoiceCustomer->setInvoiceCustomerVatRate($this);
        }

        return $this;
    }

    public function removeInvoiceCustomer(InvoiceCustomer $invoiceCustomer): self
    {
        if ($this->invoiceCustomers->contains($invoiceCustomer)) {
            $this->invoiceCustomers->removeElement($invoiceCustomer);
            // set the owning side to null (unless already changed)
            if ($invoiceCustomer->getInvoiceCustomerVatRate() === $this) {
                $invoiceCustomer->setInvoiceCustomerVatRate(null);
            }
        }

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
            $invoiceProvider->addInvoiceProviderVatRate($this);
        }

        return $this;
    }

    public function removeInvoiceProvider(InvoiceProvider $invoiceProvider): self
    {
        if ($this->invoiceProviders->contains($invoiceProvider)) {
            $this->invoiceProviders->removeElement($invoiceProvider);
            $invoiceProvider->removeInvoiceProviderVatRate($this);
        }

        return $this;
    }
}
