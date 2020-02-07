<?php

namespace App\Controller;

use App\Repository\PublicacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicacionController extends AbstractController
{
    /**
     * @Route("/ultimas", name="ultimas-publicaciones")
     */
    public function index(PublicacionRepository $pr)
    {
        //preguntar a los modelos
        $publicaciones = $pr->findAll();

        //Pintar en vista
        return $this->render('publicacion/index.html.twig', [
            'listado_publicaciones' => $publicaciones,
        ]);
    }

    /**
     * @Route("/publicacion/{id}", name="publicacion-detalle")
     */

    public function detalle($id/*, PublicacionRepository $pr*/){

        return $this->render('publicacion/detalle.html.twig', [
            'publicacion' => $id,
        ]);
    }
    /*public function detalle(Publicación $publicacion){

        $publicacion = $pr->find($id);

        if ($publicacion = null){
            throw $this->createNotFoundException('Te has equivocado');
        }

        return $this->render('publicacion/detalle.html.twig', [
            'publicacion' => $publicacion
        ]);
    }*/
}