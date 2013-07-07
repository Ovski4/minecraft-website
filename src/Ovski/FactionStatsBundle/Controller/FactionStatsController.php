<?php

namespace Ovski\FactionStatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FactionStatsController extends Controller
{
    /**
     * List all factions
     *
     * @Route("/stats/factions", name="factions_stats")
     * @Template()
     */
    public function statsAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $factions = $manager->getRepository("OvskiFactionStatsBundle:Faction")->findAll();

        return array("factions" => $factions);
    }

    /**
     * Give the stats of a faction
     *
     * @Route("/stats/faction/{name}", name="faction_stats")
     * @Template()
     */
    public function statAction($name)
    {
        $manager = $this->getDoctrine()->getManager();
        $faction = $manager->getRepository("OvskiFactionStatsBundle:Faction")->findOneBy(array("name" => $name));
        
        if (!$faction) {
            throw new \Exception(sprintf("What are you looking for? I have never heard of the %s faction in my life.", $pseudo));
        }

        return array("faction" => $faction);
    }
}
