<?php

namespace Ovski\MinecraftWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Ovski\MinecraftWebsiteBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ovski\ToolsBundle\Tools\MinecraftQuery;

class MinecraftWebsitePagesController extends Controller
{
    /**
     * Homepage
     *
     * @Route("/home", name="home")
     */
    public function homeAction(Request $request)
    {
        $locale = $request->getLocale();
        $templatePath = sprintf("OvskiMinecraftWebsiteBundle:%s:home.html.twig", $locale);
        return $this->render($templatePath);
    }

    /**
     * Server Info Action
     *
     * @Route("/server-info", name="server_info")
     */
    public function serverInfoAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $Query = new MinecraftQuery();
            try
            {
                $Query->Connect('94.23.242.93', 25565);
                //echo $Query->GetPlayers();
                if (!$Query->GetPlayers() || $Query->GetPlayers() == "0") {
                    return new Response("0");
                } else {
                    return new Response(json_encode($Query->GetPlayers()));
                }
            } catch(\Exception $e) {
                return new Response(sprintf("Erreur : %s", $e->getMessage()));
            }
        } else {
            throw new \Exception("Fuck you. You better not try it again, you'll burn your fingers");
        }
    }

    /**
     * Server page
     *
     * @Route("/server", name="server")
     */
    public function serverAction(Request $request)
    {
        $locale = $request->getLocale();
        $templatePath = sprintf("OvskiMinecraftWebsiteBundle:%s:server.html.twig", $locale);
        return $this->render($templatePath);
    }

    /**
     * Map page
     *
     * @Route("/map", name="map")
     * @Template()
     */
    public function mapAction()
    {
        return $this->render("OvskiMinecraftWebsiteBundle:mixed:map.html.twig");
    }

    /**
     * Contact page
     *
     * @Route("/contact-us", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        $form = $this->createMailForm();

        return $this->render(
            "OvskiMinecraftWebsiteBundle:mixed:contact.html.twig",
            array('form' => $form->createView())
        );
    }

    /**
     * Mail Action
     *
     * @Route("/contact/send-message", name="send_mail")
     * @Method("POST")
     */
    public function mailAction(Request $request)
    {
        $form = $this->createMailForm();
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            //message creation var_dump
            $message = \Swift_Message::newInstance()
                ->setSubject($data['subject'])
                ->setFrom("teston@test.fr")
                ->setTo($this->container->getParameter('mailer_user'))
                ->setBody(
                    $this->renderView('OvskiMinecraftWebsiteBundle:Mail:email.txt.twig',
                        array('message' => $data['message'], 'from' => $data['email'])
                    )
                )
            ;
            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('contact'));
        } else {
            throw new \Exception("Unvalid form");
        }
    }

    /**
     * Creates a form to send a mail
     *
     * @param Category $category
     * @return \Symfony\Component\Form\Form
    */
    private function createMailForm()
    {
        $form = $this->createForm(
            new ContactType(),
            null,
            array(
                'action' => $this->generateUrl('send_mail'),
                'method' => 'POST'
            )
        );

        return $form;
    }
        
}
