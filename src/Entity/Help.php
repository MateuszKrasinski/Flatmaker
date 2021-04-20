<?php

namespace App\Entity;

use App\Repository\HelpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
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
     */
    private $id_from;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="relation1")
     */
    private $id_to;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="relation")
     */
    private $id_type;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="helps")
     */
    private $id_group;

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
        return $this->id_group;
    }

    public function setIdGroup(?Group $id_group): self
    {
        $this->id_group= $id_group;

        return $this;
    }
}
