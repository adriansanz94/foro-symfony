<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="PublicacionRepository")
 */
class Publicación
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
    private $título;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_publicación;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="publicaciNs", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comentario", mappedBy="publicación", orphanRemoval=true)
     */
    private $comentarios;

    public function __construct()
    {
        $this->comentarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTítulo(): ?string
    {
        return $this->título;
    }

    public function setTítulo(string $título): self
    {
        $this->título = $título;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getFechaPublicación(): ?\DateTimeInterface
    {
        return $this->fecha_publicación;
    }

    public function setFechaPublicación(\DateTimeInterface $fecha_publicación): self
    {
        $this->fecha_publicación = $fecha_publicación;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection|Comentario[]
     */
    public function getComentarios(): Collection
    {
        return $this->comentarios;
    }

    public function addComentario(Comentario $comentario): self
    {
        if (!$this->comentarios->contains($comentario)) {
            $this->comentarios[] = $comentario;
            $comentario->setPublicación($this);
        }

        return $this;
    }

    public function removeComentario(Comentario $comentario): self
    {
        if ($this->comentarios->contains($comentario)) {
            $this->comentarios->removeElement($comentario);
            // set the owning side to null (unless already changed)
            if ($comentario->getPublicación() === $this) {
                $comentario->setPublicación(null);
            }
        }

        return $this;
    }
}
