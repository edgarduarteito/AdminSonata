<?php

namespace minsal\academicaAnBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use minsal\academicaAnBundle\Entity\Asignatura;
use minsal\academicaAnBundle\Form\AsignaturaType;

/**
 * Asignatura controller.
 *
 * @Route("/asignatura")
 */
class AsignaturaController extends Controller
{

    /**
     * Lists all Asignatura entities.
     *
     * @Route("/", name="asignatura")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('minsalacademicaAnBundle:Asignatura')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Asignatura entity.
     *
     * @Route("/", name="asignatura_create")
     * @Method("POST")
     * @Template("minsalacademicaAnBundle:Asignatura:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Asignatura();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('asignatura_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Asignatura entity.
     *
     * @param Asignatura $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Asignatura $entity)
    {
        $form = $this->createForm(new AsignaturaType(), $entity, array(
            'action' => $this->generateUrl('asignatura_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Asignatura entity.
     *
     * @Route("/new", name="asignatura_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Asignatura();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Asignatura entity.
     *
     * @Route("/{id}", name="asignatura_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('minsalacademicaAnBundle:Asignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Asignatura entity.
     *
     * @Route("/{id}/edit", name="asignatura_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('minsalacademicaAnBundle:Asignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignatura entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Asignatura entity.
    *
    * @param Asignatura $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Asignatura $entity)
    {
        $form = $this->createForm(new AsignaturaType(), $entity, array(
            'action' => $this->generateUrl('asignatura_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Asignatura entity.
     *
     * @Route("/{id}", name="asignatura_update")
     * @Method("PUT")
     * @Template("minsalacademicaAnBundle:Asignatura:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('minsalacademicaAnBundle:Asignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Asignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('asignatura_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Asignatura entity.
     *
     * @Route("/{id}", name="asignatura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('minsalacademicaAnBundle:Asignatura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Asignatura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('asignatura'));
    }

    /**
     * Creates a form to delete a Asignatura entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('asignatura_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
