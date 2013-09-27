<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Moderation controller
 * 
 * This class contains every actions executable by users with role ROLE_MODERATOR
 *
 * @Route("/moderation")
 */
class ModerationController extends Controller
{
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

        $disabledUsers = $this->filterUsersWithoutRole($userRepository->getDisabledUsers());
        $enabledUsers  = $this->filterUsersWithoutRole($userRepository->getEnabledUsers());

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
            throw $this->createNotFoundException();
        }

        if ($user->hasRole("ROLE_MODERATOR")) {
            throw new AccessDeniedException();
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

    /**
     * Close a topic
     *
     * @Route("/category/{categorySlug}/topic/{id}/close", name="ovski_forum_moderation_topic_close")
     */
    public function closeTopicAction()
    {
        
    }

    /**
     * Hide and remove access to a topic
     * The topic is not deleted
     *
     * @Route("/category/{categorySlug}/topic/{id}/hide", name="ovski_forum_moderation_topic_hide")
     */
    public function hideTopicAction()
    {
        
    }
}
