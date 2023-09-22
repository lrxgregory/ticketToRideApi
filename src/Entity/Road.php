<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RoadRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: RoadRepository::class)]
class Road
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getRoads"])]
    private ?string $start = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getRoads"])]
    private ?string $end = null;

    #[ORM\Column]
    #[Groups(["getRoads"])]
    private ?int $score = null;

    #[ORM\Column]
    #[Groups(["getRoads"])]
    private ?int $wagonNumber = null;

    #[ORM\Column]
    #[Groups(["getRoads"])]
    private ?bool $locomotive = null;

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

    public function getWagonNumber(): ?int
    {
        return $this->wagonNumber;
    }

    public function setWagonNumber(int $wagonNumber): self
    {
        $this->wagonNumber = $wagonNumber;

        return $this;
    }

    public function isLocomotive(): ?bool
    {
        return $this->locomotive;
    }

    public function setLocomotive(bool $locomotive): self
    {
        $this->locomotive = $locomotive;

        return $this;
    }
}
