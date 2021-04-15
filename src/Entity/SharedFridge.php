<?php

namespace App\Entity;

use App\Repository\SharedFridgeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SharedFridgeRepository::class)
 */
class SharedFridge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_from;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_to;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $returned;

    /**
     * @ORM\Column(type="date")
     */
    private $created;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFrom(): ?int
    {
        return $this->id_from;
    }

    public function setIdFrom(int $id_from): self
    {
        $this->id_from = $id_from;

        return $this;
    }

    public function getIdTo(): ?int
    {
        return $this->id_to;
    }

    public function setIdTo(int $id_to): self
    {
        $this->id_to = $id_to;

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

    public function getReturned(): ?bool
    {
        return $this->returned;
    }

    public function setReturned(bool $returned): self
    {
        $this->returned = $returned;

        return $this;
    }

    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function setCreated(\DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }
}
