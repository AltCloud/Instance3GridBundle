<?php

namespace AltCloud\Instance3GridBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AltCloud\Instance3GridBundle\Entity\Grid;
use AltCloud\Instance3GridBundle\Form\GridType;

/**
 * Grid controller.
 *
 */
class GridController extends Controller
{

	public function renderPartialAction($id)
	{
			$grid = $this->getDoctrine()
				->getRepository('ACInst3GridBundle:Grid')
				->find($id);

			if (!$grid) {
				throw $this->createNotFoundException('No Grid found for id '.$id);
			}
		
        	return $this->render('ACInst3GridBundle:Grid:renderPartial.html.twig', array('grid' => $grid));
    }

	public function renderAction($id, $node=false)
	{
			$grid = $this->getDoctrine()
				->getRepository('ACInst3GridBundle:Grid')
				->find($id);

			if (!$grid) {
				throw $this->createNotFoundException('No Grid found for id '.$id);
			}
	
			if (is_object($node)){
				$nodetpl = $node->getSite()->getDeftemp();
				if(is_string($nodetpl))
					$tpl=$nodetpl;
			}
			
			if(!isset($tpl)){
				// Determine tpl based on request uri, if possible
			}
			
			if(!isset($tpl)){
				// Use default tpl
				// FIXME: Move to setting somewhere
				$tpl="JMCOMFLFTBundle::layout.html.twig";
			}
		
        	return $this->render('ACInst3GridBundle:Grid:render.html.twig', array('grid' => $grid, 'tpl' => $tpl, 'node' => $node));
    }

    /**
     * Lists all Grid entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('ACInst3GridBundle:Grid')->findAll();

        return $this->render('ACInst3GridBundle:Grid:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Grid entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3GridBundle:Grid')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grid entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3GridBundle:Grid:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Grid entity.
     *
     */
    public function newAction()
    {
        $entity = new Grid();
        $form   = $this->createForm(new GridType(), $entity);

        return $this->render('ACInst3GridBundle:Grid:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Grid entity.
     *
     */
    public function createAction()
    {
        $entity  = new Grid();
        $request = $this->getRequest();
        $form    = $this->createForm(new GridType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_grid_show', array('id' => $entity->getId())));
            
        }

        return $this->render('ACInst3GridBundle:Grid:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Grid entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3GridBundle:Grid')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grid entity.');
        }

        $editForm = $this->createForm(new GridType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ACInst3GridBundle:Grid:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Grid entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ACInst3GridBundle:Grid')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grid entity.');
        }

        $editForm   = $this->createForm(new GridType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_grid_edit', array('id' => $id)));
        }

        return $this->render('ACInst3GridBundle:Grid:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Grid entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('ACInst3GridBundle:Grid')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Grid entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_grid'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
