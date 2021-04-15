<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillRepository::class)
 */
class Bill
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
    private $from_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $to_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $settled;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromId(): ?int
    {
        return $this->from_id;
    }

    public function setFromId(int $from_id): self
    {
        $this->from_id = $from_id;

        return $this;
    }

    public function getToId(): ?int
    {
        return $this->to_id;
    }

    public function setToId(int $to_id): self
    {
        $this->to_id = $to_id;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSettled(): ?bool
    {
        return $this->settled;
    }

    public function setSettled(bool $settled): self
    {
        $this->settled = $settled;

        return $this;
    }
}
