<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceCustomerRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=InvoiceCustomerRepository::class)
 * @ApiResource(
 *  attributes={"order": {"invoiceCustomerSentAt":"desc"}},
 *  normalizationContext={"groups"={"invoices_customers_read"}}
 * )
 */
class InvoiceCustomer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="invoiceCustomers")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"invoices_customers_read"})
     */
    private $invoiceCustomerClient;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerDescription;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerSentAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerStatus;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerAmountBase;

    /**
     * @ORM\ManyToOne(targetEntity=VatRate::class, inversedBy="invoiceCustomers")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerVatRate;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerTotalAmount;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerNum;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_customers_read", "customers_read"})
     */
    private $invoiceCustomerVatAmount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceCustomerClient(): ?Customer
    {
        return $this->invoiceCustomerClient;
    }

    public function setInvoiceCustomerClient(?Customer $invoiceCustomerClient): self
    {
        $this->invoiceCustomerClient = $invoiceCustomerClient;

        return $this;
    }

    public function getInvoiceCustomerDescription(): ?string
    {
        return $this->invoiceCustomerDescription;
    }

    public function setInvoiceCustomerDescription(string $invoiceCustomerDescription): self
    {
        $this->invoiceCustomerDescription = $invoiceCustomerDescription;

        return $this;
    }

    public function getInvoiceCustomerSentAt(): ?\DateTimeInterface
    {
        return $this->invoiceCustomerSentAt;
    }

    public function setInvoiceCustomerSentAt(\DateTimeInterface $invoiceCustomerSentAt): self
    {
        $this->invoiceCustomerSentAt = $invoiceCustomerSentAt;

        return $this;
    }

    public function getInvoiceCustomerStatus(): ?string
    {
        return $this->invoiceCustomerStatus;
    }

    public function setInvoiceCustomerStatus(string $invoiceCustomerStatus): self
    {
        $this->invoiceCustomerStatus = $invoiceCustomerStatus;

        return $this;
    }

    public function getInvoiceCustomerAmountBase(): ?float
    {
        return $this->invoiceCustomerAmountBase;
    }

    public function setInvoiceCustomerAmountBase(float $invoiceCustomerAmountBase): self
    {
        $this->invoiceCustomerAmountBase = $invoiceCustomerAmountBase;

        return $this;
    }

    public function getInvoiceCustomerVatRate(): ?VatRate
    {
        return $this->invoiceCustomerVatRate;
    }

    public function setInvoiceCustomerVatRate(?VatRate $invoiceCustomerVatRate): self
    {
        $this->invoiceCustomerVatRate = $invoiceCustomerVatRate;

        return $this;
    }

    public function getInvoiceCustomerTotalAmount(): ?float
    {
        return $this->invoiceCustomerTotalAmount;
    }

    public function setInvoiceCustomerTotalAmount(float $invoiceCustomerTotalAmount): self
    {
        $this->invoiceCustomerTotalAmount = $invoiceCustomerTotalAmount;

        return $this;
    }

    public function getInvoiceCustomerNum(): ?int
    {
        return $this->invoiceCustomerNum;
    }

    public function setInvoiceCustomerNum(int $invoiceCustomerNum): self
    {
        $this->invoiceCustomerNum = $invoiceCustomerNum;

        return $this;
    }

    public function getInvoiceCustomerVatAmount(): ?float
    {
        return $this->invoiceCustomerVatAmount;
    }

    public function setInvoiceCustomerVatAmount(float $invoiceCustomerVatAmount): self
    {
        $this->invoiceCustomerVatAmount = $invoiceCustomerVatAmount;

        return $this;
    }
}
