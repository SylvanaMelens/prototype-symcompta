<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VatDeclarationRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VatDeclarationRepository::class)
 * @ApiResource(
 *  normalizationContext={
 *      "groups"={"vat_declaration_read"}
 * }
 * )
 */
class VatDeclaration
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"vat_declaration_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case00;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case01;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case02;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case03;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"}) 
     */
    private $case44;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case45;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case46;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case47;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case48;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case49;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case81;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case82;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case83;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case84;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case85;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case86;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case87;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case88;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case54;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case55;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"vat_declaration_read"})
     */
    private $case56;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"}) 
     */
    private $case57;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case61;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case63;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case65;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $caseXx;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case59;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case62;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case64;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case66;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $caseYy;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case71;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case72;

    /**
     * @ORM\Column(type="float", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $case91;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $periodMonth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $periodTrim;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * Groups({"vat_declaration_read"})
     */
    private $vatDeclSentAt;

    /**
     * @ORM\Column(type="datetime")
     * Groups({"vat_declaration_read"})
     */
    private $encodedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCase00(): ?float
    {
        return $this->case00;
    }

    public function setCase00(?float $case00): self
    {
        $this->case00 = $case00;

        return $this;
    }

    public function getCase01(): ?float
    {
        return $this->case01;
    }

    public function setCase01(?float $case01): self
    {
        $this->case01 = $case01;

        return $this;
    }

    public function getCase02(): ?float
    {
        return $this->case02;
    }

    public function setCase02(float $case02): self
    {
        $this->case02 = $case02;

        return $this;
    }

    public function getCase03(): ?float
    {
        return $this->case03;
    }

    public function setCase03(?float $case03): self
    {
        $this->case03 = $case03;

        return $this;
    }

    public function getCase44(): ?float
    {
        return $this->case44;
    }

    public function setCase44(?float $case44): self
    {
        $this->case44 = $case44;

        return $this;
    }

    public function getCase45(): ?float
    {
        return $this->case45;
    }

    public function setCase45(?float $case45): self
    {
        $this->case45 = $case45;

        return $this;
    }

    public function getCase46(): ?float
    {
        return $this->case46;
    }

    public function setCase46(?float $case46): self
    {
        $this->case46 = $case46;

        return $this;
    }

    public function getCase47(): ?float
    {
        return $this->case47;
    }

    public function setCase47(?float $case47): self
    {
        $this->case47 = $case47;

        return $this;
    }

    public function getCase48(): ?float
    {
        return $this->case48;
    }

    public function setCase48(?float $case48): self
    {
        $this->case48 = $case48;

        return $this;
    }

    public function getCase49(): ?float
    {
        return $this->case49;
    }

    public function setCase49(?float $case49): self
    {
        $this->case49 = $case49;

        return $this;
    }

    public function getCase81(): ?float
    {
        return $this->case81;
    }

    public function setCase81(?float $case81): self
    {
        $this->case81 = $case81;

        return $this;
    }

    public function getCase82(): ?float
    {
        return $this->case82;
    }

    public function setCase82(?float $case82): self
    {
        $this->case82 = $case82;

        return $this;
    }

    public function getCase83(): ?float
    {
        return $this->case83;
    }

    public function setCase83(?float $case83): self
    {
        $this->case83 = $case83;

        return $this;
    }

    public function getCase84(): ?float
    {
        return $this->case84;
    }

    public function setCase84(?float $case84): self
    {
        $this->case84 = $case84;

        return $this;
    }

    public function getCase85(): ?float
    {
        return $this->case85;
    }

    public function setCase85(?float $case85): self
    {
        $this->case85 = $case85;

        return $this;
    }

    public function getCase86(): ?float
    {
        return $this->case86;
    }

    public function setCase86(?float $case86): self
    {
        $this->case86 = $case86;

        return $this;
    }

    public function getCase87(): ?float
    {
        return $this->case87;
    }

    public function setCase87(?float $case87): self
    {
        $this->case87 = $case87;

        return $this;
    }

    public function getCase88(): ?float
    {
        return $this->case88;
    }

    public function setCase88(?float $case88): self
    {
        $this->case88 = $case88;

        return $this;
    }

    public function getCase54(): ?float
    {
        return $this->case54;
    }

    public function setCase54(?float $case54): self
    {
        $this->case54 = $case54;

        return $this;
    }

    public function getCase55(): ?float
    {
        return $this->case55;
    }

    public function setCase55(?float $case55): self
    {
        $this->case55 = $case55;

        return $this;
    }

    public function getCase56(): ?float
    {
        return $this->case56;
    }

    public function setCase56(?float $case56): self
    {
        $this->case56 = $case56;

        return $this;
    }

    public function getCase57(): ?float
    {
        return $this->case57;
    }

    public function setCase57(?float $case57): self
    {
        $this->case57 = $case57;

        return $this;
    }

    public function getCase61(): ?float
    {
        return $this->case61;
    }

    public function setCase61(?float $case61): self
    {
        $this->case61 = $case61;

        return $this;
    }

    public function getCase63(): ?float
    {
        return $this->case63;
    }

    public function setCase63(?float $case63): self
    {
        $this->case63 = $case63;

        return $this;
    }

    public function getCase65(): ?float
    {
        return $this->case65;
    }

    public function setCase65(?float $case65): self
    {
        $this->case65 = $case65;

        return $this;
    }

    public function getCaseXx(): ?float
    {
        return $this->caseXx;
    }

    public function setCaseXx(?float $caseXx): self
    {
        $this->caseXx = $caseXx;

        return $this;
    }

    public function getCase59(): ?float
    {
        return $this->case59;
    }

    public function setCase59(?float $case59): self
    {
        $this->case59 = $case59;

        return $this;
    }

    public function getCase62(): ?float
    {
        return $this->case62;
    }

    public function setCase62(?float $case62): self
    {
        $this->case62 = $case62;

        return $this;
    }

    public function getCase64(): ?float
    {
        return $this->case64;
    }

    public function setCase64(?float $case64): self
    {
        $this->case64 = $case64;

        return $this;
    }

    public function getCase66(): ?float
    {
        return $this->case66;
    }

    public function setCase66(?float $case66): self
    {
        $this->case66 = $case66;

        return $this;
    }

    public function getCaseYy(): ?float
    {
        return $this->caseYy;
    }

    public function setCaseYy(?float $caseYy): self
    {
        $this->caseYy = $caseYy;

        return $this;
    }

    public function getCase71(): ?float
    {
        return $this->case71;
    }

    public function setCase71(?float $case71): self
    {
        $this->case71 = $case71;

        return $this;
    }

    public function getCase72(): ?float
    {
        return $this->case72;
    }

    public function setCase72(?float $case72): self
    {
        $this->case72 = $case72;

        return $this;
    }

    public function getCase91(): ?float
    {
        return $this->case91;
    }

    public function setCase91(?float $case91): self
    {
        $this->case91 = $case91;

        return $this;
    }

    public function getPeriodMonth(): ?string
    {
        return $this->periodMonth;
    }

    public function setPeriodMonth(?string $periodMonth): self
    {
        $this->periodMonth = $periodMonth;

        return $this;
    }

    public function getPeriodTrim(): ?string
    {
        return $this->periodTrim;
    }

    public function setPeriodTrim(?string $periodTrim): self
    {
        $this->periodTrim = $periodTrim;

        return $this;
    }

    public function getVatDeclSentAt(): ?\DateTimeInterface
    {
        return $this->vatDeclSentAt;
    }

    public function setVatDeclSentAt(?\DateTimeInterface $vatDeclSentAt): self
    {
        $this->vatDeclSentAt = $vatDeclSentAt;

        return $this;
    }

    public function getEncodedAt(): ?\DateTimeInterface
    {
        return $this->encodedAt;
    }

    public function setEncodedAt(\DateTimeInterface $encodedAt): self
    {
        $this->encodedAt = $encodedAt;

        return $this;
    }
}
