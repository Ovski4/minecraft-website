<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Moderation controller.
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
     * @Route("/{id}/enable/{choice}", name="ovski_forum_moderation_enable")
     * @Method("GET")
     */
    public function enableAction($id, $choice)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("OvskiMinecraftUserBundle:User")->findOneById($id);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        if ($user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_MODERATOR") || $user->hasRole("ROLE_SUPER_ADMIN")) {
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
            if ($user->hasRole("ROLE_MODERATOR") || $user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_SUPER_ADMIN")) {
                unset($userArray[$i]);
            }
            $i++;
        }
        return $userArray;
    }
}
