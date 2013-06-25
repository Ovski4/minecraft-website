<?php

namespace Ovski\PlayerStatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PlayerStatsController extends Controller
{
    /**
     * List all kills
     *
     * @Route("/", name="stats")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $players = $em->getRepository("OvskiPlayerStatsBundle:Player")->getAll();

        return array("players" => $players);
    }

    //TODO
        //Route -> /id -> specific stats
}
