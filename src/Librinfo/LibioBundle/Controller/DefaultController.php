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
            ->find('d2ffab2d-2b6f-4b7d-bf40-8c753e49e716');

        $keywords = $contact->analyseField('shortname');
        dump($keywords);
//        foreach ( $keywords as $keyword )
//        {
//            $index = new \Librinfo\CRMBundle\Entity\ContactSearchIndex();
//            $index->setObject($contact);
//            $index->setField('shortname');
//            $index->setKeyword($keyword);
//            $em->persist($index);
//            //dump($index);
//        }
//
//        $contact->setName('Bezerra de Menezes');
//        $contact->setFirstname('Marcos');
//        $contact->setShortname('13 aa   bb cç@œ~Dd éÉ');
//        $contact->setEmail('marcos.bezerra@libre-informatique.fr');
//        $em->persist($contact);
//        $em->flush();



        return $this->render('LibrinfoLibioBundle:Default:test.html.twig', array(
                'name' => $name));
    }

}
