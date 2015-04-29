<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Articles;
use AdminBundle\Form\ArticlesType;

/**
 * Articles controller.
 *
 */
class ArticlesController extends Controller
{

    /**
     * Lists all Articles entities.
     *
     */
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminBundle:Articles')->findAll();

        return $this->render('AdminBundle:Articles:index.html.twig', [
            'entities' => $entities,
            'user'=>$user,
        ]);
    }
    /**
     * Creates a new Articles entity.
     *
     */
    public function createAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity = new Articles();
        $form = $this->createForm(new ArticlesType(), $entity, array(
            'action' => $this->generateUrl('articles_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articles_show', array('id' => $entity->getId())));
        }

        return $this->render('AdminBundle:Articles:new.html.twig', array(
            'user'=>$user,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Articles entity.
     *
     */
    public function showAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminBundle:Articles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articles entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AdminBundle:Articles:show.html.twig', array(
            'user'=>$user,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Articles entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity = $em->getRepository('AdminBundle:Articles')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articles entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArticlesType(), $entity, array(
            'action' => $this->generateUrl('articles_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $editForm->add('submit', 'submit', array('label' => 'Update'));
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('articles_show', array('id' => $id)));
        }

        return $this->render('AdminBundle:Articles:edit.html.twig', array(
            'user'=>$user,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Articles entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminBundle:Articles')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Articles entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('articles'));
    }

    /**
     * Creates a form to delete a Articles entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articles_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
