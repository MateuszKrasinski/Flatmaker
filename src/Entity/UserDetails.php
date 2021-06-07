<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserDetailsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * * @ApiResource(
 * normalizationContext={"groups"={"user_details:read"},"swagger_definition_name"="Read"},
 * denormalizationContext={"groups"={"user_details:write"},"swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass=UserDetailsRepository::class)
 */
class UserDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user_details:read","user_details:write","user:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_details:read","user_details:write", "user:read","group_to_user:read","help:read","group:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_details:read","user_details:write", "user:read","group_to_user:read","help:read","group:read"})
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_details:read","user_details:write", "user:read","group_to_user:read","help:read","group:read"})
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="details")
     */
    private $relation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_details:read","user_details:write", "user:read","group_to_user:read","help:read","group:read"})
     */
    private $photo;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
    /**
     * @return Collection|User[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(User $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setIdUser($this);
        }

        return $this;
    }

    public function removeRelation(User $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getIdUser() === $this) {
                $relation->setIdUser(null);
            }
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

}
