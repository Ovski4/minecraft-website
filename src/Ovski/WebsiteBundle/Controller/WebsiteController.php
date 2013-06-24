<?php

namespace Ovski\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WebsiteController extends Controller
{
    /**
     * List all kills
     *
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
