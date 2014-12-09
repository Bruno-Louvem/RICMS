<?php

namespace MG\RICMS\RICMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RICMSBundle:Default:index.html.twig', array());
    }
    public function aboutAction()
    {
        return $this->render('RICMSBundle:Pages:about.html.twig', array());
    }
}
