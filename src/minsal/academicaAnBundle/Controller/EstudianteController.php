<?php

namespace minsal\academicaAnBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use minsal\academicaAnBundle\Entity\Estudiante;
use minsal\academicaAnBundle\Form\EstudianteType;

/**
 * Estudiante controller.
 *
 * @Route("/estudiante")
 */
class EstudianteController extends Controller
{

    /**
     * Lists all Estudiante entities.
     *
     * @Route("/", name="estudiante")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('minsalacademicaAnBundle:Estudiante')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Estudiante entity.
     *
     * @Route("/", name="estudiante_create")
     * @Method("POST")
     * @Template("minsalacademicaAnBundle:Estudiante:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Estudiante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudiante_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Estudiante entity.
     *
     * @param Estudiante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Estudiante $entity)
    {
        $form = $this->createForm(new EstudianteType(), $entity, array(
            'action' => $this->generateUrl('estudiante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Estudiante entity.
     *
     * @Route("/new", name="estudiante_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Estudiante();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Estudiante entity.
     *
     * @Route("/{id}", name="estudiante_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $ajax = $this->getRequest()->isXmlHttpRequest();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('minsalacademicaAnBundle:Estudiante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estudiante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'ajax'        => $ajax,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Estudiante entity.
     *
     * @Route("/{id}/edit", name="estudiante_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('minsalacademicaAnBundle:Estudiante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estudiante entity.');
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
    * Creates a form to edit a Estudiante entity.
    *
    * @param Estudiante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Estudiante $entity)
    {
        $form = $this->createForm(new EstudianteType(), $entity, array(
            'action' => $this->generateUrl('estudiante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Estudiante entity.
     *
     * @Route("/{id}", name="estudiante_update")
     * @Method("PUT")
     * @Template("minsalacademicaAnBundle:Estudiante:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('minsalacademicaAnBundle:Estudiante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estudiante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estudiante_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Estudiante entity.
     *
     * @Route("/{id}", name="estudiante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('minsalacademicaAnBundle:Estudiante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Estudiante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudiante'));
    }

    /**
     * Creates a form to delete a Estudiante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estudiante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
