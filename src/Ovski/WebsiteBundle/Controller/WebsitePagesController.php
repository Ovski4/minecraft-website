<?php

namespace Ovski\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WebsitePagesController extends Controller
{
    /**
     * Homepage
     *
     * @Route("/", name="home")
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
