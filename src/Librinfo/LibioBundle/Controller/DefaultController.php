<?php

namespace Librinfo\LibioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LibrinfoLibioBundle:Default:index.html.twig', array('name' => $name));
    }

    public function testAction($name)
    {
        $em = $this->getDoctrine()->getManager();

        $contact = $this->getDoctrine()
            ->getRepository('LibrinfoCRMBundle:Contact')
            ->find('b419cf55-9ed6-4274-9cb6-b3d6f45c61d2');

        $indexes = $contact->getSearchIndexes();
        dump(count($indexes));


        return $this->render('LibrinfoLibioBundle:Default:test.html.twig', array('name' => $name));
    }
}
