<?php

namespace Ovski\PlayerStatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PlayerStatsController extends Controller
{
    /**
     * List all player stats
     *
     * @Route("/stats/players", name="players_stats")
     * @Template()
     */
    public function statsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository("OvskiPlayerStatsBundle:Player")->getAll();

        return array("players" => $players);
    }

    /**
     * Give the stats of a player
     *
     * @Route("/stats/player/{pseudo}", name="player_stats")
     * @Template()
     */
    public function statAction($pseudo)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository("OvskiPlayerStatsBundle:Player")->findOneBy(array("pseudo" => $pseudo));
        
        if (!$player) {
            throw new \Exception(sprintf("What are you looking for? I have never heard of %s in my life.", $pseudo));
        }

        $timePlayed  = $player->getPlayedTime();
        //do stuff
        $time = $timePlayed;
 
        return array("player" => $player, "playedTime" => $time);
    }
}
