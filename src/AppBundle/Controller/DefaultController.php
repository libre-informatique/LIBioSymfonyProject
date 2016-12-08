<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AppBundle:Default:index.html.twig', ['name' => $name]);
    }

    public function notImplementedAction()
    {
        throw $this->createNotFoundException('This functionality has not been implemented yet');
    }

    public function testAction($name)
    {
        /*
        $em = $this->getDoctrine()->getManager();
        $pc = new \Librinfo\VarietiesBundle\Entity\PlantCategory();
        $pc->setName($name);
        $pc->setCode($name);
        $em->persist($pc);
        $em->flush();
        */

        return $this->render('AppBundle:Default:test.html.twig', ['name' => $name]);
    }
}
