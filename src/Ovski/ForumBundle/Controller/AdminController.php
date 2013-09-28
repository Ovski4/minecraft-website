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
 * This class contains every actions executable by users with role ROLE_ADMIN
 * 
 * @Route("/administration")
 */
class AdminController extends Controller
{
    /**
     * Redirects to ovski_forum_administration_list_categories
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
     * Lists all categories.
     *
     * @Route("/category/list", name="ovski_forum_administration_list_categories")
     * @Method("GET")
     * @Template()
     */
    public function listCategoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('OvskiForumBundle:Category')->findAll();

        return array('categories' => $categories);
    }

    /**
     * Creates a new category
     *
     * @Route("/category/create", name="ovski_forum_administration_category_create")
     * @Method("POST")
     * @Template("OvskiForumBundle:Admin:newCategory.html.twig")
     */
    public function createCategoryAction(Request $request)
    {
        $category = new Category();
        $form = $this->createCategoryForm($category);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirect(
                $this->generateUrl('ovski_forum_administration_category_show',
                    array('id' => $category->getId())
                )
            );
        }

        return array(
            'category' => $category,
            'form'     => $form->createView(),
        );
    }

   /**
    * Creates a form to create a category
    *
    * @param Category $category
    * @return \Symfony\Component\Form\Form
    */
    private function createCategoryForm(Category $category)
    {
        $form = $this->createForm(
            new CategoryType($this->container->getParameter('ovski_forum.locales')),
            $category, array(
                'action' => $this->generateUrl('ovski_forum_administration_category_create'),
                'method' => 'POST'
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new category
     *
     * @Route("/category/new", name="ovski_forum_administration_category_new")
     * @Method("GET")
     * @Template()
     */
    public function newCategoryAction()
    {
        $category = new Category();
        $form = $this->createCategoryForm($category);

        return array(
            'category' => $category,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a category
     *
     * @Route("/category/{id}", name="ovski_forum_administration_category_show")
     * @Method("GET")
     * @Template()
     */
    public function showCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('OvskiForumBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                sprintf("Unable to find category with id %s", $id)
            );
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'category'    => $category,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing category entity.
     *
     * @Route("/category/{id}/edit", name="ovski_forum_administration_category_edit")
     * @Method("GET")
     * @Template()
     */
    public function editCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('OvskiForumBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                sprintf("Unable to find category with id %s", $id)
            );
        }

        $editForm = $this->createEditForm($category);
        $deleteForm = $this->createCategoryDeleteForm($id);

        return array(
            'category'    => $category,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a category
     *
     * @param Category $category
     * @return \Symfony\Component\Form\Form
     */
    private function createEditForm(Category $category)
    {
        $form = $this->createForm(
            new CategoryType($this->container->getParameter('ovski_forum.locales')),
            $category,
            array(
                'action' => $this->generateUrl(
                    'ovski_forum_administration_category_update',
                    array('id' => $category->getId())
                ),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing category
     *
     * @Route("/category/{id}", name="ovski_forum_administration_category_update")
     * @Method("PUT")
     * @Template("OvskiForumBundle:Admin:editCategory.html.twig")
     */
    public function updateCategoryAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('OvskiForumBundle:Category')->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                sprintf("Unable to find category with id %s", $id)
            );
        }

        $deleteForm = $this->createCategoryDeleteForm($id);
        $editForm = $this->createEditForm($category);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect(
                $this->generateUrl('admin_forum_category_edit', array('id' => $id))
            );
        }

        return array(
            'category'    => $category,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a category
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
            $category = $em->getRepository('OvskiForumBundle:Category')->find($id);

            if (!$category) {
            throw $this->createNotFoundException(
                sprintf("Unable to find category with id %s", $id)
            );
        }

            $em->remove($category);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_forum_listcategories'));
    }

    /**
     * Creates a form to delete a category by id
     *
     * @param integer $id
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteCategoryForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl(
                'ovski_forum_administration_category_delete',
                array('id' => $id)
            ))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /* -----------------------*
     *  USERS RELATED ACTIONS *
     * -----------------------*/

    /**
     * Lists enabled and moderators users to promote or demote then afterwards
     * 
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
        $moderatorUsers = $this->filterUsersNonModerator($users);
        $enabledUsers = $this->filterUsersWithRole($userRepository->getEnabledUsers());

        return array(
            'users'      => $enabledUsers,
            'moderators' => $moderatorUsers
        );
    }

    /**
     * Promotes or demotes a user
     * 
     * @Route("/{id}/promote/{choice}", name="ovski_forum_moderation_promote")
     * @Method("GET")
     */
    public function promoteAction($id, $choice)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("OvskiMinecraftUserBundle:User")->findOneById($id);

        if (!$user) {
            throw $this->createNotFoundException(
                sprintf("Unable to find user with id %s", $id)
            );
        }

        if ($choice) {
            // promote
            if (!$user->isEnabled()) {
                throw new \Exception(
                    sprintf("You can't promote %s user as he is disabled", $user)
                );
            }
            $user->addRole("ROLE_MODERATOR");
            $em->persist($user);
        } else {
            // demote
            if ($user->hasRole("ROLE_ADMIN")) {
                throw new \Exception(
                    sprintf("You can't demote %s user as he is an administrator", $user)
                );
            }
            $user->removeRole("ROLE_MODERATOR");
            $em->persist($user);
        }
        $em->flush();
   
        return $this->redirect(
            $this->generateUrl('ovski_forum_administration_users')
        );
    }

    /**
     * Filter users by removing those with a role
     * 
     * @param array $userArray a user array
     * @return array of users
     */
    private function filterUsersWithRole($userArray)
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

    /**
     * Filter users by removing those without the moderator
     * 
     * @param array $userArray a user array
     * @return array of users
     */
    private function filterUsersNonModerator($userArray)
    {
        $i = 0;
        foreach ($userArray as $user) {
            if (!$user->hasRole("ROLE_MODERATOR")) {
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
     * Displays closed topics
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
     * Deletes a closed topic
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
            throw $this->createNotFoundException(
                sprintf("Unable to find topic with id %s", $id)
            );
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
     * Renders a deleteTopicForm
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
     * Creates a form to delete a topic
     *
     * @param integer $id
     * @return \Symfony\Component\Form\Form
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
     * Displays unauthorized posts
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
     * Deletes an unauthorized post
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

            if (!post) {
                throw $this->createNotFoundException(
                    sprintf("Unable to find post with id %s", $id)
                );
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
     * Renders a deletePostForm
     * 
     * @param integer $id
     */
    public function deletePostFormAction($id)
    {
        return $this->render(
            'OvskiForumBundle::form.html.twig',
            array('form' => $this->createDeletePostForm($id)->createView())
        );
    }

    /**
     * Creates a form to delete a post
     *
     * @param integer $id
     * @return \Symfony\Component\Form\Form
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

        if (!post) {
            throw $this->createNotFoundException(
                sprintf("Unable to find post with id %s", $id)
            );
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
     * Renders a authorizePostForm
     */
    public function authorizedPostFormAction($id)
    {
        return $this->render(
                'OvskiForumBundle::form.html.twig',
                array('form' => $this->createAuthorizedPostForm($id)->createView())
        );
    }

    /**
     * Creates a form to unauthorize a post
     *
     * @param integer $id
     * @return \Symfony\Component\Form\Form
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
