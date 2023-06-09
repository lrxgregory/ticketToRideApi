<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DestinationRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DestinationRepository::class)]
class Destination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getDestinations"])]
    private ?string $start = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getDestinations"])]
    private ?string $end = null;

    #[ORM\Column]
    #[Groups(["getDestinations"])]
    private ?int $score = null;

    #[ORM\Column]
    #[Groups(["getDestinations"])]
    private ?bool $longDestination = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?string
    {
        return $this->start;
    }

    public function setStart(string $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(string $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function isLongDestination(): ?bool
    {
        return $this->longDestination;
    }

    public function setLongDestination(bool $longDestination): self
    {
        $this->longDestination = $longDestination;

        return $this;
    }
}
