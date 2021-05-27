<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"role:read"},"swagger_definition_name"="Read"},
 * denormalizationContext={"groups"={"role:write"},"swagger_definition_name"="Write"}
 *     )
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 * @ORM\Table(name="role")
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"role:read", "user:read","group_to_user:read","help:read","group:read"})
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="id_role")
     */
    private $relation;
    public function __invoke()
    {

    }

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

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
            $relation->setIdRole($this);
        }

        return $this;
    }

    public function removeRelation(User $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getIdRole() === $this) {
                $relation->setIdRole(null);
            }
        }

        return $this;
    }
}
