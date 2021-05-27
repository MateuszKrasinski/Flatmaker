<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;

use App\Repository\GroupToUserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"group_to_user:read"},"swagger_definition_name"="Read"},
 * denormalizationContext={"groups"={"group_to_user:write"},"swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass=GroupToUserRepository::class)
 */
class GroupToUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="relation")
     * @Groups({"group_to_user:read","group:read"})
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="relation")
     *
     */
    private $id_group;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdGroup(): ?Group
    {
        return $this->id_group;
    }

    public function setIdGroup(?Group $id_group): self
    {
        $this->id_group = $id_group;

        return $this;
    }
}
