<?php

namespace Ovski\MinecraftUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * Show the profile of a user
     *
     * @Route("/{username}", name="ovski_minecraftuser_user_profile")
     * @Template()
     */
    public function profileAction($username)
    {
        $user = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository("OvskiMinecraftUserBundle:User")
            ->findOneBy(array('username' => $username))
        ;

        return array(
            "user" => $user,
        );
    }
}
