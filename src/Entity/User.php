<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userFirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UserLastName;

    /**
     * @ORM\OneToMany(targetEntity=Customer::class, mappedBy="user")
     */
    private $userCustomers;

    /**
     * @ORM\OneToMany(targetEntity=Provider::class, mappedBy="user")
     */
    private $userProviders;

    public function __construct()
    {
        $this->userCustomers = new ArrayCollection();
        $this->userProviders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserFirstName(): ?string
    {
        return $this->userFirstName;
    }

    public function setUserFirstName(string $userFirstName): self
    {
        $this->userFirstName = $userFirstName;

        return $this;
    }

    public function getUserLastName(): ?string
    {
        return $this->UserLastName;
    }

    public function setUserLastName(string $UserLastName): self
    {
        $this->UserLastName = $UserLastName;

        return $this;
    }

    /**
     * @return Collection|Customer[]
     */
    public function getUserCustomers(): Collection
    {
        return $this->userCustomers;
    }

    public function addUserCustomer(Customer $userCustomer): self
    {
        if (!$this->userCustomers->contains($userCustomer)) {
            $this->userCustomers[] = $userCustomer;
            $userCustomer->setUser($this);
        }

        return $this;
    }

    public function removeUserCustomer(Customer $userCustomer): self
    {
        if ($this->userCustomers->contains($userCustomer)) {
            $this->userCustomers->removeElement($userCustomer);
            // set the owning side to null (unless already changed)
            if ($userCustomer->getUser() === $this) {
                $userCustomer->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Provider[]
     */
    public function getUserProviders(): Collection
    {
        return $this->userProviders;
    }

    public function addUserProvider(Provider $userProvider): self
    {
        if (!$this->userProviders->contains($userProvider)) {
            $this->userProviders[] = $userProvider;
            $userProvider->setUser($this);
        }

        return $this;
    }

    public function removeUserProvider(Provider $userProvider): self
    {
        if ($this->userProviders->contains($userProvider)) {
            $this->userProviders->removeElement($userProvider);
            // set the owning side to null (unless already changed)
            if ($userProvider->getUser() === $this) {
                $userProvider->setUser(null);
            }
        }

        return $this;
    }
}
