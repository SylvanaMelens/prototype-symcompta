<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceCustomerRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InvoiceCustomerRepository::class)
 * @ApiResource(
 *  attributes={"order": {"invoiceCustomerSentAt":"desc"}},
 *  normalizationContext={"groups"={"invoices_customers_read"}},
 *  denormalizationContext={"disable_type_enforcement"=true}
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
     * @Assert\NotBlank(message="le champ client ne peut être vide")
     */
    private $invoiceCustomerClient;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer une description")
     */
    private $invoiceCustomerDescription;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer une date valide")
     * 
     */
    private $invoiceCustomerSentAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer un statut valide")
     * @Assert\Choice(choices={"Payée", "Envoyée", "NDC"}, message="Le statut doit être 'Payée', 'Envoyée' ou 'NDC'")
     */
    private $invoiceCustomerStatus;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer un montant de base.")
     * @Assert\Type(type="numeric", message="Veuillez entrer un nombre comme montant de base")
     */
    private $invoiceCustomerAmountBase;

    /**
     * @ORM\ManyToOne(targetEntity=VatRate::class, inversedBy="invoiceCustomers")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer un taux valide")
     */
    private $invoiceCustomerVatRate;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer un montant total")
     * @Assert\Type(type="numeric", message="Veuillez entrer un nombre comme montant total")
     */
    private $invoiceCustomerTotalAmount;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="numéro de facture obligatoire")
     * @Assert\Type(type="integer", message="le numéro de facture doit être un nombre")
     */
    private $invoiceCustomerNum;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_customers_read", "customers_read"})
     * @Assert\NotBlank(message="veuillez entrer un montant de TVA")
     * @Assert\Type(type="numeric", message="Veuillez entrer un nombre comme montant de TVA")
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

    public function setInvoiceCustomerSentAt($invoiceCustomerSentAt): self
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

    public function setInvoiceCustomerAmountBase($invoiceCustomerAmountBase): self
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

    public function setInvoiceCustomerTotalAmount($invoiceCustomerTotalAmount): self
    {
        $this->invoiceCustomerTotalAmount = $invoiceCustomerTotalAmount;

        return $this;
    }

    public function getInvoiceCustomerNum(): ?int
    {
        return $this->invoiceCustomerNum;
    }

    public function setInvoiceCustomerNum($invoiceCustomerNum): self
    {
        $this->invoiceCustomerNum = $invoiceCustomerNum;

        return $this;
    }

    public function getInvoiceCustomerVatAmount(): ?float
    {
        return $this->invoiceCustomerVatAmount;
    }

    public function setInvoiceCustomerVatAmount($invoiceCustomerVatAmount): self
    {
        $this->invoiceCustomerVatAmount = $invoiceCustomerVatAmount;

        return $this;
    }
}
