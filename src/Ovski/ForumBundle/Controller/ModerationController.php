<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Moderation controller.
 *
 * @Route("/moderation")
 */
class ModerationController extends Controller
{
    /**
     * @Route("/users", name="ovski_forum_moderation_users")
     * @Template()
     */
    public function usersAction()
    {
        $userRepository = $this
            ->getDoctrine()
            ->getRepository("OvskiMinecraftUserBundle:User");

        return array(
            'disabled_users' => $userRepository->getDisabledUsers(),
            'enabled_users'  => $userRepository->getEnabledUsers()
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

        //TODO FILTER IN A LOOP IN ABOVE ACTION
        if ($user->hasRole("ROLE_ADMIN") || $user->hasRole("ROLE_MODERATOR")) {
            //throw an exception
            return $this->redirect(
                $this->generateUrl('ovski_forum_moderation_users')
        )   ;
        }
        $user->setEnabled($choice);

        $em->persist($user);
        $em->flush();
 
        return $this->redirect(
            $this->generateUrl('ovski_forum_moderation_users')
        );
    }
}
