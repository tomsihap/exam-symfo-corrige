<?php

namespace App\Entity;

use App\Repository\StatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatRepository::class)
 */
class Stat
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
    private $contaminated;

    /**
     * @ORM\Column(type="integer")
     */
    private $healed;

    /**
     * @ORM\Column(type="integer")
     */
    private $zombified;

    /**
     * @ORM\Column(type="datetime")
     */
    private $entryDate;

    /**
     * @ORM\ManyToOne(targetEntity=Virus::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $virus;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContaminated(): ?int
    {
        return $this->contaminated;
    }

    public function setContaminated(int $contaminated): self
    {
        $this->contaminated = $contaminated;

        return $this;
    }

    public function getHealed(): ?int
    {
        return $this->healed;
    }

    public function setHealed(int $healed): self
    {
        $this->healed = $healed;

        return $this;
    }

    public function getZombified(): ?int
    {
        return $this->zombified;
    }

    public function setZombified(int $zombified): self
    {
        $this->zombified = $zombified;

        return $this;
    }

    public function getEntryDate(): ?\DateTimeInterface
    {
        return $this->entryDate;
    }

    public function setEntryDate(\DateTimeInterface $entryDate): self
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    public function getVirus(): ?Virus
    {
        return $this->virus;
    }

    public function setVirus(?Virus $virus): self
    {
        $this->virus = $virus;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }
}
