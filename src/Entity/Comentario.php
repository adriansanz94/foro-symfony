<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComentarioRepository")
 */
class Comentario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_publicación;

    /**
     * @ORM\Column(type="text")
     */
    private $contenido;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publicación", inversedBy="comentarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publicación;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comentarios")
     */
    private $Usuario;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getPublicación(): ?Publicación
    {
        return $this->publicación;
    }

    public function setPublicación(?Publicación $publicación): self
    {
        $this->publicación = $publicación;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->Usuario;
    }

    public function setUsuario(?User $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }
}
