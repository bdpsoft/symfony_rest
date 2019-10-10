<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $company_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CompanyUser", mappedBy="company")
     */
    private $companyUsers;


    public function __construct()
    {
        $this->companyUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): self
    {
        $this->company_name = $company_name;

        return $this;
    }

    /**
     * @return Collection|CompanyUser[]
     */
    public function getCompanyUsers(): Collection
    {
        return $this->companyUsers;
    }

    public function addCompanyUser(CompanyUser $companyUser): self
    {
        if (!$this->companyUsers->contains($companyUser)) {
            $this->companyUsers[] = $companyUser;
            $companyUser->setCompany($this);
        }

        return $this;
    }

    public function removeCompanyUser(CompanyUser $companyUser): self
    {
        if ($this->companyUsers->contains($companyUser)) {
            $this->companyUsers->removeElement($companyUser);
            // set the owning side to null (unless already changed)
            if ($companyUser->getCompany() === $this) {
                $companyUser->setCompany(null);
            }
        }

        return $this;
    }

    
}
