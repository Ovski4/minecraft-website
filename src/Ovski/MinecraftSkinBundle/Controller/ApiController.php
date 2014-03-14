<?php

/**
 * @author:  Baptiste BOUCHEREAU <baptiste.bouchereau@gmail.com>
 */

namespace Ovski\MinecraftSkinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Api controller
 */
class ApiController extends Controller
{
    /**
     * Controller
     *
     * @Route("/full-skin", name="ovski_minecraftskin_full")
     */
    public function getFullSkinAction(Request $request)
    {
        $parameters = $request->query->all();
        $skinManager = $this->get('ovski.minecraftskin.manager');

        $image = new File($skinManager->getFullSkin($parameters));
        $response = new Response(readfile($image));
        $response->headers->set('Content-Type', 'image/png');
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * Controller
     *
     * @Route("/head", name="ovski_minecraftskin_head")
     */
    public function getHeadSkinAction(Request $request)
    {
        $parameters = $request->query->all();
        $skinManager = $this->get('ovski.minecraftskin.manager');
        $response = new Response(readfile($skinManager->getHeadSkin($parameters)));
        $response->headers->set('Content-Type', "image/png");
        $response->setStatusCode(200);

        return $response;
    }
}