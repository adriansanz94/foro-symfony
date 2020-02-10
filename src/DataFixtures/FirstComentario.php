<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use App\Entity\Comentario;
use App\Entity\Publicación;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FirstComentario extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contenidos = ['Esto es lo maximo','Esto es lo peor','Ame estos momentos','Viva la vida','De mal a peor','Mi vida cambio','Prefiero morir','Hasta junio','Hasta septiembre','Necesito dormir mas','Pizza time','Nunca nunca jamas jamas','Aguacates'];
        $comentarios = ['Lo apoyo','Que va','Correcto','Ni loco','TT_TT',':D'];
        $repoCat = $manager->getRepository(Categoria::class);

        $repoUser = $manager->getRepository(User::class);

        $u = $repoUser->findOneBy([
            'username' => 'jorge@asd.es'
        ]);

        $minCat = min($repoCat->findAll())->getId();
        $maxCat = max($repoCat->findAll())->getId();


        foreach ($contenidos as $contenido){
            $p = new Publicación();

            $random = mt_rand($minCat,$maxCat);
            $c = $repoCat->find($random);
           // dump($c);

            $p->setCategoria($c);
            $p->setContenido($contenido);
            $p->setTítulo($contenidos[mt_rand(0,count($contenidos)-1)]);
            $p->setFechaPublicación(new \DateTime("now"));
            $p->setUsuario($u);

            for ($i = 0 ; $i < mt_rand(0,count($comentarios)-1) ; $i++){
                $com = new Comentario();
                $com->setContenido($comentarios[mt_rand(0,count($comentarios)-1)]);
                $com->setFechaPublicación(new \DateTime('now'));

                $com->setPublicación($p);
                $com->setUsuario($u);

                $manager->persist($com);
            }

            $manager->persist($p);
        }




        $manager->flush();
    }


}
