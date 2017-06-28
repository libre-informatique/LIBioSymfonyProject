<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AppBundle:Default:index.html.twig', ['name' => $name]);
    }

    public function notImplementedAction()
    {
        throw new HttpException(218,'not_implemented');
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
