<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"user:read"},"swagger_definition_name"="Read"},
 * denormalizationContext={"groups"={"user:write"},"swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read","group_to_user:read", "help:read","group:read"})
     *
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity=GroupToUser::class, mappedBy="id_user")
     */
    private $relation;
    /**
     * @ORM\OneToMany(targetEntity=Help::class, mappedBy="id_user")
     */
    private $relation_;
    /**
     * @ORM\OneToMany(targetEntity=Help::class, mappedBy="id_user")
     */
    private $relation1;
    /**
     * @ORM\GeneratedValue
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="relation")
     * @Groups({"user:read","group_to_user:read", "help:read","group:read"})
     */

    private $id_role;

    /**
     * @ORM\GeneratedValue
     * @ORM\OneToOne(targetEntity=UserDetails::class, cascade={"persist", "remove"})
     *  @Groups({"user:read","group_to_user:read", "help:read","group:read"})
     */
    private $id_user;

    /**
     *@ORM\GeneratedValue
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"user:read","group_to_user:read", "help:read","group:read"})
     *
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read"})
     */
    private $password;

    /**
     * @ORM\GeneratedValue
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"user:read","group_to_user:read", "help:read"})
     */
    private $created_at;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->relation_ = new ArrayCollection();
        $this->relation__ = new ArrayCollection();
        $this->relation1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection|grouptouser[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(grouptouser $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setIdUser($this);
        }

        return $this;
    }

    public function removeRelation(grouptouser $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getIdUser() === $this) {
                $relation->setIdUser(null);
            }
        }

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->id_role;
    }

    public function setIdRole(?Role $id_role): self
    {
        $this->id_role = $id_role;

        return $this;
    }

    public function getIdUser(): ?UserDetails
    {
        return $this->id_user;
//        return $this->id_user->getRelation();
    }

    public function setIdUser(?UserDetails $id_user): self
    {
        $this->id_user = $id_user;

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
    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getRoles()
    {
        $roles = [];
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|Help[]
     */
    public function getRelation1(): Collection
    {
        return $this->relation1;
    }

    public function addRelation1(Help $relation1): self
    {
        if (!$this->relation1->contains($relation1)) {
            $this->relation1[] = $relation1;
            $relation1->setIdUser($this);
        }

        return $this;
    }

    public function removeRelation1(Help $relation1): self
    {
        if ($this->relation1->removeElement($relation1)) {
            // set the owning side to null (unless already changed)
            if ($relation1->getIdUser() === $this) {
                $relation1->setIdUser(null);
            }
        }

        return $this;
    }
}
