<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Moderation controller
 * 
 * This class contains every actions executable by users with role ROLE_MODERATOR
 *
 * @Route("/moderation")
 */
class ModerationController extends Controller
{
    public static $TOPIC_STATUS_LABEL_MAP = array(
      'closed' => 'close',
      'open'   => 'open',
    );

    /* -----------------------*
     *  USERS RELATED ACTIONS *
     * -----------------------*/

    /**
     * Redirect to usersAction
     *
     * @Route("/", name="ovski_forum_moderation")
     */
    public function adminAction()
    {
        return $this->redirect(
            $this->generateUrl('ovski_forum_moderation_users')
        );
    }

    /**
     * @Route("/users", name="ovski_forum_moderation_users")
     * @Template()
     */
    public function usersAction()
    {
        $userRepository = $this
            ->getDoctrine()
            ->getRepository("OvskiMinecraftUserBundle:User");

        $disabledUsers = $this->filterUsersWithoutRole(
            $userRepository->findBy(array('enabled' => 0))
        );
        $enabledUsers  = $this->filterUsersWithoutRole(
            $userRepository->findBy(array('enabled' => 1))
        );

        return array(
            'disabled_users' => $disabledUsers,
            'enabled_users'  => $enabledUsers
        );
    }

    /**
     * @Route("/user/{id}/enable/{choice}", name="ovski_forum_moderation_enable")
     * @Method("GET")
     */
    public function enableAction($id, $choice)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("OvskiMinecraftUserBundle:User")->findOneById($id);

        if (!$user) {
            throw $this->createNotFoundException(
                sprintf("Unable to find user with id %s", $id)
            );
        }

        if ($user->hasRole("ROLE_MODERATOR")) {
            throw new \Exception(
                sprintf("You can't disable %s user as he is a moderator", $user)
            );
        } else {
            $user->setEnabled($choice);
            $em->persist($user);
            $em->flush();

            return $this->redirect(
                $this->generateUrl('ovski_forum_moderation_users')
            );
        }
    }

    private function filterUsersWithoutRole($userArray)
    {
        $i = 0;
        foreach ($userArray as $user) {
            if ($user->hasRole("ROLE_MODERATOR")) {
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
     * Edit the status of a topic
     * 
     * When created, a topic is always open.
     * When closed a topic is still visible but only moderators can add posts
     * When hidden, a topic is not visible. Admins can deleted one permanently
     * 
     * @Method("PUT")
     * @Route("/forum/moderation/category/{categorySlug}/topic/{id}/{status}", name="ovski_forum_moderation_topic_edit_status")
     */
    public function editTopicStatusAction($id, $categorySlug, $status)
    {
        $em = $this->getDoctrine()->getManager();
        $topic = $em->getRepository("OvskiForumBundle:Topic")->findOneById($id);

        if (!$topic) {
            throw $this->createNotFoundException(
                sprintf("Unable to find topic with id %s", $id)
            );
        }

        $topic->setStatus($status);
        $em->persist($topic);
        $em->flush();

        return $this->redirect(
            $this->generateUrl('ovski_forum_forum_category',
                array('categorySlug' => $categorySlug)
            )
        );
    }

    /**
     * Render a closeTopicForm
     */
    public function editTopicStatusFormAction($id, $categorySlug, $status)
    {
        return $this->render(
            'OvskiForumBundle::form.html.twig',
            array('form' => $this
                ->createEditTopicStatusForm($id, $categorySlug, $status)
                ->createView()
            )
        );
    }

    /**
     * Creates a form to delete a Topic entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditTopicStatusForm($id, $categorySlug, $status)
    {
        $qb = $this->createFormBuilder()
            ->setAction(
                $this->generateUrl('ovski_forum_moderation_topic_edit_status', array(
                    'id'           => $id,
                    'categorySlug' => $categorySlug,
                    'status'       => $status
                ))
            )
            ->setMethod('PUT')
        ;

        $label = self::$TOPIC_STATUS_LABEL_MAP[$status];
        $qb->add('submit', 'submit', array('label' => $label));

        return $qb->getForm();
    }

    /* -----------------------*
     *  POSTS RELATED ACTIONS *
     * -----------------------*/

    /**
     * Unauthorize a post
     * 
     * When created, a topic is always authorized.
     * When unauthorized a topic is not visible and ready to be deleted by admins
     *
     * @Method("PUT")
     * @Route("/category/{categorySlug}/topic/{topicSlug}/post/{id}/remove", name="ovski_forum_moderation_post_unauthorize")
     */
    public function unauthorizePostAction($id, $categorySlug, $topicSlug)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository("OvskiForumBundle:Post")->findOneById($id);

        if (!$post) {
            throw $this->createNotFoundException(
                sprintf("Unable to find topic with id %s", $id)
            );
        }

        if ($post->isAuthorized()) {
            $post->setStatus("unauthorized");
            $post->getTopic()->decrementNumPosts();
            $em->persist($post);
            $em->flush();
        }

        return $this->redirect(
            $this->generateUrl('ovski_forum_forum_topic',
                array(
                    'categorySlug' => $categorySlug,
                    'topicSlug'    => $topicSlug
                )
            )
        );
    }

    /**
     * Render a unauthorizePostForm
     */
    public function unauthorizePostFormAction($id, $categorySlug, $topicSlug)
    {
        return $this->render(
            'OvskiForumBundle::form.html.twig',
            array('form' => $this
                ->createUnauthorizePostForm($id, $categorySlug, $topicSlug)
                ->createView()
            )
        );
    }

    /**
     * Creates a form to unauthorize a Post entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createUnauthorizePostForm($id, $categorySlug, $topicSlug)
    {
        $qb = $this->createFormBuilder()
            ->setAction(
                $this->generateUrl('ovski_forum_moderation_post_unauthorize', array(
                    'id'           => $id,
                    'categorySlug' => $categorySlug,
                    'topicSlug'    => $topicSlug
                ))
            )
            ->setMethod('PUT')
        ;

        $qb->add('submit', 'submit', array('label' => 'remove'));

        return $qb->getForm();
    }
}
