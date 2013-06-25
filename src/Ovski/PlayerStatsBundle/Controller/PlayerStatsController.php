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
    public function statsAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $players = $em->getRepository("OvskiPlayerStatsBundle:Player")->getAll();

        return array("players" => $players);
    }

    /**
     * List all kills
     *
     * @Route("/{pseudo}", name="single_stat")
     * @Template()
     */
    public function statAction($pseudo)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $player = $em->getRepository("OvskiPlayerStatsBundle:Player")->findOneBy(array("pseudo" => $pseudo));
        
        $timePlayed  = $player->getPlayedTime();
        //do stuff
        $time = $timePlayed;
 
        return array("player" => $player, "playedTime" => $time);
    }

    //TODO
        //Route -> /id -> specific stats
}
