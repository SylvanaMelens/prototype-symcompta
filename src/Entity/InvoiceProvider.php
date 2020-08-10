<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InvoiceProviderRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=InvoiceProviderRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"invoices_providers_read"}
 * },
 *  denormalizationContext={"disable_type_enforcement"=true}
 * )
 */
class InvoiceProvider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"invoices_providers_read", "providers_read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Provider::class, inversedBy="invoiceProviders")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"invoices_providers_read"})
     * @Assert\NotBlank(message="le champ fournisseur ne peut être vide.")
     */
    private $invoiceProviderName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="veuillez entrer une description")
     */
    private $invoiceProviderDescription;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="veuillez entrer une date valide")
     */
    private $invoiceProviderDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="veuillez entrer un statut valide")
     * @Assert\Choice(choices={"Payée", "Encodée", "NDC"}, message="Le statut doit être 'Payée', 'Encodée' ou 'NDC'")
     */
    private $invoiceProviderStatus;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="veuillez entrer un montant de base.")
     * @Assert\Type(type="numeric", message="Veuillez entrer un nombre comme montant de base")
     */
    private $invoiceProviderAmountBase;

    /**
     * @ORM\ManyToMany(targetEntity=VatRate::class, inversedBy="invoiceProviders")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="veuillez entrer un taux valide")
     */
    private $invoiceProviderVatRate;

    /**
     * @ORM\Column(type="float")
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="veuillez entrer un montant total")
     * @Assert\Type(type="numeric", message="Veuillez entrer un nombre comme montant total")
     */
    private $invoiceProviderTotalAmount;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"invoices_providers_read", "providers_read"})
     * @Assert\NotBlank(message="numéro de facture obligatoire")
     * @Assert\Type(type="integer", message="le numéro de facture doit être un nombre")
     */
    private $invoiceProviderNum;

    /**
     * @ORM\Column(type="float")
     *  @Groups({"invoices_providers_read"})
     * @Assert\NotBlank(message="veuillez entrer un montant de TVA")
     * @Assert\Type(type="numeric", message="Veuillez entrer un nombre comme montant de TVA")
     */
    private $invoiceProviderVatAmount;

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

    public function setInvoiceProviderDate($invoiceProviderDate): self
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

    public function getInvoiceProviderVatRate(): ?VatRate
    {
        return $this->invoiceProviderVatRate;
    }

    public function setInvoiceProviderVatRate(?VatRate $invoiceProviderVatRate): self
    {
        $this->invoiceProviderVatRate = $invoiceProviderVatRate;

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

    public function getInvoiceProviderVatAmount(): ?float
    {
        return $this->invoiceProviderVatAmount;
    }

    public function setInvoiceProviderVatAmount(float $invoiceProviderVatAmount): self
    {
        $this->invoiceProviderVatAmount = $invoiceProviderVatAmount;

        return $this;
    }
}
