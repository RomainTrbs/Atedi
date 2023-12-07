<?php

namespace App\Entity;

use App\Entity\Intervention;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PropsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: PropsRepository::class)]
#[ORM\Table(name:tbl_props)]
class Props
{

     #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column]
    private ?int $id;


    #[ORM\Column(length: 255)]     
    private ?string $title;

    
     #[ORM\OneToMany(targetEntity: "App\Entity\Intervention", mappedBy: "props")]
    private $interventions;

    public function __construct()
    {
        $this->interventions = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setProps($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->interventions->contains($intervention)) {
            $this->interventions->removeElement($intervention);
            // set the owning side to null (unless already changed)
            if ($intervention->getProps() === $this) {
                $intervention->setProps(null);
            }
        }

        return $this;
    }
}
