<?php

namespace App\Controller;

use App\Entity\Thing;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ThingController extends Controller
{
    /**
     * @Route("/thing", name="things")
     */
    public function index()
    {
        return $this->forward('App\Controller\IndexController::index');
    }

    /**
     * @Route("/thing/{id}", name="thing", requirements={"id"="\d+"})
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function thing(int $id)
    {
        $thing = $this->getDoctrine()->getRepository(Thing::class)->findOneBy(['inventoryId' => $id]);

        if ($thing === null) {
            throw $this->createNotFoundException('Tool not found');
        }

        return $this->render('thing/index.html.twig', [
            'thing' => $thing,
        ]);
    }

    /**
     * @Route("/t/{id}", name="thing_short", requirements={"id"="\d+"})
     * @param $id int
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function shortTool(int $id) {
        return $this->forward('App\Controller\ThingController::thing', [
            'id' => $id
        ]);
    }
}
