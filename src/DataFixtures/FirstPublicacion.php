<?php

namespace App\DataFixtures;

use App\Entity\Publicación;
use App\Entity\Categoria;
use App\Repository\CategoriaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\DataFixtures;

class FirstPublicacion extends Fixture
{
    private $manager;

    private function crearPublicacion(
        $título,
        $contenido,
        $fecha,
        $nombreCategoria
    ){
        $repoCat = $this->manager->getRepository(Categoria::class);
        $p = new Publicación();
        $c = $repoCat->findOneBy(
            ['nombre' => 'Programación']
        );

        $p->setCategoria($c);
        $p->setTítulo($título);
        $p->setContenido($contenido);
        $p->setFechaPublicación($fecha);

        $this->manager->persist($p);

        $this->manager->flush();
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->crearPublicacion(
            "Mi primera publicación",
            "Hola mundo de Symfony",
            new \DateTime("now"),
            "Programación"
        );
    }
}
