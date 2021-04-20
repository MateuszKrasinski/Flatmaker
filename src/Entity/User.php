<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity=GroupToUser::class, mappedBy="id_user")
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="relation")
     */
    private $id_role;

    /**
     * @ORM\OneToOne(targetEntity=UserDetails::class, cascade={"persist", "remove"})
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->relation_ = new ArrayCollection();
        $this->relation__ = new ArrayCollection();
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
}
