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
     * @Route("/factions", name="factions_stats")
     * @Template()
     */
    public function statsAction()
    {
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
    }
}
