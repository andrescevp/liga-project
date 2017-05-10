<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('AppBundle:Player')->findAll();
        $clubs = $em->getRepository('AppBundle:Club')->findAll();


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'clubs' => $clubs,
            'playes' => $players
        ]);
    }
}
