<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Comentario extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $comentarios = ["es la leche ", "como mola ", "una mierda no merece la pena ", "nada que añadir a esto"];
        foreach ($comentarios as $comentario) {
            $cat = new Categoria();
            $cat->setNombre($comentario);
            $manager->persist($cat);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
