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
<<<<<<< HEAD
     * @Route("/factions", name="factions_stats")
=======
     * @Route("/stats/factions", name="factions_stats")
>>>>>>> 5880bcf4d35ad6034e159fc308a2fad7ee2b0073
     * @Template()
     */
    public function statsAction()
    {
<<<<<<< HEAD
        return array();
    }

    /**
     * Stats of a given faction
     *
     * @Route("/faction/{name}", name="faction_stat")
     * @Template()
     */
    public function statAction($pseudo)
    {
        return array();
=======
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
>>>>>>> 5880bcf4d35ad6034e159fc308a2fad7ee2b0073
    }
}
