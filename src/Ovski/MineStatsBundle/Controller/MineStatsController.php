<?php

namespace Ovski\MineStatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MineStatsController extends Controller
{
    /**
     * List all player stats
     *
     * @Route("/players", name="players_stats")
     * @Template()
     */
    public function playersStatsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository("OvskiMineStatsBundle:Player")->getAll();

        return array("players" => $players);
    }

    /**
     * Give the stats of a player
     *
     * @Route("/player/{pseudo}", name="player_stats")
     * @Template()
     */
    public function playerStatsAction($pseudo)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository("OvskiMineStatsBundle:Player")->findOneBy(array("pseudo" => $pseudo));
        
        if (!$player) {
            throw new \Exception(sprintf("What are you looking for? I have never heard of %s in my life.", $pseudo));
        }

        $timePlayed  = $player->getPlayedTime();
        //do stuff
        $time = $timePlayed;

        return array("player" => $player, "playedTime" => $time);
    }

    /**
     * List all factions
     *
     * @Route("/factions", name="factions_stats")
     * @Template()
     */
    public function factionsStatsAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $factions = $manager->getRepository("OvskiMineStatsBundle:Faction")->findAll();

        return array("factions" => $factions);
    }

    /**
     * Give the stats of a faction
     *
     * @Route("/faction/{name}", name="faction_stats")
     * @Template()
     */
    public function factionStatsAction($name)
    {
        $manager = $this->getDoctrine()->getManager();
        $faction = $manager->getRepository("OvskiMineStatsBundle:Faction")->findOneBy(array("name" => $name));

        if (!$faction) {
            throw new \Exception(sprintf("What are you looking for? I have never heard of the %s faction in my life.", $pseudo));
        }

        return array("faction" => $faction);
    }
}
