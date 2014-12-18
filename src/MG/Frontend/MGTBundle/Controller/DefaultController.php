<?php

namespace MG\Frontend\MGTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MGTBundle:Default:index.html.twig', array('name' => $name));
    }
}
