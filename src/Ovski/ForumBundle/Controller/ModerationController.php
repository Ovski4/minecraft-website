<?php

namespace Ovski\ForumBundle\Controller;

//use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
}
