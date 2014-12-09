<?php

namespace MG\RICMS\RICMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MG\RICMS\RICMSBundle\Entity\Livro;
use MG\RICMS\RICMSBundle\Form\LivroType;

/**
 * Livro controller.
 *
 */
class LivroController extends Controller
{

    /**
     * Lists all Livro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RICMSBundle:Livro')->findAll();

        return $this->render('RICMSBundle:Livro:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Livro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Livro();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('livro_show', array('id' => $entity->getId())));
        }

        return $this->render('RICMSBundle:Livro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Livro entity.
     *
     * @param Livro $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Livro $entity)
    {
        $form = $this->createForm(new LivroType(), $entity, array(
            'action' => $this->generateUrl('livro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Livro entity.
     *
     */
    public function newAction()
    {
        $entity = new Livro();
        $form   = $this->createCreateForm($entity);

        return $this->render('RICMSBundle:Livro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Livro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RICMSBundle:Livro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Livro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RICMSBundle:Livro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Livro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RICMSBundle:Livro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Livro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RICMSBundle:Livro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Livro entity.
    *
    * @param Livro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Livro $entity)
    {
        $form = $this->createForm(new LivroType(), $entity, array(
            'action' => $this->generateUrl('livro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Livro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RICMSBundle:Livro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Livro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('livro_edit', array('id' => $id)));
        }

        return $this->render('RICMSBundle:Livro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Livro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RICMSBundle:Livro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Livro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('livro'));
    }

    /**
     * Creates a form to delete a Livro entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
