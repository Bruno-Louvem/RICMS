<?php

namespace MG\RICMS\RICMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;




/**
 * Livro controller.
 *
 */
class CapituloController extends Controller
{

    /**
     * Lists all Livro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RICMSBundle:Capitulo')->findAll();

        return $this->render('RICMSBundle:Capitulo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    
    /**
     * Finds and displays a Livro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RICMSBundle:Capitulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Capitulo entity.');
        }

        

        return $this->render('RICMSBundle:Capitulo:show.html.twig', array(
            'entity'      => $entity,
        
        ));
    }

    
}
