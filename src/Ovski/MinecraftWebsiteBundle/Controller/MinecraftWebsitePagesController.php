<?php

namespace Ovski\MinecraftWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MinecraftWebsitePagesController extends Controller
{
    /**
     * Homepage
     *
     * @Route("/home", name="home")
     * @Template()
     */
    public function homeAction()
    {
        return array();
    }
    
    /**
     * Map page
     *
     * @Route("/map", name="map")
     * @Template()
     */
    public function mapAction()
    {
        return array();
    }
}
