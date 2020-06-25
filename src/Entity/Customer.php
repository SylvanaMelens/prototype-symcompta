<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ApiResource(
 *  subresourceOperations={
 *      "invoice_customers_get_subresource"={"path"="/customers/{id}/invoices"}
 * },
 *  normalizationContext={
 *      "groups"={"customers_read"}
 * }
 * )
 */
class Customer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"customers_read", "invoices_customers_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\NotBlank(message="Le champ prénom doit être rempli. S'il s'agit d'une société, entrez ici le sigle (SA, SRL,...) et indiquez le nom de la société dans le champ nom.")
     * @Assert\Length(min=2, minMessage="Le champ prénom doit contenir entre 2 et 30 caractères", max=30, maxMessage="Le champ prénom doit contenir entre 2 et 30 caractères")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\NotBlank(message="Le champ nom doit être rempli. S'il s'agit d'une société, entrez ici le nom de la société et indiquez le sigle (SA, SRL,...) dans le champ pnénom.")
     * @Assert\Length(min=2, minMessage="Le champ nom doit contenir entre 2 et 30 caractères", max=30, maxMessage="Le champ nom doit contenir entre 2 et 30 caractères")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\NotBlank(message="Le champ adresse doit être rempli")
     * @Assert\Length(min=5, minMessage="Le champ adresse doit contenir entre 5 et 255 caractères", max=255, maxMessage="Le champ adresse doit contenir entre 5 et 255 caractères")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\NotBlank(message="Le champ code postal doit être rempli")
     * @Assert\Length(min=4, minMessage="Le champ code postal doit contenir entre 4 et 20 caractères", max=20, maxMessage="Le champ code postal doit contenir entre 4 et 20 caractères")
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\NotBlank(message="Le champ ville doit être rempli")
     * @Assert\Length(min=2, minMessage="Le champ ville doit contenir entre 2 et 30 caractères", max=30, maxMessage="Le champ ville doit contenir entre 2 et 30 caractères")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\Length(max=30, maxMessage="Le champ pays doit contenir maximum 30 caractères")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\NotBlank(message="Le champ numéro de TVA doit être rempli. S'il s'agit d'un non assujetti, indiquez 'NA', sinon indiquez le numéro de TVA composé de deux lettres et 10 chiffres maximum.")
     * @Assert\Length(min=2, minMessage="Le champ numéro de TVA doit contenir entre 2 et 12 caractères", max=12, maxMessage="Le champ numéro de TVA doit contenir entre 2 et 12 caractères")
     * 
     */
    private $VATNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\Email(message="Veuillez entrer une adresse email valide")
     * 
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customers_read", "invoices_customers_read"})
     * @Assert\Length(max=12, maxMessage="Le champ numéro de téléphone doit contenir maximum 12 caractères")
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceCustomer::class, mappedBy="invoiceCustomerClient")
     * @Groups({"customers_read"})
     * @ApiSubresource
     */
    private $invoiceCustomers;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userCustomers")
     * @Groups({"customers_read"})
     * 
     */
    private $user;

    public function __construct()
    {
        $this->invoiceCustomers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getVATNumber(): ?string
    {
        return $this->VATNumber;
    }

    public function setVATNumber(string $VATNumber): self
    {
        $this->VATNumber = $VATNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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
            $invoiceCustomer->setInvoiceCustomerClient($this);
        }

        return $this;
    }

    public function removeInvoiceCustomer(InvoiceCustomer $invoiceCustomer): self
    {
        if ($this->invoiceCustomers->contains($invoiceCustomer)) {
            $this->invoiceCustomers->removeElement($invoiceCustomer);
            // set the owning side to null (unless already changed)
            if ($invoiceCustomer->getInvoiceCustomerClient() === $this) {
                $invoiceCustomer->setInvoiceCustomerClient(null);
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
