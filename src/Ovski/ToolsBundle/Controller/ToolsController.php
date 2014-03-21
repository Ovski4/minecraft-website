<?php

namespace Ovski\ToolsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ovski\ToolsBundle\Tools\ItemFixturesGenerator;

class ToolsController extends Controller
{
    /**
     * Generate item fixtures
     *
     * @Route("/generate-item-fixtures")
     */
    public function generateItemFixturesAction()
    {
        // TODO a parameter would be better
        $response = ItemFixturesGenerator::generateFile('/home/baptiste/workspace/tmp/fixtures.php');
        return new Response($response);
    }   
}
