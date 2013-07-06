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
     * @Route("/", name="factions_stats")
     * @Template()
     */
    public function factionsStatsAction()
    {
        return array();
    }
}
