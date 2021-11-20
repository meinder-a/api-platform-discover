<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExtensionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtensionRepository::class)]
#[ApiResource]
class Extension
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $extension;

    #[ORM\ManyToOne(targetEntity: ExtensionType::class, inversedBy: 'extensions')]
    #[ORM\JoinColumn(nullable: false)]
    private $extension_type;

    #[ORM\OneToMany(mappedBy: 'extension', targetEntity: Domain::class, orphanRemoval: true)]
    private $domains;

    public function __construct()
    {
        $this->domains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getExtensionType(): ?ExtensionType
    {
        return $this->extension_type;
    }

    public function setExtensionType(?ExtensionType $extension_type): self
    {
        $this->extension_type = $extension_type;

        return $this;
    }

    /**
     * @return Collection|Domain[]
     */
    public function getDomains(): Collection
    {
        return $this->domains;
    }

    public function addDomain(Domain $domain): self
    {
        if (!$this->domains->contains($domain)) {
            $this->domains[] = $domain;
            $domain->setExtension($this);
        }

        return $this;
    }

    public function removeDomain(Domain $domain): self
    {
        if ($this->domains->removeElement($domain)) {
            // set the owning side to null (unless already changed)
            if ($domain->getExtension() === $this) {
                $domain->setExtension(null);
            }
        }

        return $this;
    }
}
