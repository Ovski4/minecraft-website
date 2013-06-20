<?php

namespace Ovski\StatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class StatsController extends Controller
{
    /**
     * List all kills
     *
     * @Route("/", name="_stats")
     * @Template()
     */
    public function indexAction()
    {
        return array("rien" => "nothing");
    }
}
