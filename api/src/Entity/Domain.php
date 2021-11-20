<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\DomainRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainRepository::class)]
#[ApiResource]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[ApiFilter(SearchFilter::class, strategy: 'ipartial')]
    private $domaine_name;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $registered_at;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $expired_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $expires_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $deleted_at;

    #[ORM\ManyToOne(targetEntity: Extension::class, inversedBy: 'domains')]
    #[ORM\JoinColumn(nullable: false)]
    private $extension;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'domains')]
    #[ORM\JoinColumn(nullable: false)]
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomaineName(): ?string
    {
        return $this->domaine_name;
    }

    public function setDomaineName(string $domaine_name): self
    {
        $this->domaine_name = $domaine_name;

        return $this;
    }

    public function getRegisteredAt(): ?\DateTimeImmutable
    {
        return $this->registered_at;
    }

    public function setRegisteredAt(?\DateTimeImmutable $registered_at): self
    {
        $this->registered_at = $registered_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getExpiredAt(): ?\DateTimeImmutable
    {
        return $this->expired_at;
    }

    public function setExpiredAt(?\DateTimeImmutable $expired_at): self
    {
        $this->expired_at = $expired_at;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expires_at;
    }

    public function setExpiresAt(?\DateTimeImmutable $expires_at): self
    {
        $this->expires_at = $expires_at;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeImmutable
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTimeImmutable $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getExtension(): ?Extension
    {
        return $this->extension;
    }

    public function setExtension(?Extension $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
