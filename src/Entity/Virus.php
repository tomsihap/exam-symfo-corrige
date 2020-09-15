<?php

namespace App\Entity;

use App\Repository\VirusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VirusRepository::class)
 */
class Virus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $dangerousness;

    /**
     * @ORM\OneToMany(targetEntity=Stat::class, mappedBy="virus", orphanRemoval=true)
     */
    private $stats;

    public function __construct()
    {
        $this->stats = new ArrayCollection();
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

    public function getDangerousness(): ?int
    {
        return $this->dangerousness;
    }

    public function setDangerousness(int $dangerousness): self
    {
        $this->dangerousness = $dangerousness;

        return $this;
    }

    /**
     * @return Collection|Stat[]
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stat $stat): self
    {
        if (!$this->stats->contains($stat)) {
            $this->stats[] = $stat;
            $stat->setVirus($this);
        }

        return $this;
    }

    public function removeStat(Stat $stat): self
    {
        if ($this->stats->contains($stat)) {
            $this->stats->removeElement($stat);
            // set the owning side to null (unless already changed)
            if ($stat->getVirus() === $this) {
                $stat->setVirus(null);
            }
        }

        return $this;
    }
}
