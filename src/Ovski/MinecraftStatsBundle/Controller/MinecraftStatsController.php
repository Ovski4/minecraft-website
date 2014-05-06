<?php

namespace Ovski\MinecraftStatsBundle\Controller;

use Ovski\MinecraftStatsBundle\Form\PlayersStatsFilterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

class MinecraftStatsController extends Controller
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
        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(new PlayersStatsFilterType());
        $form->bind($request);
        $qb = $em
            ->getRepository('OvskiMinecraftStatsBundle:Player')
            ->createQueryBuilder('e')
            ->addOrderBy('e.score', 'DESC');
        ;
        $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $qb);

        $parameters = $request->query->all();
        $players = $qb->getQuery()->getResult();
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
            "pager" => $pager,
            "form"  => $form->createView(),
            "parameters" => $parameters
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
        $player = $em
            ->getRepository("OvskiMinecraftStatsBundle:Player")
            ->findOneBy(array("pseudo" => $pseudo))
        ;

        if (!$player) {
            throw $this->createNotFoundException(
                sprintf("What are you looking for? I have never heard of %s in my life.",
                    $pseudo
                )
            );
        }

        $timePlayed  = $player->getPlayedTime();

        return array("player" => $player, "playedTime" => $timePlayed);
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
        $factions = $manager
            ->getRepository("OvskiMinecraftStatsBundle:Faction")
            ->findBy(array(), array('score' => 'DESC'))
        ;

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

        return array("pager" => $pager);
    }

    /**
     * Give the stats of a faction
     *
     * @Route("/faction/{slug}", name="faction_stats")
     * @Template()
     */
    public function factionStatsAction($slug)
    {
        $manager = $this->getDoctrine()->getManager();
        $faction = $manager
            ->getRepository("OvskiMinecraftStatsBundle:Faction")
            ->findOneBy(array("slug" => $slug))
        ;

        if (!$faction) {
            throw $this->createNotFoundException(
                sprintf("What are you looking for? I have never heard of the %s faction in my life.",
                        $slug
                )
            );
        }

        return array("faction" => $faction);
    }
}
