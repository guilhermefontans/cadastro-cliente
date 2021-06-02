<?php

namespace App\Entity;

use App\Repository\ProdutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProdutoRepository::class)
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @ORM\ManyToMany(targetEntity=Loja::class, mappedBy="produtos")
     */
    private $lojas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    public function __construct()
    {
        $this->lojas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return Collection|Loja[]
     */
    public function getLojas(): Collection
    {
        return $this->lojas;
    }

    public function addLoja(Loja $loja): self
    {
        if (!$this->lojas->contains($loja)) {
            $this->lojas[] = $loja;
            $loja->addProduto($this);
        }

        return $this;
    }

    public function removeLoja(Loja $loja): self
    {
        if ($this->lojas->removeElement($loja)) {
            $loja->removeProduto($this);
        }

        return $this;
    }

    public function __toString()
    {
        return sprintf('%d - %s',$this->id, $this->description);
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
