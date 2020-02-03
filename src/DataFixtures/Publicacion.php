<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Publicacion extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $titulo = ["el juego del año FIFA", "mejor partida de ajedrez","receta de la abuela"];
        $contenido = ["este es el mejor juego del año por que yo lo idgo y punto ","el otro dia gane a un niño rata con jaque mate en 10 turnos","como es secreta te jodes y no sabras cual es"];
        $fecha_publicacion=["02-02-2020","01-01-2020","30-02-2020"];
         for ($i=0;$i<count($titulo);$i++ ) {
              $publicacion = new Publicacion();
             $publicacion->setTitulo($titulo[$i]);
             $publicacion->setContenido($contenido[$i]);
             $publicacion->setFechaPublic($fecha_publicacion[$i]);
             $manager->persist($publicacion);
          }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
