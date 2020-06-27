<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\VatRateRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=VatRateRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"vat_rate_read"}
 * }
 * )
 * @UniqueEntity("rate", message="Ce taux existe déjà, veuillez en entrer un autre")
 */
class VatRate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"vat_rate_read", "invoices_customers_read", "invoices_providers_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Groups({"vat_rate_read", "invoices_customers_read", "invoices_providers_read"})
     * @Assert\NotBlank(message="veuillez entrer un taux de TVA")
     */
    private $rate;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceCustomer::class, mappedBy="invoiceCustomerVatRate")
     * @Groups({"vat_rate_read"})
     */
    private $invoiceCustomers;

    /**
     * @ORM\ManyToMany(targetEntity=InvoiceProvider::class, mappedBy="invoiceProviderVatRate")
     * @Groups({"vat_rate_read", "invoices_customers_read"})
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
