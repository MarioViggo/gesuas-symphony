<?php

namespace App\Entity;

use App\Repository\BeneficenteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeneficenteRepository::class)]
class Beneficente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 11)]
    private ?string $nis = null;

    
    public function setNis(string $nis): static
    {
        $this->nis = $nis;

        return $this;
    }

    public function getNis(): ?string
    {
        return $this->nis;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }
    
    public function setNome(string $nome): static
    {
        $this->nome = $nome;
        
        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

}