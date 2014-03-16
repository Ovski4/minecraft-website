<?php

namespace Ovski\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * List all recent news
     *
     * @Route("/players", name="players_stats", defaults={"page" = 1})
     * @Route("/players/{page}", name="players_stats_paginated")
     * @Template()
     */
    public function indexAction($name)
    {
        return $this->render('OvskiNewsBundle:Default:index.html.twig', array('name' => $name));
    }
}
