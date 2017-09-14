<?php

/*
 * This file is part of the Lisem Project.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AppBundle:Default:index.html.twig', ['name' => $name]);
    }

    public function notImplementedAction()
    {
        throw new HttpException(218, 'not_implemented');
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

        /* return $this->render('AppBundle:Default:test.html.twig', ['name' => $name]); */

        $em = $this->getDoctrine()->getManager();
        $order = $em->getRepository('\Librinfo\EcommerceBundle\Entity\Order')->find('ad224830-a581-4e8c-b783-2c0d0e5321e4');

        if ($name == 'pdf') {
            $factory = $this->get('librinfo_ecommerce.factory.invoice');
            $invoice = $factory->createForOrder($order);
            $em->persist($invoice);
            $em->flush();

            return new Response(
                $invoice->getFile(),
                200,
                ['Content-Type' => 'application/pdf']
            );
        }

        if ($name == 'email') {
            $emailManager = $this->get('librinfo_ecommerce.email_manager.order');
            $emailManager->sendConfirmationEmail($order);
            die('email sent');
        }

        $invoice = new \Librinfo\EcommerceBundle\Entity\Invoice();

        $registry = $this->get('blast_core.code_generators');
        $generator = $registry::getCodeGenerator(get_class($invoice), 'number');
        $number = $generator::generate($invoice);

        if ($this->container->has('profiler')) {
            $this->container->get('profiler')->disable();
        }

        $data = [
            'order'    => $order,
            'number'   => $number,
            'date'     => date('d/m/Y'),
            'base_dir' => '',
        ];

        return $this->render('LibrinfoEcommerceBundle:Invoice:default.html.twig', $data);
    }

    public function testEmailAction()
    {
        $movie = ['title' => 'MovieTitle'];
        $user = ['name' => 'UserName'];
        $this->get('sylius.email_sender')->send('test_email', ['recipient@website.com'], ['movie' => $movie, 'user' => $user]);

        die('done');
    }
}
