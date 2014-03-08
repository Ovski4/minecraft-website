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
     * @Template()
     */
    public function homeAction()
    {
        return array();
    }

    /**
     * Server Info Action
     *
     * @Route("/server-info", name="server_info")
     * @Template()
     */
    public function serverInfoAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            
            $Query = new MinecraftQuery();
            try
            {
                $Query->Connect('localhost', 25565);
                return new Response(count($Query->GetPlayers()));
            } catch(\Exception $e) {
                throw new \Exception(sprintf("Erreur : %s", $e->getMessage()));
            }
        } else {
            throw new \Exception("Fuck you. You better not try it again, you'll burn your fingers");
        }
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

    /**
     * Contact page
     *
     * @Route("/contact-us", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        $form = $this->createMailForm();

        return array('form' => $form->createView());
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
