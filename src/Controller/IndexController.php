<?php

namespace App\Controller;

use App\Entity\Thing;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        /** @var Thing[] $things */
        $things = $this->getDoctrine()->getRepository(Thing::class)->findBy([], null, 50);

        return $this->render('index/index.html.twig', [
            'things' => $things,
        ]);
    }
}
