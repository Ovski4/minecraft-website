<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ovski\ForumBundle\Entity\Category;
use Ovski\ForumBundle\Form\CategoryType;

/**
 * Admin controller.
 *
 * @Route("/administration")
 */
class AdminController extends Controller
{
    /**
     * Redirect to listCategories
     *
     * @Route("/")
     */
    public function adminAction()
    {
        return $this->redirect(
            $this->generateUrl('ovski_forum_administration_list_categories')
        );
    }

    /**
     * Lists all Categories.
     *
     * @Route("/categories", name="ovski_forum_administration_list_categories")
     * @Method("GET")
     * @Template()
     */
    public function listCategoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('OvskiForumBundle:Category')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Creates a new Category entity.
     *
     * @Route("/category/create", name="ovski_forum_administration_category_create")
     * @Method("POST")
     * @Template("OvskiForumBundle:Admin:newCategory.html.twig")
     */
    public function createCategoryAction(Request $request)
    {
        $entity = new Category();
        $form = $this->createCategoryForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect(
                $this->generateUrl('ovski_forum_administration_category_show',
                    array('id' => $entity->getId())
                )
            );
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

   /**
    * Creates a form to create a Category entity.
    *
    * @param Category $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCategoryForm(Category $entity)
    {
        $form = $this->createForm(
            new CategoryType($this->container->getParameter('ovski_forum.locales')),
            $entity, array(
                'action' => $this->generateUrl('ovski_forum_administration_category_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Category entity.
     *
     * @Route("/category/new", name="ovski_forum_administration_category_new")
     * @Method("GET")
     * @Template()
     */
    public function newCategoryAction()
    {
        $entity = new Category();
        $form   = $this->createCategoryForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/category/{id}", name="ovski_forum_administration_category_show")
     * @Method("GET")
     * @Template()
     */
    public function showCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OvskiForumBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     * @Route("/category/{id}/edit", name="ovski_forum_administration_category_edit")
     * @Method("GET")
     * @Template()
     */
    public function editCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OvskiForumBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
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
    * Creates a form to edit a Category entity.
    *
    * @param Category $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Category $entity)
    {
        $form = $this->createForm(
            new CategoryType($this->container->getParameter('ovski_forum.locales')),
            $entity,
            array(
                'action' => $this->generateUrl(
                    'ovski_forum_administration_category_update',
                    array('id' => $entity->getId())
                ),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Category entity.
     *
     * @Route("/category/{id}", name="ovski_forum_administration_category_update")
     * @Method("PUT")
     * @Template("OvskiForumBundle:Admin:editCategory.html.twig")
     */
    public function updateCategoryAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OvskiForumBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_forum_category_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Category entity.
     *
     * @Route("/category/{id}", name="ovski_forum_administration_category_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OvskiForumBundle:Category')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Category entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_forum_listcategories'));
    }

    /**
     * Creates a form to delete a Category entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ovski_forum_administration_category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
