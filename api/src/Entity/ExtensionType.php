<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExtensionTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExtensionTypeRepository::class)]
#[ApiResource]
class ExtensionType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\OneToMany(mappedBy: 'extension_type', targetEntity: Extension::class, orphanRemoval: true)]
    private $extensions;

    public function __construct()
    {
        $this->extensions = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Extension[]
     */
    public function getExtensions(): Collection
    {
        return $this->extensions;
    }

    public function addExtension(Extension $extension): self
    {
        if (!$this->extensions->contains($extension)) {
            $this->extensions[] = $extension;
            $extension->setExtensionType($this);
        }

        return $this;
    }

    public function removeExtension(Extension $extension): self
    {
        if ($this->extensions->removeElement($extension)) {
            // set the owning side to null (unless already changed)
            if ($extension->getExtensionType() === $this) {
                $extension->setExtensionType(null);
            }
        }

        return $this;
    }
}
