<?php

namespace Ovski\MineStatsBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

class MineStatsController extends Controller
{
    /**
     * List all player stats
     *
     * @Route("/players", name="players_stats", defaults={"page" = 1})
     * @Route("/players/{page}", name="players_stats_paginated")
     * @Template()
     */
    public function playersStatsAction(Request $request, $page)
    {
        /*$players = array();

        $filterManager = $this->get('player_filter_manager');
        $filterForm = $filterManager->createForm();

        if ($request->query->has($filterForm->getName())) {
            $filterForm->bind($request);
            $players = $filterManager->filter();
        } else {*/
            $em = $this->getDoctrine()->getManager();
            $players = $em->getRepository("OvskiMineStatsBundle:Player")->getAll();
        //}
        
        $pager = new Pagerfanta(new ArrayAdapter($players));
        $pager->setMaxPerPage($this->container->getParameter('max_players_per_page'));

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException(
                sprintf("As awesome as this website can be, page \"%s\" was not found.",
                        $page
                       )
            );
        }

        return array(
            "pager"       => $pager,
            //"filter_form" => $filterForm->createView()
        );
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
        $player = $em->getRepository("OvskiMineStatsBundle:Player")
                     ->findOneBy(array("pseudo" => $pseudo));

        if (!$player) {
            throw $this->createNotFoundException(
                sprintf("What are you looking for? I have never heard of %s in my life.",
                    $pseudo
                )
            );
        }

        $timePlayed  = $player->getPlayedTime();
        //do stuff
        $time = $timePlayed;

        return array("player" => $player, "playedTime" => $time);
    }

    /**
     * List all factions
     *
     * @Route("/factions", name="factions_stats", defaults={"page" = 1})
     * @Route("/factions/{page}", name="factions_stats_paginated") 
     * @Template()
     */
    public function factionsStatsAction($page)
    {
        $manager = $this->getDoctrine()->getManager();
        $factions = $manager->getRepository("OvskiMineStatsBundle:Faction")
                            ->findAll();

        /*Get power for each faction*/
        $factionsPowers = array();
        foreach ($factions as $faction) {
            $factionPower = 0;
            foreach ($faction->getPlayers() as $player) {
                $factionPower = $factionPower + $player->getPower();
            }
            $factionsPowers[$faction->getName()] = $factionPower;
        }

        $pager = new Pagerfanta(new ArrayAdapter($factions));
        $pager->setMaxPerPage($this->container->getParameter('max_factions_per_page'));

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException(
                sprintf("As awesome as this website can be, page \"%s\" was not found.",
                    $page
                )
            );
        }

        return array(
            "pager" => $pager,
            "powers" => $factionsPowers
        );
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
        $faction = $manager->getRepository("OvskiMineStatsBundle:Faction")
                           ->findOneBy(array("name" => $name));

        if (!$faction) {
            throw $this->createNotFoundException(
                sprintf("What are you looking for? I have never heard of the %s faction in my life.",
                        $name
                       )
            );
        }

        return array("faction" => $faction);
    }
}
