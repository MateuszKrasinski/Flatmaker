<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\HelpRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"help:read"},"swagger_definition_name"="Read"},
 * denormalizationContext={"groups"={"help:write"},"swagger_definition_name"="Write"}
 * )
 * @ORM\Entity(repositoryClass=HelpRepository::class)
 */
class Help
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="relation_")
     * @Groups({"help:read","group:read"})
     */
    private $id_from;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="relation1")
     * @Groups({"help:read","group:read"})
     */
    private $id_to;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="relation")
     * @Groups({"help:read","group:read"})
     */
    private $id_type;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="helps")
     *
     */
    private $id_group;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"help:read","group:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"help:read","group:read"})
     */
    private $value;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getIdFrom(): ?User
    {
        return $this->id_from;
    }

    public function setIdFrom(?User $id_from): self
    {
        $this->id_from = $id_from;

        return $this;
    }

    public function getIdTo(): ?User
    {
        return $this->id_to;
    }

    public function setIdTo(?User $id_to): self
    {
        $this->id_to = $id_to;

        return $this;
    }

    public function getIdType(): ?Type
    {
        return $this->id_type;
    }

    public function setIdType(?Type $id_type): self
    {
        $this->id_type = $id_type;

        return $this;
    }

    public function getIdGroup(): ?Group
    {
        return $this->id_group->getRelation();
    }

    public function setIdGroup(?Group $id_group): self
    {
        $this->id_group= $id_group;

        return $this;
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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
