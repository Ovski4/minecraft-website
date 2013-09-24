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
 * @Route("/modo")
 */
class ModerationController extends Controller
{
    /**
     * @Route("/users")
     * @Template()
     */
    public function usersAction()
    {
        $users = $this
            ->getDoctrine()
            ->getRepository("OvskiMinecraftUserBundle:User")
            ->findAll()
        ;

        return array('users' => $users);
    }
}
