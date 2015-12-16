<?php

namespace Librinfo\LibioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LibrinfoLibioBundle:Default:index.html.twig', array('name' => $name));
    }
}
