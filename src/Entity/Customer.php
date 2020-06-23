<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ApiResource(
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
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"customers_read", "invoices_customers_read"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"customers_read", "invoices_customers_read"})
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customers_read", "invoices_customers_read"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"customers_read", "invoices_customers_read"})
     */
    private $VATNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"customers_read", "invoices_customers_read"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"customers_read", "invoices_customers_read"})
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=InvoiceCustomer::class, mappedBy="invoiceCustomerClient")
     *  @Groups({"customers_read"})
     */
    private $invoiceCustomers;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userCustomers")
     *  @Groups({"customers_read"})
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
