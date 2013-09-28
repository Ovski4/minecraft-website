<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ovski\ForumBundle\Entity\Category;
use Ovski\ForumBundle\Form\CategoryType;

/**
 * Admin controller.
 *
 * This class contains every actions executable by users with role ROLE_ADMIN
 * 
 * @Route("/administration")
 */
class AdminController extends Controller
{
    /**
     * Redirect to listCategories
     *
     * @Route("/", name="ovski_forum_administration")
     */
    public function adminAction()
    {
        return $this->redirect(
            $this->generateUrl('ovski_forum_administration_list_categories')
        );
    }

    /* ----------------------------*
     *  CATEGORIES RELATED ACTIONS *
     * ----------------------------*/

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
        $deleteForm = $this->createCategoryDeleteForm($id);

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

        $deleteForm = $this->createCategoryDeleteForm($id);
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
     * @Route("/category/{id}/delete", name="ovski_forum_administration_category_delete")
     * @Method("DELETE")
     */
    public function deleteCategoryAction(Request $request, $id)
    {
        $form = $this->createDeleteCategoryForm($id);
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
    private function createDeleteCategoryForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ovski_forum_administration_category_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /* -----------------------*
     *  USERS RELATED ACTIONS *
     * -----------------------*/

    /**
     * @Route("/users", name="ovski_forum_administration_users")
     * @Template()
     */
    public function usersAction()
    {
        $userRepository = $this
            ->getDoctrine()
            ->getRepository("OvskiMinecraftUserBundle:User")
        ;

        $users = $userRepository->findAll();
        $moderatorUsers = $this->filterUsersModerator($users);
        $enabledUsers = $this->filterUsersWithoutRole($userRepository->getEnabledUsers());

        return array(
            'users'      => $enabledUsers,
            'moderators' => $moderatorUsers
        );
    }

    /**
     * @Route("/{id}/promote/{choice}", name="ovski_forum_moderation_promote")
     * @Method("GET")
     */
    public function promoteAction($id, $choice)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("OvskiMinecraftUserBundle:User")->findOneById($id);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        if ($choice) {
            // promote
            if (!$user->isEnabled()) {
                throw new AccessDeniedException();
            }
            $user->addRole("ROLE_MODERATOR");
            $em->persist($user);
        } else {
            // demote
            if ($user->hasRole("ROLE_ADMIN")) {
                throw new AccessDeniedException();
            }
            $user->removeRole("ROLE_MODERATOR");
            $em->persist($user);
        }
        $em->flush();
   
        return $this->redirect(
            $this->generateUrl('ovski_forum_administration_users')
        );
    }

    private function filterUsersWithoutRole($userArray)
    {
        $i = 0;
        foreach ($userArray as $user) {
            if ($user->hasRole("ROLE_MODERATOR") || $user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_SUPER_ADMIN")) {
                unset($userArray[$i]);
            }
            $i++;
        }
        return $userArray;
    }

    private function filterUsersModerator($userArray)
    {
        $i = 0;
        foreach ($userArray as $user) {
            if (!$user->hasRole("ROLE_MODERATOR") || $user->hasRole("ROLE_ADMIN")) {
                unset($userArray[$i]);
            }
            $i++;
        }
        return $userArray;
    }

    /* ------------------------*
     *  TOPICS RELATED ACTIONS *
     * ------------------------*/

    /**
     * Get all closed topics
     *
     * @Route("/topics/closed", name="ovski_forum_administration_list_closed_topics")
     * @Template()
     */
    public function closedTopicsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $hiddenTopics = $em
            ->getRepository("OvskiForumBundle:Topic")
            ->findBy(array('status' => 'closed'))
        ;

        return array('topics' => $hiddenTopics);
    }
    
    /**
     * Delete a topic
     *
     * @Route("/topic/{id}/delete", name="ovski_forum_administration_topic_delete")
     * @Method("DELETE")
     * @Template()
     */
    public function deleteTopicAction(Request $request, $id)
    {
        $form = $this->createDeleteTopicForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $topic = $em->getRepository('OvskiForumBundle:Topic')->find($id);

            if (!$topic) {
                throw $this->createNotFoundException('Unable to find Topic entity.');
            }

            if (!$topic->isClosed()) {
                throw new \Exception("Only closed topics can be deleted");
            }

            $em->remove($topic);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ovski_forum_administration_list_closed_topics'));
    }

    /**
     * Render a deleteTopicForm
     *
     * @Template()
     */
    public function deleteTopicFormAction($id)
    {
        return array('form' => $this->createDeleteTopicForm(
            $id)->createView()
        );
    }

    /**
     * Creates a form to delete a Topic entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteTopicForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ovski_forum_administration_topic_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /* ------------------------*
     *  POSTS RELATED ACTIONS *
     * ------------------------*/

    /**
     * Get all unauthorized posts
     *
     * @Route("/posts/unauthorized", name="ovski_forum_administration_list_unauthorized_posts")
     * @Template()
     */
    public function unauthorizedPostsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $unauthorizedPosts = $em
            ->getRepository("OvskiForumBundle:Post")
            ->findBy(array('status' => 'unauthorized'))
        ;

        return array('posts' => $unauthorizedPosts);
    }
    
    /**
     * Delete a topic
     *
     * @Route("/post/{id}/delete", name="ovski_forum_administration_post_delete")
     * @Method("DELETE")
     * @Template()
     */
    public function deletePostAction(Request $request, $id)
    {
        $form = $this->createDeletePostForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository('OvskiForumBundle:Post')->find($id);

            if (!$post) {
                throw $this->createNotFoundException('Unable to find Post.');
            }

            if ($post->isAuthorized()) {
                throw new \Exception("Only unauthorized posts can be deleted");
            }

            $em->remove($post);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ovski_forum_administration_list_unauthorized_posts'));
    }

    /**
     * Render a deletePostForm
     */
    public function deletePostFormAction($id)
    {
        return $this->render(
            'OvskiForumBundle::form.html.twig',
            array('form' => $this->createDeletePostForm($id)->createView())
        );
    }

    /**
     * Creates a form to delete a Post entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeletePostForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ovski_forum_administration_post_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Authorize a post
     * 
     * @Method("PUT")
     * @Route("/post/{id}/authorize", name="ovski_forum_moderation_post_authorize")
     */
    public function authorizedPostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository("OvskiForumBundle:Post")->findOneById($id);

        if (!$post) {
            throw $this->createNotFoundException();
        }

        if (!$post->isAuthorized()) {
            $post->setStatus("authorized");
            $post->getTopic()->incrementNumPosts();
            $em->persist($post);
            $em->flush();
        }

        return $this->redirect(
            $this->generateUrl('ovski_forum_administration_list_unauthorized_posts')
        );
    }

    /**
     * Render a authorizePostForm
     */
    public function authorizedPostFormAction($id)
    {
        return $this->render(
                'OvskiForumBundle::form.html.twig',
                array('form' => $this->createAuthorizedPostForm($id)->createView())
        );
    }

    /**
     * Creates a form to unauthorize a Post entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createAuthorizedPostForm($id)
    {
        $qb = $this->createFormBuilder()
            ->setAction(
                $this->generateUrl('ovski_forum_moderation_post_authorize', array(
                    'id'           => $id
                ))
            )
            ->setMethod('PUT')
        ;

        $qb->add('submit', 'submit', array('label' => 'authorize'));

        return $qb->getForm();
    }
}
