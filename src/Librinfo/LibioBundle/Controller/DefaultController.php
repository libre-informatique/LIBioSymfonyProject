<?php

namespace Librinfo\LibioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('LibrinfoLibioBundle:Default:index.html.twig', array(
                'name' => $name));
    }

    public function testAction($name)
    {
        $em = $this->getDoctrine()->getManager();

        $contact = $this->getDoctrine()
            ->getRepository('LibrinfoCRMBundle:Contact')
            ->find('b419cf55-9ed6-4274-9cb6-b3d6f45c61d2');

        $contact->setName($name);
        $contact->setFirstname('Marcos');
        $contact->setShortname($name);
        $contact->setEmail('marcos.bezerra@libre-informatique.com3');
        $contact->setTitle('Dr');
        $em->persist($contact);

        $organism = $this->getDoctrine()
            ->getRepository('LibrinfoCRMBundle:Organism')
            ->find('9285a971-77d1-44ef-aea1-4dd914e45a71');
        $organism->setName($name . " ORG");


        $em->flush();


        return $this->render('LibrinfoLibioBundle:Default:test.html.twig', array(
                'name' => $name));
    }

}
